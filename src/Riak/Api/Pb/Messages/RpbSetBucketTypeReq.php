<?php
/**
 * Auto generated from riak.proto at 2015-08-19 22:45:58
 *
 * riak.api.pb.messages package
 */

namespace Riak\Api\Pb\Messages {
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
            'type' => '\Riak\Api\Pb\Messages\RpbBucketProps'
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
     * @param \Riak\Api\Pb\Messages\RpbBucketProps $value Property value
     *
     * @return null
     */
    public function setProps(\Riak\Api\Pb\Messages\RpbBucketProps $value)
    {
        return $this->set(self::PROPS, $value);
    }

    /**
     * Returns value of 'props' property
     *
     * @return \Riak\Api\Pb\Messages\RpbBucketProps
     */
    public function getProps()
    {
        return $this->get(self::PROPS);
    }
}
}