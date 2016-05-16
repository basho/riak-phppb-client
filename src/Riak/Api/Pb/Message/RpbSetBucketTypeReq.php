<?php
/**
 * Auto generated from riak.proto at 2016-05-06 13:12:07
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbSetBucketTypeReq message
 */
class RpbSetBucketTypeReq extends \ProtobufMessage
{
    /* Field index constants */
    const TYPE = 1;
    const PROPS = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::TYPE => array(
            'name' => 'type',
            'required' => true,
            'type' => 7,
        ),
        self::PROPS => array(
            'name' => 'props',
            'required' => true,
            'type' => '\Basho\Riak\Api\Pb\Message\RpbBucketProps'
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
        $this->values[self::PROPS] = null;
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

    /**
     * Sets value of 'props' property
     *
     * @param \Basho\Riak\Api\Pb\Message\RpbBucketProps $value Property value
     *
     * @return null
     */
    public function setProps(\Basho\Riak\Api\Pb\Message\RpbBucketProps $value)
    {
        return $this->set(self::PROPS, $value);
    }

    /**
     * Returns value of 'props' property
     *
     * @return \Basho\Riak\Api\Pb\Message\RpbBucketProps
     */
    public function getProps()
    {
        return $this->get(self::PROPS);
    }
}
}