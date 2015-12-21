<?php

namespace Basho\Tests;

use Basho\Riak;
use Basho\Riak\Command;

/**
 * Scenario tests for when you use PB client to connect to HTTP Riak interface
 *
 * @author Christopher Mancini <cmancini at basho d0t com>
 */
class HttpResponseTest extends TestCase
{
    /**
     * @expectedException \Basho\Riak\Api\Exception
     */
    public function testHttpResponseDetection()
    {
        // configure with HTTP port
        $node = (new Riak\Node\Builder)
            ->atHost(static::getTestHost())
            ->onPort(static::TEST_NODE_HTTP_PORT)
            ->build();

        $riak = new Riak([$node], [], static::getApiBridgeClass());

        (new Command\Builder\StoreObject($riak))
            ->buildObject('some_data')
            ->buildLocation('some_key', 'test', static::LEVELDB_BUCKET_TYPE)
            ->build()
            ->execute();
    }
}
