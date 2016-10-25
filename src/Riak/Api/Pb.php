<?php

namespace Basho\Riak\Api;

require_once 'Pb/Message/riak.pb.php';
require_once 'Pb/Message/riak_dt.pb.php';
require_once 'Pb/Message/riak_kv.pb.php';
require_once 'Pb/Message/riak_search.pb.php';
require_once 'Pb/Message/riak_ts.pb.php';
require_once 'Pb/Message/riak_yokozuna.pb.php';

use Basho\Riak\Api;
use Basho\Riak\ApiInterface;
use Basho\Riak\Bucket;
use Basho\Riak\Command;
use Basho\Riak\DataType;
use Basho\Riak\Location;
use Basho\Riak\Node;
use Basho\Riak\Object;
use Basho\Riak\Search\Doc;

/**
 * Handles communications between end user app & Riak PB API using persistent sockets
 *
 * @author Christopher Mancini <cmancini at basho d0t com>
 */
class Pb extends Api implements ApiInterface
{
    /**
     * socket connection handle
     *
     * @var null
     */
    protected $connection = null;

    /**
     * @var int
     */
    protected $messageCode = 0;

    /**
     * PB message to be sent
     *
     * @var \Google\Protobuf\Internal\Message|null
     */
    protected $requestMessage = null;

    /**
     * PB response received
     *
     * @var \Google\Protobuf\Internal\Message|null
     */
    protected $responseMessage = null;

    /**
     * Prepare request to be sent
     *
     * @param Command $command
     * @param Node $node
     *
     * @return $this
     */
    public function prepare(Command $command, Node $node)
    {
        // call parent prepare method to setup object members
        parent::prepare($command, $node);

        if ($this->connection === null) {
            $this->openConnection();
        }

        // determine message code and build message content
        $this->prepareMessage();

        return $this;
    }

