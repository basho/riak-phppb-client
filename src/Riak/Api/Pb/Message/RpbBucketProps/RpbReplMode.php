<?php
/**
 * Auto generated from riak.proto at 2015-08-19 22:45:58
 *
 * riak.api.pb.messages package
 */
namespace Basho\Riak\Api\Pb\Message\RpbBucketProps {
/**
 * RpbReplMode enum embedded in RpbBucketProps message
 */
final class RpbReplMode
{
    const FALSE = 0;
    const REALTIME = 1;
    const FULLSYNC = 2;
    const TRUE = 3;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'FALSE' => self::FALSE,
            'REALTIME' => self::REALTIME,
            'FULLSYNC' => self::FULLSYNC,
            'TRUE' => self::TRUE,
        );
    }
}
}