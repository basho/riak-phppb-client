<?php
/**
 * Auto generated from riak_dt.proto at 2016-12-13 21:45:39
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * DtOp message
 */
class DtOp extends \ProtobufMessage
{
    /* Field index constants */
    const COUNTER_OP = 1;
    const SET_OP = 2;
    const MAP_OP = 3;
    const HLL_OP = 4;
    const GSET_OP = 5;

    /* @var array Field descriptors */
    protected static $fields = array(
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
        self::MAP_OP => array(
            'name' => 'map_op',
            'required' => false,
            'type' => '\Basho\Riak\Api\Pb\Message\MapOp'
        ),
        self::HLL_OP => array(
            'name' => 'hll_op',
            'required' => false,
            'type' => '\Basho\Riak\Api\Pb\Message\HllOp'
        ),
        self::GSET_OP => array(
            'name' => 'gset_op',
            'required' => false,
            'type' => '\Basho\Riak\Api\Pb\Message\GSetOp'
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
        $this->values[self::COUNTER_OP] = null;
        $this->values[self::SET_OP] = null;
        $this->values[self::MAP_OP] = null;
        $this->values[self::HLL_OP] = null;
        $this->values[self::GSET_OP] = null;
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

    /**
     * Sets value of 'hll_op' property
     *
     * @param \Basho\Riak\Api\Pb\Message\HllOp $value Property value
     *
     * @return null
     */
    public function setHllOp(\Basho\Riak\Api\Pb\Message\HllOp $value)
    {
        return $this->set(self::HLL_OP, $value);
    }

    /**
     * Returns value of 'hll_op' property
     *
     * @return \Basho\Riak\Api\Pb\Message\HllOp
     */
    public function getHllOp()
    {
        return $this->get(self::HLL_OP);
    }

    /**
     * Sets value of 'gset_op' property
     *
     * @param \Basho\Riak\Api\Pb\Message\GSetOp $value Property value
     *
     * @return null
     */
    public function setGsetOp(\Basho\Riak\Api\Pb\Message\GSetOp $value)
    {
        return $this->set(self::GSET_OP, $value);
    }

    /**
     * Returns value of 'gset_op' property
     *
     * @return \Basho\Riak\Api\Pb\Message\GSetOp
     */
    public function getGsetOp()
    {
        return $this->get(self::GSET_OP);
    }
}
}