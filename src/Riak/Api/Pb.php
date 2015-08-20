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

    public function closeConnection()
    {
        fclose($this->connection);
        $this->connection = null;
    }

    /**
     * Prepare request to be sentphp
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
     * Sets the API path for the command
     *
     * @return $this
     */
    protected function buildPath()
    {
        $bucket = null;
        $key = '';

        $bucket = $this->command->getBucket();

        $location = $this->command->getLocation();
        if (!empty($location) && $location instanceof Location) {
            $key = $location->getKey();
        }
        switch (get_class($this->command)) {
            case 'Basho\Riak\Command\Bucket\List':
                $this->path = sprintf('/types/%s/buckets/%s', $bucket->getType(), $bucket->getName());
                break;
            case 'Basho\Riak\Command\Bucket\Fetch':
            case 'Basho\Riak\Command\Bucket\Store':
            case 'Basho\Riak\Command\Bucket\Delete':
                $this->path = sprintf('/types/%s/buckets/%s/props', $bucket->getType(), $bucket->getName());
                break;
            case 'Basho\Riak\Command\Bucket\Keys':
                $this->path = sprintf('/types/%s/buckets/%s/keys', $bucket->getType(), $bucket->getName());
                break;
            case 'Basho\Riak\Command\Object\Fetch':
            case 'Basho\Riak\Command\Object\Store':
            case 'Basho\Riak\Command\Object\Delete':
                $this->path = sprintf('/types/%s/buckets/%s/keys/%s', $bucket->getType(), $bucket->getName(), $key);
                break;
            case 'Basho\Riak\Command\DataType\Counter\Fetch':
            case 'Basho\Riak\Command\DataType\Counter\Store':
            case 'Basho\Riak\Command\DataType\Set\Fetch':
            case 'Basho\Riak\Command\DataType\Set\Store':
            case 'Basho\Riak\Command\DataType\Map\Fetch':
            case 'Basho\Riak\Command\DataType\Map\Store':
            $this->path = sprintf('/types/%s/buckets/%s/datatypes/%s', $bucket->getType(), $bucket->getName(),
                $key);
                break;
            case 'Basho\Riak\Command\Search\Index\Fetch':
            case 'Basho\Riak\Command\Search\Index\Store':
            case 'Basho\Riak\Command\Search\Index\Delete':
                $this->path = sprintf('/search/index/%s', $this->command);
                break;
            case 'Basho\Riak\Command\Search\Schema\Fetch':
            case 'Basho\Riak\Command\Search\Schema\Store':
                $this->path = sprintf('/search/schema/%s', $this->command);
                break;
            case 'Basho\Riak\Command\Search\Fetch':
                $this->path = sprintf('/search/query/%s', $this->command);
                break;
            case 'Basho\Riak\Command\MapReduce\Fetch':
                $this->path = sprintf('/%s', $this->config['mapred_prefix']);
                break;
            case 'Basho\Riak\Command\Indexes\Query':
                $this->path = $this->createIndexQueryPath($bucket);
                break;
            default:
                $this->path = '';
        }

        return $this;
    }

    /**
     * Generates the URL path for a 2i Query
     *
     * @param Bucket $bucket
     * @return string
     * @throws Exception if 2i query is invalid.
     */
    private function createIndexQueryPath(Bucket $bucket)
    {
        /**  @var Command\Indexes\Query $command */
        $command = $this->command;

        if($command->isMatchQuery()) {
            $path =  sprintf('/types/%s/buckets/%s/index/%s/%s', $bucket->getType(),
                        $bucket->getName(),
                        $command->getIndexName(),
                        $command->getMatchValue());
        }
        elseif($command->isRangeQuery()) {
            $path =  sprintf('/types/%s/buckets/%s/index/%s/%s/%s', $bucket->getType(),
                        $bucket->getName(),
                        $command->getIndexName(),
                        $command->getLowerBound(),
                        $command->getUpperBound());
        }
        else
        {
            throw new Exception("Invalid Secondary Index Query.");
        }

        return $path;
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
        return $this->prepareRequestData();
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
