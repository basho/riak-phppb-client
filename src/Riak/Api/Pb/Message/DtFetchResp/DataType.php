<?php
/**
 * Auto generated from riak_dt.proto at 2015-12-14 21:17:16
 *
 * basho.riak.api.pb.message package
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