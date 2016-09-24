<?php
/**
 * Auto generated from riak_dt.proto at 2016-09-24 09:49:42
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * DtValue message
 */
class DtValue extends \ProtobufMessage
{
    /* Field index constants */
    const COUNTER_VALUE = 1;
    const SET_VALUE = 2;
    const MAP_VALUE = 3;
    const HLL_VALUE = 4;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::COUNTER_VALUE => array(
            'name' => 'counter_value',
            'required' => false,
            'type' => 6,
        ),
        self::SET_VALUE => array(
            'name' => 'set_value',
            'repeated' => true,
            'type' => 7,
        ),
        self::MAP_VALUE => array(
            'name' => 'map_value',
            'repeated' => true,
            'type' => '\Basho\Riak\Api\Pb\Message\MapEntry'
        ),
        self::HLL_VALUE => array(
            'name' => 'hll_value',
            'required' => false,
            'type' => 5,
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
        $this->values[self::COUNTER_VALUE] = null;
        $this->values[self::SET_VALUE] = array();
        $this->values[self::MAP_VALUE] = array();
        $this->values[self::HLL_VALUE] = null;
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
     * Sets value of 'counter_value' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setCounterValue($value)
    {
        return $this->set(self::COUNTER_VALUE, $value);
    }

    /**
     * Returns value of 'counter_value' property
     *
     * @return int
     */
    public function getCounterValue()
    {
        return $this->get(self::COUNTER_VALUE);
    }

    /**
     * Appends value to 'set_value' list
     *
     * @param string $value Value to append
     *
     * @return null
     */
    public function appendSetValue($value)
    {
        return $this->append(self::SET_VALUE, $value);
    }

    /**
     * Clears 'set_value' list
     *
     * @return null
     */
    public function clearSetValue()
    {
        return $this->clear(self::SET_VALUE);
    }

    /**
     * Returns 'set_value' list
     *
     * @return string[]
     */
    public function getSetValue()
    {
        return $this->get(self::SET_VALUE);
    }

    /**
     * Returns 'set_value' iterator
     *
     * @return ArrayIterator
     */
    public function getSetValueIterator()
    {
        return new \ArrayIterator($this->get(self::SET_VALUE));
    }

    /**
     * Returns element from 'set_value' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return string
     */
    public function getSetValueAt($offset)
    {
        return $this->get(self::SET_VALUE, $offset);
    }

    /**
     * Returns count of 'set_value' list
     *
     * @return int
     */
    public function getSetValueCount()
    {
        return $this->count(self::SET_VALUE);
    }

    /**
     * Appends value to 'map_value' list
     *
     * @param \Basho\Riak\Api\Pb\Message\MapEntry $value Value to append
     *
     * @return null
     */
    public function appendMapValue(\Basho\Riak\Api\Pb\Message\MapEntry $value)
    {
        return $this->append(self::MAP_VALUE, $value);
    }

    /**
     * Clears 'map_value' list
     *
     * @return null
     */
    public function clearMapValue()
    {
        return $this->clear(self::MAP_VALUE);
    }

    /**
     * Returns 'map_value' list
     *
     * @return \Basho\Riak\Api\Pb\Message\MapEntry[]
     */
    public function getMapValue()
    {
        return $this->get(self::MAP_VALUE);
    }

    /**
     * Returns 'map_value' iterator
     *
     * @return ArrayIterator
     */
    public function getMapValueIterator()
    {
        return new \ArrayIterator($this->get(self::MAP_VALUE));
    }

    /**
     * Returns element from 'map_value' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return \Basho\Riak\Api\Pb\Message\MapEntry
     */
    public function getMapValueAt($offset)
    {
        return $this->get(self::MAP_VALUE, $offset);
    }

    /**
     * Returns count of 'map_value' list
     *
     * @return int
     */
    public function getMapValueCount()
    {
        return $this->count(self::MAP_VALUE);
    }

    /**
     * Sets value of 'hll_value' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setHllValue($value)
    {
        return $this->set(self::HLL_VALUE, $value);
    }

    /**
     * Returns value of 'hll_value' property
     *
     * @return int
     */
    public function getHllValue()
    {
        return $this->get(self::HLL_VALUE);
    }
}
}