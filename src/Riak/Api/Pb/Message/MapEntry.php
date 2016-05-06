<?php
/**
 * Auto generated from riak_dt.proto at 2016-05-06 13:12:12
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * MapEntry message
 */
class MapEntry extends \ProtobufMessage
{
    /* Field index constants */
    const FIELD = 1;
    const COUNTER_VALUE = 2;
    const SET_VALUE = 3;
    const REGISTER_VALUE = 4;
    const FLAG_VALUE = 5;
    const MAP_VALUE = 6;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::FIELD => array(
            'name' => 'field',
            'required' => true,
            'type' => '\Basho\Riak\Api\Pb\Message\MapField'
        ),
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
        self::REGISTER_VALUE => array(
            'name' => 'register_value',
            'required' => false,
            'type' => 7,
        ),
        self::FLAG_VALUE => array(
            'name' => 'flag_value',
            'required' => false,
            'type' => 8,
        ),
        self::MAP_VALUE => array(
            'name' => 'map_value',
            'repeated' => true,
            'type' => '\Basho\Riak\Api\Pb\Message\MapEntry'
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
        $this->values[self::COUNTER_VALUE] = null;
        $this->values[self::SET_VALUE] = array();
        $this->values[self::REGISTER_VALUE] = null;
        $this->values[self::FLAG_VALUE] = null;
        $this->values[self::MAP_VALUE] = array();
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
     * Sets value of 'register_value' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setRegisterValue($value)
    {
        return $this->set(self::REGISTER_VALUE, $value);
    }

    /**
     * Returns value of 'register_value' property
     *
     * @return string
     */
    public function getRegisterValue()
    {
        return $this->get(self::REGISTER_VALUE);
    }

    /**
     * Sets value of 'flag_value' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setFlagValue($value)
    {
        return $this->set(self::FLAG_VALUE, $value);
    }

    /**
     * Returns value of 'flag_value' property
     *
     * @return bool
     */
    public function getFlagValue()
    {
        return $this->get(self::FLAG_VALUE);
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
}
}