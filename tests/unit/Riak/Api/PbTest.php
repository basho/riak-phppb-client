<?php

namespace Basho\Tests\Riak\Api;

use Basho\Riak;
use Basho\Tests\TestCase;

/**
 * Test Pb Api bridge class
 */
class PbTest extends TestCase
{
    /**
     * @dataProvider getCluster
     * @param $nodes array
     */
    public function testApi($nodes)
    {
        $riak = new Riak($nodes);
        $this->assertInstanceOf('Basho\Riak\Api\Pb', $riak->getApi());
    }
}
