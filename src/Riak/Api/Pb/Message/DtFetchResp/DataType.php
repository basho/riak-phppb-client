<?php
/**
 * Auto generated from riak_dt.proto at 2016-05-06 13:12:12
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
        );
    }
}
}