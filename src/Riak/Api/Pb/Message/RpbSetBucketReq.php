<?php
/**
 * Auto generated from riak.proto at 2016-05-06 13:12:07
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbSetBucketReq message
 */
class RpbSetBucketReq extends \ProtobufMessage
{
    /* Field index constants */
    const BUCKET = 1;
    const PROPS = 2;
    const TYPE = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::BUCKET => array(
            'name' => 'bucket',
            'required' => true,
            'type' => 7,
        ),
        self::PROPS => array(
            'name' => 'props',
            'required' => true,
            'type' => '\Basho\Riak\Api\Pb\Message\RpbBucketProps'
        ),
        self::TYPE => array(
            'name' => 'type',
            'required' => false,
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
        $this->values[self::BUCKET] = null;
        $this->values[self::PROPS] = null;
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
     * Sets value of 'bucket' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setBucket($value)
    {
        return $this->set(self::BUCKET, $value);
    }

    /**
     * Returns value of 'bucket' property
     *
     * @return string
     */
    public function getBucket()
    {
        return $this->get(self::BUCKET);
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