    /**
     * Sets up the PB message to be sent over the wire
     *
     * @return $this
     * @throws Api\Exception
     */
    protected function prepareMessage()
    {
        $message = null;

        switch (get_class($this->command)) {
            case 'Basho\Riak\Command\Bucket\List':
                $this->messageCode = Api\Pb\Message::RpbListBucketsReq;
                $message = new Api\Pb\Message\RpbListBucketsReq();
                break;
            case 'Basho\Riak\Command\Bucket\Fetch':
                $this->messageCode = Api\Pb\Message::RpbGetBucketReq;
                $message = new Api\Pb\Message\RpbGetBucketReq();
                break;
            case 'Basho\Riak\Command\Bucket\Store':
                $this->messageCode = Api\Pb\Message::RpbSetBucketReq;
                $message = new Api\Pb\Message\RpbSetBucketReq();
                $props = new Api\Pb\Message\RpbBucketProps();

                foreach ($this->command->getData()['props'] as $prop => $value) {
                    $method = 'set' . str_replace("_", "", ucwords($prop, "_"));
                    $props->{$method}($value);
                }
                $message->setProps($props);
                break;
            case 'Basho\Riak\Command\Bucket\Delete':
                $this->messageCode = Api\Pb\Message::RpbPutReq;
                $message = new Api\Pb\Message\RpbPutReq();
                break;
            case 'Basho\Riak\Command\Bucket\Keys':
                $this->messageCode = Api\Pb\Message::RpbListKeysReq;
                $message = new Api\Pb\Message\RpbListKeysReq();
                break;
            case 'Basho\Riak\Command\Object\Fetch':
                $this->messageCode = Api\Pb\Message::RpbGetReq;
                $message = new Api\Pb\Message\RpbGetReq();
                break;
            case 'Basho\Riak\Command\Object\Store':
                $this->messageCode = Api\Pb\Message::RpbPutReq;
                $message = new Api\Pb\Message\RpbPutReq();
                $message->setVclock($this->command->getObject()->getVclock());
                $content = $this->prepareContent();
                $message->setContent($content);
                break;
            case 'Basho\Riak\Command\Object\Delete':
                $this->messageCode = Api\Pb\Message::RpbDelReq;
                $message = new Api\Pb\Message\RpbDelReq();
                break;
            case 'Basho\Riak\Command\Object\FetchPreflist':
                $this->messageCode = Api\Pb\Message::RpbGetBucketKeyPreflistReq;
                $message = new Api\Pb\Message\RpbGetBucketKeyPreflistReq();
                break;
            case 'Basho\Riak\Command\DataType\Counter\Fetch':
            case 'Basho\Riak\Command\DataType\Set\Fetch':
            case 'Basho\Riak\Command\DataType\Map\Fetch':
            case 'Basho\Riak\Command\DataType\Hll\Fetch':
                $this->messageCode = Api\Pb\Message::DtFetchReq;
                $message = new Api\Pb\Message\DtFetchReq();
                break;
            case 'Basho\Riak\Command\DataType\Counter\Store':
                $message = $this->buildCounterUpdateMessage($this->command->getData()['increment']);
                break;
            case 'Basho\Riak\Command\DataType\Set\Store':
                $data = $this->command->getData();
                $message = $this->buildSetUpdateMessage($data['add_all'], $data['remove_all']);
                break;
            case 'Basho\Riak\Command\DataType\Map\Store':
                $data = $this->command->getData();
                $message = $this->buildMapUpdateMessage($data['update'], !empty($data['remove']) ? $data['remove'] : []);
                break;
            case 'Basho\Riak\Command\DataType\Hll\Store':
                $data = $this->command->getData();
                $message = $this->buildHllUpdateMessage($data['add_all']);
                break;
            case 'Basho\Riak\Command\Search\Index\Fetch':
                $this->messageCode = Api\Pb\Message::RpbYokozunaIndexGetReq;
                $message = new Api\Pb\Message\RpbYokozunaIndexGetReq();
                $message->setName("{$this->command}");
                break;
            case 'Basho\Riak\Command\Search\Index\Store':
                $this->messageCode = Api\Pb\Message::RpbYokozunaIndexPutReq;
                $message = new Api\Pb\Message\RpbYokozunaIndexPutReq();
                $index = new Api\Pb\Message\RpbYokozunaIndex();
                $index->setName("{$this->command}");
                $index->setSchema($this->command->getData()['schema']);
                $message->setIndex($index);
                break;
            case 'Basho\Riak\Command\Search\Index\Delete':
                $this->messageCode = Api\Pb\Message::RpbYokozunaIndexDeleteReq;
                $message = new Api\Pb\Message\RpbYokozunaIndexDeleteReq();
                $message->setName("{$this->command}");
                break;
            case 'Basho\Riak\Command\Search\Schema\Fetch':
                $this->messageCode = Api\Pb\Message::RpbYokozunaSchemaGetReq;
                $message = new Api\Pb\Message\RpbYokozunaSchemaGetReq();
                $message->setName("{$this->command}");
                break;
            case 'Basho\Riak\Command\Search\Schema\Store':
                $this->messageCode = Api\Pb\Message::RpbYokozunaSchemaPutReq;
                $message = new Api\Pb\Message\RpbYokozunaSchemaPutReq();
                $schema = new Api\Pb\Message\RpbYokozunaSchema();
                $schema->setName("{$this->command}");
                $schema->setContent($this->command->getData());
                $message->setSchema($schema);
                break;
            case 'Basho\Riak\Command\Search\Fetch':
                $this->messageCode = Api\Pb\Message::RpbSearchQueryReq;
                $message = new Api\Pb\Message\RpbSearchQueryReq();
                $message->setIndex("{$this->command}");

                // Iterate over parameters, explicitly accepting known / allowed keys only for security reasons
                foreach ($this->command->getParameters() as $key => $value) {
                    if ($key == 'fl') {
                        foreach ($value as $field) {
                            $message->appendFl($field);
                        }
                    } elseif ($key == 'q') {
                        $message->setQ($value);
                    } elseif ($key == 'rows') {
                        $message->setRows($value);
                    } elseif ($key == 'start') {
                        $message->setStart($value);
                    } elseif ($key == 'sort') {
                        $message->setSort($value);
                    } elseif ($key == 'fq') {
                        $message->setFilter($value);
                    } elseif ($key == 'df') {
                        $message->setFilter($value);
                    }
                }
                break;
            case 'Basho\Riak\Command\MapReduce\Fetch':
                $this->messageCode = Api\Pb\Message::RpbMapRedReq;
                $message = new Api\Pb\Message\RpbMapRedReq();
                $message->setContentType(Http::CONTENT_TYPE_JSON);
                $message->setRequest($this->command->getEncodedData());
                break;
            case 'Basho\Riak\Command\Indexes\Query':
                $this->messageCode = Api\Pb\Message::RpbIndexReq;
                $message = new Api\Pb\Message\RpbIndexReq();

                /** @var Command\Indexes\Query $command */
                $command = $this->command;
                $message->setIndex($command->getIndexName());
                $message->setQtype($command->isRangeQuery());
                $message->setRangeMax($command->getUpperBound());
                $message->setRangeMin($command->getLowerBound());
                $message->setKey($command->getMatchValue());
                # TODO: when streaming is implemented
                # $message->setStream($command->getStreamValue());

                foreach ($command->getParameters() as $key => $value) {
                    if ($key == 'max_results') {
                        $message->setMaxResults($command->getParameter('max_results'));
                    } elseif ($key == 'continuation') {
                        $message->setContinuation($command->getParameter('continuation'));
                    } elseif ($key == 'return_terms' && $command->getParameter('return_terms') == 'true') {
                        $message->setReturnTerms(true);
                    } elseif ($key == 'pagination_sort') {
                        $message->setPaginationSort($command->getParameter('pagination_sort'));
                    } elseif ($key == 'term_regex') {
                        $message->setTermRegex($command->getParameter('term_regex'));
                    } elseif ($key == 'timeout') {
                        $message->setTimeout($command->getParameter('timeout'));
                    }
                }
                break;
            case 'Basho\Riak\Command\Ping':
                $this->messageCode = Api\Pb\Message::RpbPingReq;
                $message = '';
                break;
            /** @noinspection PhpMissingBreakStatementInspection */
            case 'Basho\Riak\Command\TimeSeries\Delete':
                $this->messageCode = Api\Pb\Message::TsDelReq;
                $message = new Api\Pb\Message\TsDelReq();
            case 'Basho\Riak\Command\TimeSeries\Fetch':
                if (!$message) {
                    $this->messageCode = Api\Pb\Message::TsGetReq;
                    $message = new Api\Pb\Message\TsGetReq();
                }

                /** @var $command Command\TimeSeries\Fetch */
                $command = $this->command;
                $message->setTable($command->getTable());
                foreach($command->getData() as $cell) {
                    $message->appendKey(Api\Pb\Translator\TimeSeries::toPbCell($cell));
                }
                break;
            case 'Basho\Riak\Command\TimeSeries\Store':
                $this->messageCode = Api\Pb\Message::TsPutReq;
                $message = new Api\Pb\Message\TsPutReq();

                /** @var $command Command\TimeSeries\Store */
                $command = $this->command;
                $message->setTable($command->getTable());
                foreach($command->getData() as $row) {
                    $message->appendRows(Api\Pb\Translator\TimeSeries::toPbRow($row));
                }
                break;
            case 'Basho\Riak\Command\TimeSeries\Query\Fetch':
                $this->messageCode = Api\Pb\Message::TsQueryReq;
                $message = new Api\Pb\Message\TsQueryReq();

                /** @var $command Command\TimeSeries\Query\Fetch */
                $command = $this->command;
                $message->setQuery(Api\Pb\Translator\TimeSeries::toPbQuery($command->getData()['query'], $command->getData()['interpolations']));
                break;
            default:
                throw new Api\Exception('Command is invalid.');
        }

        if ($message) {
            $this->setLocationOnMessage($message, $this->command->getLocation());
            $this->setBucketOnMessage($message, $this->command->getBucket());
            $this->setOptionsOnMessage($message, $this->command);
        }

        $this->requestMessage = $message;

        return $this;
    }

