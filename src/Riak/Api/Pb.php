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
use Basho\Riak\Command;
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
                $this->messageCode = Api\Pb\Message\Codes::RpbPutReq;
                break;
            case 'Basho\Riak\Command\Bucket\Fetch':
                $this->messageCode = Api\Pb\Message\Codes::RpbPutReq;
                break;
            case 'Basho\Riak\Command\Bucket\Store':
                $this->messageCode = Api\Pb\Message\Codes::RpbPutReq;
                break;
            case 'Basho\Riak\Command\Bucket\Delete':
                $this->messageCode = Api\Pb\Message\Codes::RpbPutReq;
                break;
            case 'Basho\Riak\Command\Bucket\Keys':
                $this->messageCode = Api\Pb\Message\Codes::RpbPutReq;
                break;
            case 'Basho\Riak\Command\Object\Fetch':
                $this->messageCode = Api\Pb\Message\Codes::RpbGetReq;
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
                $this->messageCode = Api\Pb\Message\Codes::RpbPutReq;
                break;
            case 'Basho\Riak\Command\DataType\Counter\Store':
                $this->messageCode = Api\Pb\Message\Codes::RpbPutReq;
                break;
            case 'Basho\Riak\Command\DataType\Set\Fetch':
                $this->messageCode = Api\Pb\Message\Codes::RpbPutReq;
                break;
            case 'Basho\Riak\Command\DataType\Set\Store':
                $this->messageCode = Api\Pb\Message\Codes::RpbPutReq;
                break;
            case 'Basho\Riak\Command\DataType\Map\Fetch':
                $this->messageCode = Api\Pb\Message\Codes::RpbPutReq;
                break;
            case 'Basho\Riak\Command\DataType\Map\Store':
                $this->messageCode = Api\Pb\Message\Codes::RpbPutReq;
                break;
            case 'Basho\Riak\Command\Search\Index\Fetch':
                $this->messageCode = Api\Pb\Message\Codes::RpbPutReq;
                break;
            case 'Basho\Riak\Command\Search\Index\Store':
                $this->messageCode = Api\Pb\Message\Codes::RpbPutReq;
                break;
            case 'Basho\Riak\Command\Search\Index\Delete':
                $this->messageCode = Api\Pb\Message\Codes::RpbPutReq;
                break;
            case 'Basho\Riak\Command\Search\Schema\Fetch':
                $this->messageCode = Api\Pb\Message\Codes::RpbPutReq;
                break;
            case 'Basho\Riak\Command\Search\Schema\Store':
                $this->messageCode = Api\Pb\Message\Codes::RpbPutReq;
                break;
            case 'Basho\Riak\Command\Search\Fetch':
                $this->messageCode = Api\Pb\Message\Codes::RpbPutReq;
                break;
            case 'Basho\Riak\Command\MapReduce\Fetch':
                $this->messageCode = Api\Pb\Message\Codes::RpbPutReq;
                break;
            case 'Basho\Riak\Command\Indexes\Query':
                throw new Api\Exception('Not implemented at this time.');
                break;
            case 'Basho\Riak\Command\Ping':
                $message = '';
                break;
            default:
                throw new Api\Exception('Command is invalid.');
        }

        $location = $this->command->getLocation();
        if (!empty($location) && $location instanceof Location) {
            $message->setKey($location->getKey());
            $message->setBucket($location->getBucket()->getName());
            $message->setType($location->getBucket()->getType());
        } elseif ($this->command->getBucket()) {
            $message->setBucket($this->command->getBucket()->getName());
            $message->setType($this->command->getBucket()->getType());
        }

        $this->requestMessage = $message;

        return $this;
    }

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

    public function send()
    {
        $response = '';

        $written = fwrite($this->connection, $this->requestMessage->serializeToString());
        if (!$written) {
            throw new Api\Exception('Failed to write to socket.');
        }

        // receive data - in small chunks :)
        while (!feof($this->connection))
        {
            $response .= fgets($this->connection, 128);
            if (!$response) {
                break;
            }
        }

        if (!$response) {
            throw new Api\Exception('Empty response from socket.');
        }

        $this->parseResponse($response);

        return $this->success;
    }

    /**
     * @param string $response
     * @throws Api\Exception
     */
    protected function parseResponse($response = '')
    {
        switch (substr($response, 0, 1)) {
            case '0':
                $message = new Api\Pb\Message\RpbErrorResp();
                $message->parseFromString($response);
                $this->success = false;
                $this->error = $message->getErrmsg();
                $this->response = new Command\Response($this->success, $message->getErrcode(), $this->error);
                break;
            case '12':
                $location = null;
                $message = new Api\Pb\Message\RpbPutResp();
                $message->parseFromString($response);

                if ($message->getKey()) {
                    $location = new Location($message->getKey(), $this->getCommand()->getBucket());
                }

                $objects = [];
                foreach ($message->getContent() as $content) {
                    /** @var Command\Object $command */
                    $command = $this->command;

                    $object = (new Object)
                        ->setData($command->getDecodedData($content->getValue(), $content->getContentType()))
                        ->setContentType($content->getContentType())
                        ->setContentEncoding($content->getContentEncoding())
                        ->setVclock($message->getVclock());

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

    public function openConnection()
    {
        $protocol = $this->node->useTls() ? 'tls' : 'tcp';
        $socket = sprintf('%s://%s', $protocol, $this->node->getUri());

        $this->connection = stream_socket_client($socket, $errNo, $errMsg, 30, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT);
        if ($errNo) {
            throw new Api\Exception($errNo . ' - ' . $errMsg);
        }

        return $this;
    }
}
