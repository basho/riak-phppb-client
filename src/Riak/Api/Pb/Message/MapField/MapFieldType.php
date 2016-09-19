<?php
/**
 * Auto generated from riak_dt.proto at 2016-09-19 10:16:32
 *
 * Basho\Riak\Api\Pb\Message package
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