    /**
     * @return null
     * @throws Exception
     */
    public function send()
    {
        $message = '';

        if (method_exists($this->requestMessage, "serializeToString")) {
            $message = $this->requestMessage->serializeToString();
        }

        $this->debug($this->requestMessage);

        $packedMessage = $this->packMessage($this->messageCode, $message);

        if ($this->connection === false) {
            $this->connection = null;
            return false;
        }

        $written = fwrite($this->connection, $packedMessage);
        if (!$written) {
            throw new Api\Exception('Failed to write to socket.');
        }

        $length = $this->readMessageLength();
        if ($length > 1000000000) {
            throw new Api\Exception('Abnormally high message length detected, possible HTTP response, verify connection port.');
        }

        $message_code = $this->readMessageCode();
        $message = $this->readMessage($length);

        $this->parseResponse($message_code, $message);

        return $this->success;
    }

    /**
     * Parses the Protobuff response and builds the proper response object to forward on. Note: This method attempts to
     * maintain parity with the HTTP interface for the status codes returned for consistency purposes.
     *
     *  200 = Success, content returned
     *  201 = Created
     *  204 = Success, no content returned
     *  300 = Multiple choices
     *  404 = Not found
     *  503 = Service Unavailable / Timeout
     *
     * @param $message_code     PB Message identifier @see Basho\Riak\Api\Pb\Message
     * @param string $message Binary message
     * @throws Exception
     * @internal param string $response
     */
    protected function parseResponse($message_code, $message = '')
    {
        $this->success = true;
        $code = 204;
        $location = null;
        switch ($message_code) {
            case Api\Pb\Message::RpbErrorResp:
                $pbResponse = new Api\Pb\Message\RpbErrorResp();
                $pbResponse->decode($message);
                $this->error = $pbResponse->getErrmsg();

                // intercept certain "errors" to provide consistent cross interface behavior
                if (strpos($message, "Query unsuccessful") !== false) {
                    // HTTP status code for bad request, consider it a request success
                    $code = 400;
                    $this->response = new Command\Search\Response($this->success, $code, '', null);
                    break;
                } elseif (strpos($message, "timeout") !== false) {
                    // set HTTP status code for service unavailable, consider it a request success
                    $code = 503;
                    $this->response = new Command\Indexes\Response($this->success, $code, $this->error);
                    break;
                } elseif (strpos($message, "notfound") !== false) {
                    // set HTTP status code for not found, consider it a request success
                    $code = 404;
                } else {
                    $code = $pbResponse->getErrcode();
                    $this->success = false;
                }

                $this->response = new Command\Response($this->success, $code, $this->error);
                break;
            case Api\Pb\Message::RpbPutResp:
                $pbResponse = new Api\Pb\Message\RpbPutResp();
                $pbResponse->decode($message);

                if ($pbResponse->getKey()) {
                    $code = 201;
                    $location = new Location($pbResponse->getKey(), $this->getCommand()->getBucket());
                }

                $objects = [];
                foreach ($pbResponse->getContent() as $content) {
                    /** @var Command\Object $command */
                    $command = $this->command;

                    $object = (new Object)
                        ->setData($command->getDecodedData($content->getValue(), $content->getContentType()))
                        ->setContentType($content->getContentType())
                        ->setContentEncoding($content->getContentEncoding())
                        ->setVclock($pbResponse->getVclock());

                    foreach ($content->getIndexes() as $rpbPair) {
                        $object->addValueToIndex($rpbPair->getKey(), $rpbPair->getValue());
                    }

                    foreach ($content->getUsermeta() as $meta) {
                        $object->setMetaDataValue($meta->getKey(), $meta->getValue());
                    }

                    $objects[] = $object;
                }

                if ($objects) {
                    $code = 200;
                }

                $this->response = new Command\Object\Response($this->success, $code, '', $location, $objects);
                break;
            case Api\Pb\Message::RpbGetResp:
                $code = 404;
                $pbResponse = new Api\Pb\Message\RpbGetResp();
                $pbResponse->decode($message);

                $objects = [];
                foreach ($pbResponse->getContent() as $content) {
                    /** @var Command\Object $command */
                    $command = $this->command;

                    $object = (new Object)
                        ->setData($command->getDecodedData($content->getValue(), $content->getContentType()))
                        ->setContentType($content->getContentType())
                        ->setContentEncoding($content->getContentEncoding())
                        ->setVclock($pbResponse->getVclock());

                    foreach ($content->getIndexes() as $rpbPair) {
                        $isIntIndex = Api\Http\Translator\SecondaryIndex::isIntIndex($rpbPair->getKey());
                        if ($isIntIndex) {
                            $value = intval($rpbPair->getValue());
                        } else {
                            $value = $rpbPair->getValue();
                        }
                        $object->addValueToIndex($rpbPair->getKey(), $value);
                    }

                    foreach ($content->getUsermeta() as $meta) {
                        $object->setMetaDataValue($meta->getKey(), $meta->getValue());
                    }

                    $objects[] = $object;
                }

                $object_count = count($objects);
                if ($object_count == 1) {
                    $code = 200;
                } elseif ($object_count > 1) {
                    $code = 300;
                }

                $this->response = new Command\Object\Response($this->success, $code, '', $location, $objects);
                break;
            case Api\Pb\Message::RpbGetBucketKeyPreflistResp:
                $code = 200;
                $pbResponse = new Api\Pb\Message\RpbGetBucketKeyPreflistResp();
                $pbResponse->decode($message);

                $items = [];
                foreach ($pbResponse->getPreflist() as $preflistItem) {
                    $item = new \stdClass();
                    $item->node = $preflistItem->getNode();
                    $item->partition = $preflistItem->getPartition();
                    $item->primary = $preflistItem->getPrimary();

                    $items[] = $item;
                }

                // for consistent interface with http
                $preflist = new \stdClass();
                $preflist->preflist = $items;

                $this->response = new Command\Object\Response($this->success, $code, '', $location, [new Object($preflist)]);
                break;
            /** @noinspection PhpMissingBreakStatementInspection */
            case Api\Pb\Message::RpbPingResp:
                $code = 200;
            case Api\Pb\Message::RpbDelResp:
            case Api\Pb\Message::RpbSetBucketResp:
                $this->response = new Command\Response($this->success, $code, '');
                break;
            case Api\Pb\Message::RpbGetBucketResp:
                $code = 200;
                $pbResponse = new Api\Pb\Message\RpbGetBucketResp();
                $pbResponse->decode($message);
                $pbProps = $pbResponse->getProps();

                $props = [];
                foreach ($pbProps->fields() as $field_position => $field_meta) {
                    $props[$field_meta['name']] = $pbProps->get($field_position);
                }

                $bucket = new Bucket($this->command->getBucket()->getName(), $this->command->getBucket()->getType(), $props);

                $this->response = new Command\Bucket\Response($this->success, $code, '', $bucket);
                break;
            case Api\Pb\Message::DtUpdateResp:
                $pbResponse = new Api\Pb\Message\DtUpdateResp();
                $pbResponse->decode($message);

                if ($pbResponse->getKey()) {
                    $code = 201;
                    $location = new Location($pbResponse->getKey(), $this->getCommand()->getBucket());
                }

                if ($pbResponse->getCounterValue()) {
                    $counter = new DataType\Counter($pbResponse->getCounterValue());
                    $this->response = new Command\DataType\Counter\Response($this->success, $code, '', $location, $counter);
                } elseif ($pbResponse->getSetValueCount()) {
                    $set = new DataType\Set($pbResponse->getSetValue(), $pbResponse->getContext());
                    $this->response = new Command\DataType\Set\Response($this->success, $code, '', $location, $set);
                } elseif ($pbResponse->getMapValueCount()) {
                    $map = new DataType\Map(Api\Pb\Translator\DataType::mapEntriesToArray($pbResponse->getMapValue()), $pbResponse->getContext());
                    $this->response = new Command\DataType\Map\Response($this->success, $code, '', $location, $map);
                } else {
                    $command = get_class($this->command);
                    if ($command == 'Basho\Riak\Command\DataType\Counter\Store') {
                        $this->response = new Command\DataType\Counter\Response($this->success, $code, '', $location);
                    } elseif ($command == 'Basho\Riak\Command\DataType\Set\Store') {
                        $this->response = new Command\DataType\Set\Response($this->success, $code, '', $location);
                    } elseif ($command == 'Basho\Riak\Command\DataType\Map\Store') {
                        $this->response = new Command\DataType\Map\Response($this->success, $code, '', $location);
                    } elseif ($command == 'Basho\Riak\Command\DataType\Hll\Store') {
                        $this->response = new Command\DataType\Hll\Response($this->success, $code, '', $location);
                    }
                }
                break;
            case Api\Pb\Message::DtFetchResp:
                $code = 200;
                $pbResponse = new Api\Pb\Message\DtFetchResp();
                $pbResponse->decode($message);

                // if value is null, the DT couldn't be found
                if ($pbResponse->getValue()) {
                    switch ($pbResponse->getType()) {
                        case Api\Pb\Message\DtFetchResp\DataType::COUNTER:
                            $counter = new DataType\Counter($pbResponse->getValue()->getCounterValue());
                            $this->response = new Command\DataType\Counter\Response($this->success, $code, '', null, $counter);
                            break;
                        case Api\Pb\Message\DtFetchResp\DataType::SET:
                            $set = new DataType\Set($pbResponse->getValue()->getSetValue(), $pbResponse->getContext());
                            $this->response = new Command\DataType\Set\Response($this->success, $code, '', null, $set);
                            break;
                        case Api\Pb\Message\DtFetchResp\DataType::MAP:
                            $map = new DataType\Map(Api\Pb\Translator\DataType::mapEntriesToArray($pbResponse->getValue()->getMapValue()), $pbResponse->getContext());
                            $this->response = new Command\DataType\Map\Response($this->success, $code, '', null, $map);
                            break;
                        case Api\Pb\Message\DtFetchResp\DataType::HLL:
                            $hll = new DataType\Hll($pbResponse->getValue()->getHllValue());
                            $this->response = new Command\DataType\Hll\Response($this->success, $code, '', null, $hll);
                            break;
                        default:
                            throw new Exception('Unknown data type.');
                    }
                } else {
                    $this->response = new Command\Response($this->success, 404, '');
                }
                break;
            case Api\Pb\Message::RpbMapRedResp:
                $code = null;
                $results = [];
                $pbResponse = new Api\Pb\Message\RpbMapRedResp();
                $pbResponse->decode($message);

                while ($code === null) {
                    if (!$pbResponse->getDone()) {
                        // We haven't received all responses from Riak, merge the results
                        $results = array_merge($results, json_decode($pbResponse->getResponse()));

                        // Continue reading from the socket
                        $length = $this->readMessageLength();
                        if ($this->readMessageCode() != Api\Pb\Message::RpbMapRedResp) {
                            throw new Exception('Unknown response from Riak.');
                        }
                        $message = $this->readMessage($length);
                        $pbResponse = new Api\Pb\Message\RpbMapRedResp();
                        $pbResponse->decode($message);
                    } else {
                        // All responses from Riak are complete, return a 200 code
                        $code = 200;
                    }
                }

                $this->response = new Command\MapReduce\Response($this->success, $code, '', $results);
                break;
            case Api\Pb\Message::RpbSearchQueryResp:
                $code = 200;
                $docs = [];
                $pbResponse = new Api\Pb\Message\RpbSearchQueryResp();
                $pbResponse->decode($message);

                foreach ($pbResponse->getDocs() as $pbDoc) {
                    $doc = new \stdClass();
                    foreach ($pbDoc->getFields() as $rpbPair) {
                        $doc->{$rpbPair->getKey()} = $rpbPair->getValue();
                    }
                    $docs[] = new Doc($doc);
                }

                $this->response = new Command\Search\Response($this->success, $code, '', $pbResponse->getNumFound(), $docs);
                break;
            case Api\Pb\Message::RpbYokozunaIndexGetResp:
                $code = 200;
                $pbResponse = new Api\Pb\Message\RpbYokozunaIndexGetResp();
                $pbResponse->decode($message);

                $index = new \stdClass();
                if ($pbResponse->getIndex()->count()) {
                    $index_resp = $pbResponse->getIndex()->offsetGet(0);
                    $index->name = $index_resp->getName();
                    $index->n_val = $index_resp->getNVal();
                    $index->schema = $index_resp->getSchema();
                }

                $this->response = new Command\Search\Index\Response($this->success, $code, '', $index);
                break;
            case Api\Pb\Message::RpbYokozunaSchemaGetResp:
                $code = 200;
                $pbResponse = new Api\Pb\Message\RpbYokozunaSchemaGetResp();
                $pbResponse->decode($message);

                $this->response = new Command\Search\Schema\Response($this->success, $code, '', $pbResponse->getSchema()->getContent(), Http::CONTENT_TYPE_XML);
                break;
            case Api\Pb\Message::RpbIndexResp:
                $code = 200;
                $pbResponse = new Api\Pb\Message\RpbIndexResp();
                $pbResponse->decode($message);

                // sane defaults
                $results = [];
                $termsReturned = false;
                $continuation = null;
                $done = true;

                if ($pbResponse->getKeys()) {
                    $results = $pbResponse->getKeys();
                }

                if ($pbResponse->getResultsCount()) {
                    foreach ($pbResponse->getResults() as $result) {
                        $results[] = [$result->getKey() => $result->getValue()];
                    }
                    $termsReturned = true;
                }

                if ($pbResponse->getContinuation()) {
                    $continuation = $pbResponse->getContinuation();
                    $done = false;
                }

                $this->response = new Command\Indexes\Response($this->success, $code, '', $results, $termsReturned, $continuation, $done);
                break;
            case Api\Pb\Message::TsDelResp:
            case Api\Pb\Message::TsPutResp:
                $this->success = true;

                $this->response = new Command\TimeSeries\Response($this->success, $code, '');
                break;
            case Api\Pb\Message::TsGetResp:
                $this->success = true;
                $pbResponse = new Api\Pb\Message\TsGetResp();
                $pbResponse->decode($message);

                $rows = [];
                foreach($pbResponse->getRows() as $row) {
                    $rows[] = Api\Pb\Translator\TimeSeries::fromPbRow($row, $pbResponse->getColumns());
                }

                $this->response = new Command\TimeSeries\Response($this->success, count($rows) ? 200 : 404, '', $rows);
                break;
            case Api\Pb\Message::TsQueryResp:
                $this->success = true;
                $pbResponse = new Api\Pb\Message\TsQueryResp();
                $pbResponse->decode($message);

                $rows = [];
                foreach($pbResponse->getRows() as $row) {
                    $rows[] = Api\Pb\Translator\TimeSeries::fromPbRow($row, $pbResponse->getColumns());
                }

                $this->response = new Command\TimeSeries\Query\Response($this->success, count($rows) ? 200 : 204, '', $rows);
                break;
            default:
                throw new Api\Exception('Mishandled PB response.');
        }
    }

