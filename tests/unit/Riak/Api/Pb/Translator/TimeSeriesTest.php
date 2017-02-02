<?php

namespace Basho\Tests\Riak\Api\Pb\Translator;

use Basho\Riak\Api\Pb\Translator\TimeSeries;
use Basho\Riak\TimeSeries\Cell;
use Basho\Tests\TestCase;

class TimeSeriesTest extends TestCase
{
    public function testToPbRow()
    {
        $now = new \DateTime();
        $row = [
            (new Cell('string'))->setValue('test'),
            (new Cell('int'))->setIntValue(1),
            (new Cell('double'))->setDoubleValue(1.1),
            (new Cell('bool'))->setBooleanValue(true),
            (new Cell('timestamp'))->setTimestampValue($now->getTimestamp()),
            (new Cell('timestampdt'))->setDateTimeValue($now),
        ];

        $tsRow = TimeSeries::toPbRow($row);

        $this->assertEquals('test', $tsRow->getCells()[0]->getVarcharValue());
        $this->assertEquals(1, $tsRow->getCells()[1]->getSint64Value());
        $this->assertEquals(1.1, $tsRow->getCells()[2]->getDoubleValue());
        $this->assertEquals(true, $tsRow->getCells()[3]->getBooleanValue());
        $this->assertEquals($now->getTimestamp(), $tsRow->getCells()[4]->getTimestampValue());
        $this->assertEquals($now->getTimestamp(), $tsRow->getCells()[5]->getTimestampValue());
    }
}
