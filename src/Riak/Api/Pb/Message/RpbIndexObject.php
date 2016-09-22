<?php
/**
 * Auto generated from riak_kv.proto at 2016-09-21 11:26:05
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbIndexObject message
 */
class RpbIndexObject extends \ProtobufMessage
{
    /* Field index constants */
    const KEY = 1;
    const OBJECT = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::KEY => array(
            'name' => 'key',
            'required' => true,
            'type' => 7,
        ),
        self::OBJECT => array(
            'name' => 'object',
            'required' => true,
            'type' => '\Basho\Riak\Api\Pb\Message\RpbGetResp'
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
        $this->values[self::KEY] = null;
        $this->values[self::OBJECT] = null;
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
     * Sets value of 'key' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setKey($value)
    {
        return $this->set(self::KEY, $value);
    }

    /**
     * Returns value of 'key' property
     *
     * @return string
     */
    public function getKey()
    {
        return $this->get(self::KEY);
    }

    /**
     * Sets value of 'object' property
     *
     * @param \Basho\Riak\Api\Pb\Message\RpbGetResp $value Property value
     *
     * @return null
     */
    public function setObject(\Basho\Riak\Api\Pb\Message\RpbGetResp $value)
    {
        return $this->set(self::OBJECT, $value);
    }

    /**
     * Returns value of 'object' property
     *
     * @return \Basho\Riak\Api\Pb\Message\RpbGetResp
     */
    public function getObject()
    {
        return $this->get(self::OBJECT);
    }
}
}