    /**
     * Prepares the Riak PB message structure
     *
     * @return Api\Pb\Message\RpbContent
     */
    protected function prepareContent()
    {
        /** @var Command\Object $command */
        $command = $this->command;

        $content = new Api\Pb\Message\RpbContent();
        $content->setValue($command->getEncodedData());
        $content->setContentType($command->getObject()->getContentType());
        $content->setCharset($command->getObject()->getCharset());
        $content->setContentEncoding($command->getObject()->getContentEncoding());

        // append secondary indexes to the Content object
        foreach ($command->getObject()->getIndexes() as $key => $values) {
            $indexes = [];
            foreach ($values as $value) {
                $indexes[] = $this->toRpbPair($key, $value);
            }
            $content->setIndexes($indexes);
        }

        return $content;
    }

    /**
     * @return $this
     * @throws Exception
     */
    public function openConnection()
    {
        $protocol = $this->node->useTls() ? 'tls' : 'tcp';
        $socket = sprintf('%s://%s', $protocol, $this->node->getUri());

        $this->connection = @stream_socket_client($socket, $errNo, $errMsg, 30, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT);
        if ($this->connection === false || $errNo) {
            $this->error = $errNo . ' - ' . $errMsg;
        }

        return $this;
    }

    public function closeConnection()
    {
        if ($this->connection) {
            fclose($this->connection);
            $this->connection = null;
        }
    }

