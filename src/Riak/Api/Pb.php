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
use Basho\Riak\Exception;
use Basho\Riak\Location;
use Basho\Riak\Node;
use Riak\Api\Pb\Messages\RpbContent;
use Riak\Api\Pb\Messages\RpbPair;
use Riak\Api\Pb\Messages\RpbPutReq;

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
     * PB message to be sent
     *
     * @var null
     */
    protected $message = null;

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

        // request specific connection preparation
        $this->prepareRequest();

        return $this;
    }

    /**
     * Sets up the PB message to be sent over the wire
     *
     * @return $this
     * @throws Exception
     */
    protected function prepareMessage()
    {
        $message = null;

        switch (get_class($this->command)) {
            case 'Basho\Riak\Command\Bucket\List':
            case 'Basho\Riak\Command\Bucket\Fetch':
            case 'Basho\Riak\Command\Bucket\Store':
            case 'Basho\Riak\Command\Bucket\Delete':
            case 'Basho\Riak\Command\Bucket\Keys':
            case 'Basho\Riak\Command\Object\Fetch':
                throw new \Basho\Riak\Api\Exception('Not implemented at this time.');
                break;
            case 'Basho\Riak\Command\Object\Store':
                $message = new RpbPutReq();
                $message->setContent($this->prepareContent());
               break;
            case 'Basho\Riak\Command\Object\Delete':
            case 'Basho\Riak\Command\DataType\Counter\Fetch':
            case 'Basho\Riak\Command\DataType\Counter\Store':
            case 'Basho\Riak\Command\DataType\Set\Fetch':
            case 'Basho\Riak\Command\DataType\Set\Store':
            case 'Basho\Riak\Command\DataType\Map\Fetch':
            case 'Basho\Riak\Command\DataType\Map\Store':
            case 'Basho\Riak\Command\Search\Index\Fetch':
            case 'Basho\Riak\Command\Search\Index\Store':
            case 'Basho\Riak\Command\Search\Index\Delete':
            case 'Basho\Riak\Command\Search\Schema\Fetch':
            case 'Basho\Riak\Command\Search\Schema\Store':
            case 'Basho\Riak\Command\Search\Fetch':
            case 'Basho\Riak\Command\MapReduce\Fetch':
            case 'Basho\Riak\Command\Indexes\Query':
                throw new \Basho\Riak\Api\Exception('Not implemented at this time.');
                break;
            default:
                throw new \Basho\Riak\Api\Exception('Command is invalid.');
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


        return $this;
    }

    /**
     * Prepares the Riak PB message structure
     *
     * @return RpbContent
     */
    protected function prepareContent()
    {
        /** @var Command\Object $command */
        $command = $this->command;

        $content = new RpbContent();
        $content->setValue($command->getData());
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
     * @return RpbPair
     */
    protected function toRpbPair($key, $value)
    {
        $pair = new RpbPair();
        $pair->setKey($key);
        $pair->setValue($value);

        return $pair;
    }

    /**
     * Prepare request
     *
     * Sets connection options that are specific to this request
     *
     * @return $this
     */
    protected function prepareRequest()
    {
        return $this->prepareMessage();
    }

    /**
     * Prepare request data
     *
     * @return $this
     */
    protected function prepareRequestData()
    {
        $this->requestBody = $this->command->getEncodedData();

        return $this;
    }

    public function send()
    {

        return $this->success;
    }

    public function openConnection()
    {
        $protocol = $this->node->useTls() ? 'tls' : 'tcp';
        $socket = sprintf('%s://%s', $protocol, $this->node->getUri());

        $this->connection = stream_socket_client($socket, $errNo, $errMsg, $this->node->getTimeout(), STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT);
        if ($errNo) {
            throw new \Basho\Riak\Api\Exception($errMsg);
        }

        return $this;
    }
}
