<?php
/**
 * Auto generated from riak_dt.proto at 2015-12-14 21:17:16
 *
 * basho.riak.api.pb.message package
 */
namespace Basho\Riak\Api\Pb\Message\MapField {
/**
 * MapFieldType enum embedded in MapField message
 */
final class MapFieldType
{
    const COUNTER = 1;
    const SET = 2;
    const REGISTER = 3;
    const FLAG = 4;
    const MAP = 5;

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
            'REGISTER' => self::REGISTER,
            'FLAG' => self::FLAG,
            'MAP' => self::MAP,
        );
    }
}
}