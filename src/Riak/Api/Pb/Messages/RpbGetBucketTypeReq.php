<?php
/**
 * Auto generated from riak.proto at 2015-08-19 22:45:58
 *
 * riak.api.pb.messages package
 */

namespace Riak\Api\Pb\Messages {
/**
 * RpbGetBucketTypeReq message
 */
class RpbGetBucketTypeReq extends \ProtobufMessage
{
    /* Field index constants */
    const TYPE = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::TYPE => array(
            'name' => 'type',
            'required' => true,
            'type' => 7,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::TYPE] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'type' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setType($value)
    {
        return $this->set(self::TYPE, $value);
    }

    /**
     * Returns value of 'type' property
     *
     * @return string
     */
    public function getType()
    {
        return $this->get(self::TYPE);
    }
}
}