    /**
     * @return Pb\Message\DtUpdateReq
     */
    protected function buildDataTypeMessage()
    {
        $this->messageCode = Api\Pb\Message::DtUpdateReq;
        return new Api\Pb\Message\DtUpdateReq();
    }

    /**
     * @param $increment
     * @return Pb\Message\DtUpdateReq
     */
    protected function buildCounterUpdateMessage($increment)
    {
        $message = $this->buildDataTypeMessage();
        $message->setOp(Api\Pb\Translator\DataType::buildCounterOp($increment, true));

        return $message;
    }

    /**
     * @param array $adds
     * @param array $removes
     * @return Pb\Message\DtUpdateReq
     */
    protected function buildSetUpdateMessage(array $adds = [], array $removes = [])
    {
        $message = $this->buildDataTypeMessage();
        $message->setOp(Api\Pb\Translator\DataType::buildSetOp($adds, $removes, true));

        return $message;
    }

    /**
     * @param array $adds
     * @return Pb\Message\DtUpdateReq
     */
    protected function buildHllUpdateMessage(array $adds = [])
    {
        $message = $this->buildDataTypeMessage();
        $message->setOp(Api\Pb\Translator\DataType::buildHllOp($adds, true));

        return $message;
    }

    /**
     * @param array $updates
     * @param array $removes
     * @return Pb\Message\DtUpdateReq
     * @throws Exception
     */
    protected function buildMapUpdateMessage(array $updates = [], array $removes = [])
    {
        $message = $this->buildDataTypeMessage();
        $message->setOp(Api\Pb\Translator\DataType::buildMapOp($updates, $removes, true));

        return $message;
    }

