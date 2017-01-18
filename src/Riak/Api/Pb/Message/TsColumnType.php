<?php
/**
 * Auto generated from riak_ts.proto at 2016-12-13 21:45:39
 *
 * Basho\Riak\Api\Pb\Message package
 */
namespace Basho\Riak\Api\Pb\Message {
/**
 * TsColumnType enum
 */
final class TsColumnType
{
    const VARCHAR = 0;
    const SINT64 = 1;
    const DOUBLE = 2;
    const TIMESTAMP = 3;
    const BOOLEAN = 4;
    const BLOB = 5;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'VARCHAR' => self::VARCHAR,
            'SINT64' => self::SINT64,
            'DOUBLE' => self::DOUBLE,
            'TIMESTAMP' => self::TIMESTAMP,
            'BOOLEAN' => self::BOOLEAN,
            'BLOB' => self::BLOB,
        );
    }
}
}