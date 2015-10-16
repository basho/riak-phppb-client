<?php
/**
 * Auto generated from riak_dt.proto at 2015-08-20 00:04:26
 *
 * riak.api.pb.messages package
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