    /**
     * @param Pb\Message\RpbGetReq|Pb\Message\RpbPutReq|\Google\Protobuf\Internal\Message $message
     * @param Location|null $location
     */
    protected function setLocationOnMessage(\Google\Protobuf\Internal\Message &$message, Location $location = null)
    {
        if (!empty($location)) {
            $message->setKey($location->getKey());
        }
    }

    /**
     * @param Pb\Message\RpbGetReq|Pb\Message\RpbPutReq|\Google\Protobuf\Internal\Message $message
     * @param Bucket|null $bucket
     */
    protected function setBucketOnMessage(\Google\Protobuf\Internal\Message &$message, Bucket $bucket = null)
    {
        if (!empty($bucket)) {
            $message->setBucket($bucket->getName());
            $message->setType($bucket->getType());
        }
    }

    /**
     * @param \Google\Protobuf\Internal\Message|Api\Pb\Message\RpbGetReq|Api\Pb\Message\RpbPutReq|Api\Pb\Message\RpbDelReq $message
     * @param Command $command
     */
    protected function setOptionsOnMessage(\Google\Protobuf\Internal\Message &$message, Command $command)
    {
        if ($command->getParameter('n_val')) {
            $message->setNVal($command->getParameter('n_val'));
        }

        if ($command->getParameter('r')) {
            $message->setR($command->getParameter('r'));
        }

        if ($command->getParameter('w')) {
            $message->setW($command->getParameter('w'));
        }

        if ($command->getParameter('pr')) {
            $message->setPr($command->getParameter('pr'));
        }

        if ($command->getParameter('pw')) {
            $message->setPw($command->getParameter('pw'));
        }

        if ($command->getParameter('dw')) {
            $message->setDw($command->getParameter('dw'));
        }

        if ($command->getParameter('rw')) {
            $message->setRw($command->getParameter('rw'));
        }

        if ($command->getParameter('basic_quorum')) {
            $message->setBasicQuorum($command->getParameter('basic_quorum'));
        }

        if ($command->getParameter('notfound_ok')) {
            $message->setNotfoundOk($command->getParameter('notfound_ok'));
        }

        if ($command->getParameter('if_modified')) {
            $message->setIfModified($command->getParameter('if_modified'));
        }

        if ($command->getParameter('if_not_modified')) {
            $message->setIfNotModified($command->getParameter('if_not_modified'));
        }

        if ($command->getParameter('return_body')) {
            $message->setReturnBody($command->getParameter('return_body'));
        }

        if ($command->getParameter('sloppy_quorum')) {
            $message->setSloppyQuorum($command->getParameter('sloppy_quorum'));
        }

        if ($command->getParameter('timeout')) {
            $message->setTimeout($command->getParameter('timeout'));
        }
    }

