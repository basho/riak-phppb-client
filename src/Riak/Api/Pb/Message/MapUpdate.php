<?php
/**
 * Auto generated from riak_dt.proto at 2016-05-06 13:12:12
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * MapUpdate message
 */
class MapUpdate extends \ProtobufMessage
{
    /* Field index constants */
    const FIELD = 1;
    const COUNTER_OP = 2;
    const SET_OP = 3;
    const REGISTER_OP = 4;
    const FLAG_OP = 5;
    const MAP_OP = 6;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::FIELD => array(
            'name' => 'field',
            'required' => true,
            'type' => '\Basho\Riak\Api\Pb\Message\MapField'
        ),
        self::COUNTER_OP => array(
            'name' => 'counter_op',
            'required' => false,
            'type' => '\Basho\Riak\Api\Pb\Message\CounterOp'
        ),
        self::SET_OP => array(
            'name' => 'set_op',
            'required' => false,
            'type' => '\Basho\Riak\Api\Pb\Message\SetOp'
        ),
        self::REGISTER_OP => array(
            'name' => 'register_op',
            'required' => false,
            'type' => 7,
        ),
        self::FLAG_OP => array(
            'name' => 'flag_op',
            'required' => false,
            'type' => 5,
        ),
        self::MAP_OP => array(
            'name' => 'map_op',
            'required' => false,
            'type' => '\Basho\Riak\Api\Pb\Message\MapOp'
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
        $this->values[self::FIELD] = null;
        $this->values[self::COUNTER_OP] = null;
        $this->values[self::SET_OP] = null;
        $this->values[self::REGISTER_OP] = null;
        $this->values[self::FLAG_OP] = null;
        $this->values[self::MAP_OP] = null;
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
     * Sets value of 'field' property
     *
     * @param \Basho\Riak\Api\Pb\Message\MapField $value Property value
     *
     * @return null
     */
    public function setField(\Basho\Riak\Api\Pb\Message\MapField $value)
    {
        return $this->set(self::FIELD, $value);
    }

    /**
     * Returns value of 'field' property
     *
     * @return \Basho\Riak\Api\Pb\Message\MapField
     */
    public function getField()
    {
        return $this->get(self::FIELD);
    }

    /**
     * Sets value of 'counter_op' property
     *
     * @param \Basho\Riak\Api\Pb\Message\CounterOp $value Property value
     *
     * @return null
     */
    public function setCounterOp(\Basho\Riak\Api\Pb\Message\CounterOp $value)
    {
        return $this->set(self::COUNTER_OP, $value);
    }

    /**
     * Returns value of 'counter_op' property
     *
     * @return \Basho\Riak\Api\Pb\Message\CounterOp
     */
    public function getCounterOp()
    {
        return $this->get(self::COUNTER_OP);
    }

    /**
     * Sets value of 'set_op' property
     *
     * @param \Basho\Riak\Api\Pb\Message\SetOp $value Property value
     *
     * @return null
     */
    public function setSetOp(\Basho\Riak\Api\Pb\Message\SetOp $value)
    {
        return $this->set(self::SET_OP, $value);
    }

    /**
     * Returns value of 'set_op' property
     *
     * @return \Basho\Riak\Api\Pb\Message\SetOp
     */
    public function getSetOp()
    {
        return $this->get(self::SET_OP);
    }

    /**
     * Sets value of 'register_op' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setRegisterOp($value)
    {
        return $this->set(self::REGISTER_OP, $value);
    }

    /**
     * Returns value of 'register_op' property
     *
     * @return string
     */
    public function getRegisterOp()
    {
        return $this->get(self::REGISTER_OP);
    }

    /**
     * Sets value of 'flag_op' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setFlagOp($value)
    {
        return $this->set(self::FLAG_OP, $value);
    }

    /**
     * Returns value of 'flag_op' property
     *
     * @return int
     */
    public function getFlagOp()
    {
        return $this->get(self::FLAG_OP);
    }

    /**
     * Sets value of 'map_op' property
     *
     * @param \Basho\Riak\Api\Pb\Message\MapOp $value Property value
     *
     * @return null
     */
    public function setMapOp(\Basho\Riak\Api\Pb\Message\MapOp $value)
    {
        return $this->set(self::MAP_OP, $value);
    }

    /**
     * Returns value of 'map_op' property
     *
     * @return \Basho\Riak\Api\Pb\Message\MapOp
     */
    public function getMapOp()
    {
        return $this->get(self::MAP_OP);
    }
}
}