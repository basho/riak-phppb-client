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

        $this->assertEquals('test', $tsRow->getCellsAt(0)->getVarcharValue());
        $this->assertEquals(1, $tsRow->getCellsAt(1)->getSint64Value());
        $this->assertEquals(1.1, $tsRow->getCellsAt(2)->getDoubleValue());
        $this->assertEquals($now->getTimestamp(), $tsRow->getCellsAt(3)->getTimestampValue());
        $this->assertEquals($now->getTimestamp(), $tsRow->getCellsAt(4)->getTimestampValue());
    }
}