    protected function debug($value)
    {
        if ($this->command->isVerbose()) {
            echo "\n" . print_r($value, true);
        }
    }

    /**
     * Converts to Riak PB Pair message structure
     *
     * @param $key
     * @param $value
     * @return Api\Pb\Message\RpbPair
     */
    protected function toRpbPair($key, $value)
    {
        $pair = new Api\Pb\Message\RpbPair();
        $pair->setKey($key);
        $pair->setValue($value);

        return $pair;
    }

    public function readMessageLength()
    {
        // read response message length
        $array = unpack("N", $this->readBytes(4));
        return $array[1];
    }

    public function readMessageCode()
    {
        // read response message code
        $array = unpack("C", $this->readBytes(1));
        return $array[1];
    }

    public function readMessage($length)
    {
        $msglen = $length - 1;
        if ($msglen == 0) {
            // NB: this is a message-code only message
            // so no message body
            return;
        } else {
            return $this->readBytes($msglen);
        }
    }

    /**
     * @param $code
     * @param string $payload
     * @return string
     */
    protected function packMessage($code, $payload = '')
    {
        // https://github.com/basho/riak_pb#protocol
        return pack("NC", 1 + strlen($payload), $code) . $payload;
    }

    /**
     * @param integer $length
     * @return string
     */
    private function readBytes($length)
    {
        $bin = stream_get_contents($this->connection, $length);
        if ($bin == FALSE) {
            throw new Api\Exception("expected to read $length bytes, stream_get_contents() returned FALSE");
        }
        if (strlen($bin) != $length) {
            throw new Api\Exception("expected to read $length bytes, read " . sizeof($bin));
        }
        return $bin;
    }
}
