<?php
/**
 * Auto generated from riak_kv.proto at 2016-09-24 09:49:42
 *
 * Basho\Riak\Api\Pb\Message package
 */
namespace Basho\Riak\Api\Pb\Message\RpbIndexReq {
/**
 * IndexQueryType enum embedded in RpbIndexReq message
 */
final class IndexQueryType
{
    const eq = 0;
    const range = 1;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'eq' => self::eq,
            'range' => self::range,
        );
    }
}
}