<?php
/**
 * Auto generated from riak_dt.proto at 2016-12-13 21:45:39
 *
 * Basho\Riak\Api\Pb\Message package
 */
namespace Basho\Riak\Api\Pb\Message\DtFetchResp {
/**
 * DataType enum embedded in DtFetchResp message
 */
final class DataType
{
    const COUNTER = 1;
    const SET = 2;
    const MAP = 3;
    const HLL = 4;
    const GSET = 5;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'COUNTER' => self::COUNTER,
            'SET' => self::SET,
            'MAP' => self::MAP,
            'HLL' => self::HLL,
            'GSET' => self::GSET,
        );
    }
}
}