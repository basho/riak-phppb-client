<?php

namespace Basho\Riak\Api;

use Basho\Riak\Api;
use Basho\Riak\ApiInterface;
use Basho\Riak\Bucket;
use Basho\Riak\Command;
use Basho\Riak\DataType;
use Basho\Riak\Location;
use Basho\Riak\Node;
use Basho\Riak\Object;

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
     * @var \ProtobufMessage|null
     */
    protected $requestMessage = null;

    /**
     * PB response received
     *
     * @var \ProtobufMessage|null
     */
    protected $responseMessage = null;

    public function closeConnection()
    {
        fclose($this->connection);
        $this->connection = null;
    }

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
                $message->setContent($this->prepareContent());
                break;
            case 'Basho\Riak\Command\Object\Delete':
                $this->messageCode = Api\Pb\Message::RpbDelReq;
                $message = new Api\Pb\Message\RpbDelReq();
                break;
            case 'Basho\Riak\Command\DataType\Counter\Fetch':
            case 'Basho\Riak\Command\DataType\Set\Fetch':
            case 'Basho\Riak\Command\DataType\Map\Fetch':
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
            case 'Basho\Riak\Command\Search\Index\Fetch':
                $this->messageCode = Api\Pb\Message::RpbYokozunaIndexGetReq;
                break;
            case 'Basho\Riak\Command\Search\Index\Store':
                $this->messageCode = Api\Pb\Message::RpbYokozunaIndexPutReq;
                break;
            case 'Basho\Riak\Command\Search\Index\Delete':
                $this->messageCode = Api\Pb\Message::RpbYokozunaIndexDeleteReq;
                break;
            case 'Basho\Riak\Command\Search\Schema\Fetch':
                $this->messageCode = Api\Pb\Message::RpbYokozunaSchemaGetReq;
                break;
            case 'Basho\Riak\Command\Search\Schema\Store':
                $this->messageCode = Api\Pb\Message::RpbYokozunaSchemaPutReq;
                break;
            case 'Basho\Riak\Command\Search\Fetch':
                $this->messageCode = Api\Pb\Message::RpbSearchQueryReq;
                break;
            case 'Basho\Riak\Command\MapReduce\Fetch':
                $this->messageCode = Api\Pb\Message::RpbMapRedReq;
                $message = new Api\Pb\Message\RpbMapRedReq();
                $message->setContentType(Http::CONTENT_TYPE_JSON);
                $message->setRequest($this->command->getEncodedData());
                break;
            case 'Basho\Riak\Command\Indexes\Query':
                $this->messageCode = Api\Pb\Message::RpbMapRedReq;
                break;
            case 'Basho\Riak\Command\Ping':
                $this->messageCode = Api\Pb\Message::RpbPingReq;
                $message = '';
                break;
            default:
                throw new Api\Exception('Command is invalid.');
        }

        $this->setLocationOnMessage($message, $this->command->getLocation());
        $this->setBucketOnMessage($message, $this->command->getBucket());
        $this->setOptionsOnMessage($message, $this->command);

        $this->requestMessage = $message;

        return $this;
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
        foreach ($command->getObject()->getIndexes() as $key => $value) {
            $content->appendIndexes($this->toRpbPair($key, $value));
        }

        return $content;
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

        $written = fwrite($this->connection, $packedMessage);
        if (!$written) {
            throw new Api\Exception('Failed to write to socket.');
        }

        $length = $this->readMessageLength();
        $message_code = $this->readMessageCode();
        $message = $this->readMessage($length);

        $this->parseResponse($message_code, $message);

        return $this->success;
    }

    public function readMessageLength()
    {
        // read response message length
        $array = unpack("N", stream_get_contents($this->connection, 4));
        return $array[1];
    }

    public function readMessageCode()
    {
        // read response message code
        $array = unpack("C", stream_get_contents($this->connection, 1));
        return $array[1];
    }

    public function readMessage($length)
    {
        return stream_get_contents($this->connection, $length - 1);
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
     *
     * @param $message_code     PB Message identifier @see Basho\Riak\Api\Pb\Message
     * @param string $message   Binary message
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
                $pbResponse->parseFromString($message);
                $this->success = false;
                $this->error = $pbResponse->getErrmsg();
                $this->response = new Command\Response($this->success, $pbResponse->getErrcode(), $this->error);
                break;
            case Api\Pb\Message::RpbPingResp:
                $this->response = new Command\Response($this->success, $code, '');
                break;
            case Api\Pb\Message::RpbPutResp:
                $pbResponse = new Api\Pb\Message\RpbPutResp();
                $pbResponse->parseFromString($message);

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

                    // TODO: add index values

                    // TODO: add user meta data

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
                $pbResponse->parseFromString($message);

                $objects = [];
                foreach ($pbResponse->getContent() as $content) {
                    /** @var Command\Object $command */
                    $command = $this->command;

                    $object = (new Object)
                        ->setData($command->getDecodedData($content->getValue(), $content->getContentType()))
                        ->setContentType($content->getContentType())
                        ->setContentEncoding($content->getContentEncoding())
                        ->setVclock($pbResponse->getVclock());

                    // TODO: add index values

                    // TODO: add user meta data

                    $objects[] = $object;
                }

                if ($objects) {
                    $code = 200;
                }

                $this->response = new Command\Object\Response($this->success, $code, '', $location, $objects);
                break;
            case Api\Pb\Message::RpbDelResp:
                $this->response = new Command\Response($this->success, $code, '');
                break;
            case Api\Pb\Message::DtUpdateResp:
                $pbResponse = new Api\Pb\Message\DtUpdateResp();
                $pbResponse->parseFromString($message);

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
                    }
                }
                break;
            case Api\Pb\Message::DtFetchResp:
                $code = 200;
                $pbResponse = new Api\Pb\Message\DtFetchResp();
                $pbResponse->parseFromString($message);

                // if value is null, the DT couldn't be found
                if (!empty($pbResponse->getValue())) {
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
                $pbResponse->parseFromString($message);

                while ($code === null) {
                    $this->debug($pbResponse);
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
                        $pbResponse->parseFromString($message);
                    } else {
                        // All responses from Riak are complete, return a 200 code
                        $code = 200;
                    }
                }

                $this->response = new Command\MapReduce\Response($this->success, $code, '', $results);
                break;
            default:
                throw new Api\Exception('Mishandled PB response.');
        }
    }

    /**
     * @return $this
     * @throws Exception
     */
    public function openConnection()
    {
        $protocol = $this->node->useTls() ? 'tls' : 'tcp';
        $socket = sprintf('%s://%s', $protocol, $this->node->getUri());

        $this->connection = stream_socket_client($socket, $errNo, $errMsg, 30, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT);
        if ($errNo) {
            throw new Api\Exception($errNo . ' - ' . $errMsg);
        }

        return $this;
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
     * @param Pb\Message\RpbGetReq|Pb\Message\RpbPutReq|\ProtobufMessage $message
     * @param Location|null $location
     */
    protected function setLocationOnMessage(\ProtobufMessage &$message, Location $location = null)
    {
        if (!empty($location)) {
            $message->setKey($location->getKey());
        }
    }

    /**
     * @param Pb\Message\RpbGetReq|Pb\Message\RpbPutReq|\ProtobufMessage $message
     * @param Bucket|null $bucket
     */
    protected function setBucketOnMessage(\ProtobufMessage &$message, Bucket $bucket = null)
    {
        if (!empty($bucket)) {
            $message->setBucket($bucket->getName());
            $message->setType($bucket->getType());
        }
    }

    protected function setOptionsOnMessage(\ProtobufMessage &$message, Command $command)
    {
        // TODO: RETURN_BODY, R, W, PR, PW, DW, N, etc
    }

    protected function debug($value) {
        if ($this->command->isVerbose()) {
            echo "\n" . print_r($value, true);
        }
    }
}
