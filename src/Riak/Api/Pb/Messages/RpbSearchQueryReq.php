<?php
/**
 * Auto generated from riak_search.proto at 2015-08-20 00:06:07
 *
 * riak.api.pb.messages package
 */

namespace Riak\Api\Pb\Messages {
/**
 * RpbSearchQueryReq message
 */
class RpbSearchQueryReq extends \ProtobufMessage
{
    /* Field index constants */
    const Q = 1;
    const INDEX = 2;
    const ROWS = 3;
    const START = 4;
    const SORT = 5;
    const FILTER = 6;
    const DF = 7;
    const OP = 8;
    const FL = 9;
    const PRESORT = 10;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::Q => array(
            'name' => 'q',
            'required' => true,
            'type' => 7,
        ),
        self::INDEX => array(
            'name' => 'index',
            'required' => true,
            'type' => 7,
        ),
        self::ROWS => array(
            'name' => 'rows',
            'required' => false,
            'type' => 5,
        ),
        self::START => array(
            'name' => 'start',
            'required' => false,
            'type' => 5,
        ),
        self::SORT => array(
            'name' => 'sort',
            'required' => false,
            'type' => 7,
        ),
        self::FILTER => array(
            'name' => 'filter',
            'required' => false,
            'type' => 7,
        ),
        self::DF => array(
            'name' => 'df',
            'required' => false,
            'type' => 7,
        ),
        self::OP => array(
            'name' => 'op',
            'required' => false,
            'type' => 7,
        ),
        self::FL => array(
            'name' => 'fl',
            'repeated' => true,
            'type' => 7,
        ),
        self::PRESORT => array(
            'name' => 'presort',
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
        $this->values[self::Q] = null;
        $this->values[self::INDEX] = null;
        $this->values[self::ROWS] = null;
        $this->values[self::START] = null;
        $this->values[self::SORT] = null;
        $this->values[self::FILTER] = null;
        $this->values[self::DF] = null;
        $this->values[self::OP] = null;
        $this->values[self::FL] = array();
        $this->values[self::PRESORT] = null;
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
     * Sets value of 'q' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setQ($value)
    {
        return $this->set(self::Q, $value);
    }

    /**
     * Returns value of 'q' property
     *
     * @return string
     */
    public function getQ()
    {
        return $this->get(self::Q);
    }

    /**
     * Sets value of 'index' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setIndex($value)
    {
        return $this->set(self::INDEX, $value);
    }

    /**
     * Returns value of 'index' property
     *
     * @return string
     */
    public function getIndex()
    {
        return $this->get(self::INDEX);
    }

    /**
     * Sets value of 'rows' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setRows($value)
    {
        return $this->set(self::ROWS, $value);
    }

    /**
     * Returns value of 'rows' property
     *
     * @return int
     */
    public function getRows()
    {
        return $this->get(self::ROWS);
    }

    /**
     * Sets value of 'start' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setStart($value)
    {
        return $this->set(self::START, $value);
    }

    /**
     * Returns value of 'start' property
     *
     * @return int
     */
    public function getStart()
    {
        return $this->get(self::START);
    }

    /**
     * Sets value of 'sort' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setSort($value)
    {
        return $this->set(self::SORT, $value);
    }

    /**
     * Returns value of 'sort' property
     *
     * @return string
     */
    public function getSort()
    {
        return $this->get(self::SORT);
    }

    /**
     * Sets value of 'filter' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setFilter($value)
    {
        return $this->set(self::FILTER, $value);
    }

    /**
     * Returns value of 'filter' property
     *
     * @return string
     */
    public function getFilter()
    {
        return $this->get(self::FILTER);
    }

    /**
     * Sets value of 'df' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setDf($value)
    {
        return $this->set(self::DF, $value);
    }

    /**
     * Returns value of 'df' property
     *
     * @return string
     */
    public function getDf()
    {
        return $this->get(self::DF);
    }

    /**
     * Sets value of 'op' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setOp($value)
    {
        return $this->set(self::OP, $value);
    }

    /**
     * Returns value of 'op' property
     *
     * @return string
     */
    public function getOp()
    {
        return $this->get(self::OP);
    }

    /**
     * Appends value to 'fl' list
     *
     * @param string $value Value to append
     *
     * @return null
     */
    public function appendFl($value)
    {
        return $this->append(self::FL, $value);
    }

    /**
     * Clears 'fl' list
     *
     * @return null
     */
    public function clearFl()
    {
        return $this->clear(self::FL);
    }

    /**
     * Returns 'fl' list
     *
     * @return string[]
     */
    public function getFl()
    {
        return $this->get(self::FL);
    }

    /**
     * Returns 'fl' iterator
     *
     * @return ArrayIterator
     */
    public function getFlIterator()
    {
        return new \ArrayIterator($this->get(self::FL));
    }

    /**
     * Returns element from 'fl' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return string
     */
    public function getFlAt($offset)
    {
        return $this->get(self::FL, $offset);
    }

    /**
     * Returns count of 'fl' list
     *
     * @return int
     */
    public function getFlCount()
    {
        return $this->count(self::FL);
    }

    /**
     * Sets value of 'presort' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setPresort($value)
    {
        return $this->set(self::PRESORT, $value);
    }

    /**
     * Returns value of 'presort' property
     *
     * @return string
     */
    public function getPresort()
    {
        return $this->get(self::PRESORT);
    }
}
}