<?php

/*
Copyright 2015 Basho Technologies, Inc.

Licensed to the Apache Software Foundation (ASF) under one or more contributor license agreements.  See the NOTICE file
distributed with this work for additional information regarding copyright ownership.  The ASF licenses this file
to you under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance
with the License.  You may obtain a copy of the License at

  http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an
"AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.  See the License for the
specific language governing permissions and limitations under the License.
*/

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

        $this->openConnection();

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
                $this->messageCode = Api\Pb\Message\Codes::RpbListBucketsReq;
                $message = new Api\Pb\Message\RpbListBucketsReq();
                break;
            case 'Basho\Riak\Command\Bucket\Fetch':
                $this->messageCode = Api\Pb\Message\Codes::RpbGetBucketReq;
                $message = new Api\Pb\Message\RpbGetBucketReq();
                break;
            case 'Basho\Riak\Command\Bucket\Store':
                $this->messageCode = Api\Pb\Message\Codes::RpbSetBucketReq;
                $message = new Api\Pb\Message\RpbSetBucketReq();
                break;
            case 'Basho\Riak\Command\Bucket\Delete':
                $this->messageCode = Api\Pb\Message\Codes::RpbPutReq;
                $message = new Api\Pb\Message\RpbPutReq();
                break;
            case 'Basho\Riak\Command\Bucket\Keys':
                $this->messageCode = Api\Pb\Message\Codes::RpbListKeysReq;
                $message = new Api\Pb\Message\RpbListKeysReq();
                break;
            case 'Basho\Riak\Command\Object\Fetch':
                $this->messageCode = Api\Pb\Message\Codes::RpbGetReq;
                $message = new Api\Pb\Message\RpbGetReq();
                break;
            case 'Basho\Riak\Command\Object\Store':
                $this->messageCode = Api\Pb\Message\Codes::RpbPutReq;
                $message = new Api\Pb\Message\RpbPutReq();
                $message->setContent($this->prepareContent());
                break;
            case 'Basho\Riak\Command\Object\Delete':
                $this->messageCode = Api\Pb\Message\Codes::RpbPutReq;
                break;
            case 'Basho\Riak\Command\DataType\Counter\Fetch':
                $this->messageCode = Api\Pb\Message\Codes::DtFetchReq;
                break;
            case 'Basho\Riak\Command\DataType\Counter\Store':
                $message = $this->buildCounterUpdateMessage($this->command->getData()['increment']);
                break;
            case 'Basho\Riak\Command\DataType\Set\Fetch':
                $this->messageCode = Api\Pb\Message\Codes::DtFetchReq;
                break;
            case 'Basho\Riak\Command\DataType\Set\Store':
                $data = $this->command->getData();
                $message = $this->buildSetUpdateMessage($data['add_all'], $data['remove_all']);
                break;
            case 'Basho\Riak\Command\DataType\Map\Fetch':
                $this->messageCode = Api\Pb\Message\Codes::DtFetchReq;
                break;
            case 'Basho\Riak\Command\DataType\Map\Store':
                $data = $this->command->getData();
                $message = $this->buildMapUpdateMessage($data['update'], $data['remove']);
                break;
            case 'Basho\Riak\Command\Search\Index\Fetch':
                $this->messageCode = Api\Pb\Message\Codes::RpbYokozunaIndexGetReq;
                break;
            case 'Basho\Riak\Command\Search\Index\Store':
                $this->messageCode = Api\Pb\Message\Codes::RpbYokozunaIndexPutReq;
                break;
            case 'Basho\Riak\Command\Search\Index\Delete':
                $this->messageCode = Api\Pb\Message\Codes::RpbYokozunaIndexDeleteReq;
                break;
            case 'Basho\Riak\Command\Search\Schema\Fetch':
                $this->messageCode = Api\Pb\Message\Codes::RpbYokozunaSchemaGetReq;
                break;
            case 'Basho\Riak\Command\Search\Schema\Store':
                $this->messageCode = Api\Pb\Message\Codes::RpbYokozunaSchemaPutReq;
                break;
            case 'Basho\Riak\Command\Search\Fetch':
                $this->messageCode = Api\Pb\Message\Codes::RpbSearchQueryReq;
                break;
            case 'Basho\Riak\Command\MapReduce\Fetch':
                $this->messageCode = Api\Pb\Message\Codes::RpbMapRedReq;
                break;
            case 'Basho\Riak\Command\Indexes\Query':
                $this->messageCode = Api\Pb\Message\Codes::RpbMapRedReq;
                break;
            case 'Basho\Riak\Command\Ping':
                $this->messageCode = Api\Pb\Message\Codes::RpbPingReq;
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

        $packedMessage = $this->packMessage($this->messageCode, $message);

        $written = fwrite($this->connection, $packedMessage);
        if (!$written) {
            throw new Api\Exception('Failed to write to socket.');
        }

        // read response message length
        $array = unpack("N", stream_get_contents($this->connection, 4));
        $length = $array[1];

        // read response message code
        $array = unpack("C", stream_get_contents($this->connection, 1));
        $code = $array[1];

        // read response message
        $message = stream_get_contents($this->connection, $length - 1);

        $this->parseResponse($code, $message);

        return $this->success;
    }

    /**
     * @param $code
     * @param string $message
     * @throws Exception
     * @internal param string $response
     */
    protected function parseResponse($code, $message = '')
    {
        $this->success = true;
        switch ($code) {
            case Api\Pb\Message\Codes::RpbErrorResp:
                $pbResponse = new Api\Pb\Message\RpbErrorResp();
                $pbResponse->parseFromString($message);
                $this->success = false;
                $this->error = $pbResponse->getErrmsg();
                $this->response = new Command\Response($this->success, $pbResponse->getErrcode(), $this->error);
                break;
            case Api\Pb\Message\Codes::RpbPingResp:
                $this->response = new Command\Response($this->success, 200, '');
                break;
            case Api\Pb\Message\Codes::RpbPutResp:
                $location = null;
                $pbResponse = new Api\Pb\Message\RpbPutResp();
                $pbResponse->parseFromString($message);

                if ($pbResponse->getKey()) {
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

                $this->response = new Command\Object\Response($this->success, 200, '', $location, $objects);
                break;
            case Api\Pb\Message\Codes::RpbGetResp:
                $location = null;
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

                $this->response = new Command\Object\Response($this->success, 200, '', $location, $objects);
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
        $this->messageCode = Api\Pb\Message\Codes::DtUpdateReq;
        return new Api\Pb\Message\DtUpdateReq();
    }

    /**
     * @param $increment
     * @return Pb\Message\DtUpdateReq
     */
    protected function buildCounterUpdateMessage($increment)
    {
        $message = $this->buildDataTypeMessage();
        $message->setOp($this->buildCounterOp($increment, true));

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
        $message->setOp($this->buildSetOp($adds, $removes, true));

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
        $message->setOp($this->buildMapOp($updates, $removes, true));

        return $message;
    }

    /**
     * @param $increment
     * @param bool|false $returnAsDt
     * @return Pb\Message\CounterOp|Pb\Message\DtOp
     */
    protected function buildCounterOp($increment, $returnAsDt = false)
    {
        $cop = new Api\Pb\Message\CounterOp();
        $cop->setIncrement($increment);

        if ($returnAsDt) {
            $op = new Api\Pb\Message\DtOp();
            $op->setCounterOp($cop);

            return $op;
        }

        return $cop;
    }

    /**
     * @param array $adds
     * @param array $removes
     * @param bool|false $returnAsDt
     * @return Pb\Message\DtOp|Pb\Message\SetOp
     */
    protected function buildSetOp(array $adds, array $removes, $returnAsDt = false)
    {
        $sop = new Api\Pb\Message\SetOp();

        foreach ($adds as $add) {
            $sop->appendAdds($add);
        }

        foreach ($removes as $remove) {
            $sop->appendRemoves($remove);
        }

        if ($returnAsDt) {
            $op = new Api\Pb\Message\DtOp();
            $op->setSetOp($sop);

            return $op;
        }

        return $sop;
    }

    /**
     * @param array $updates
     * @param array $removes
     * @param bool|false $returnAsDt
     * @return Pb\Message\DtOp|Pb\Message\MapOp
     * @throws Exception
     */
    protected function buildMapOp(array $updates, array $removes, $returnAsDt = false)
    {
        $mop = new Api\Pb\Message\MapOp();

        foreach ($updates as $key => $update) {
            $mapUpdate = new Api\Pb\Message\MapUpdate();

            // [0] => key, [1] => type
            $parts = explode('_', $key);
            if ($parts[1] == DataType\Counter::TYPE) {
                $mapUpdate->setCounterOp($this->buildCounterOp($update));
            } elseif ($parts[1] == DataType\Set::TYPE) {
                $mapUpdate->setSetOp($this->buildSetOp($update['add_all'], $update['remove_all']));
            } elseif ($parts[1] == DataType\Map::TYPE) {
                $mapUpdate->setMapOp($this->buildMapOp($update['update'], $update['remove']));
            } elseif ($parts[1] == 'register') {
                $mapUpdate->setRegisterOp($update);
            } elseif ($parts[1] == 'flag') {
                $mapUpdate->setFlagOp($update);
            } else {
                throw new Exception('Invalid map field type.');
            }

            $mop->appendUpdates($update);
        }

        foreach ($removes as $remove) {
            $mop->appendRemoves($remove);
        }

        if ($returnAsDt) {
            $op = new Api\Pb\Message\DtOp();
            $op->setMapOp($mop);

            return $op;
        }

        return $mop;
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
}
