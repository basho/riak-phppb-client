<?php
/**
 * Auto generated from riak_ts.proto at 2016-09-21 11:26:05
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * TsCoverageReq message
 */
class TsCoverageReq extends \ProtobufMessage
{
    /* Field index constants */
    const QUERY = 1;
    const TABLE = 2;
    const REPLACE_COVER = 3;
    const UNAVAILABLE_COVER = 4;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::QUERY => array(
            'name' => 'query',
            'required' => false,
            'type' => '\Basho\Riak\Api\Pb\Message\TsInterpolation'
        ),
        self::TABLE => array(
            'name' => 'table',
            'required' => true,
            'type' => 7,
        ),
        self::REPLACE_COVER => array(
            'name' => 'replace_cover',
            'required' => false,
            'type' => 7,
        ),
        self::UNAVAILABLE_COVER => array(
            'name' => 'unavailable_cover',
            'repeated' => true,
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
        $this->values[self::QUERY] = null;
        $this->values[self::TABLE] = null;
        $this->values[self::REPLACE_COVER] = null;
        $this->values[self::UNAVAILABLE_COVER] = array();
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
     * Sets value of 'query' property
     *
     * @param \Basho\Riak\Api\Pb\Message\TsInterpolation $value Property value
     *
     * @return null
     */
    public function setQuery(\Basho\Riak\Api\Pb\Message\TsInterpolation $value)
    {
        return $this->set(self::QUERY, $value);
    }

    /**
     * Returns value of 'query' property
     *
     * @return \Basho\Riak\Api\Pb\Message\TsInterpolation
     */
    public function getQuery()
    {
        return $this->get(self::QUERY);
    }

    /**
     * Sets value of 'table' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setTable($value)
    {
        return $this->set(self::TABLE, $value);
    }

    /**
     * Returns value of 'table' property
     *
     * @return string
     */
    public function getTable()
    {
        return $this->get(self::TABLE);
    }

    /**
     * Sets value of 'replace_cover' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setReplaceCover($value)
    {
        return $this->set(self::REPLACE_COVER, $value);
    }

    /**
     * Returns value of 'replace_cover' property
     *
     * @return string
     */
    public function getReplaceCover()
    {
        return $this->get(self::REPLACE_COVER);
    }

    /**
     * Appends value to 'unavailable_cover' list
     *
     * @param string $value Value to append
     *
     * @return null
     */
    public function appendUnavailableCover($value)
    {
        return $this->append(self::UNAVAILABLE_COVER, $value);
    }

    /**
     * Clears 'unavailable_cover' list
     *
     * @return null
     */
    public function clearUnavailableCover()
    {
        return $this->clear(self::UNAVAILABLE_COVER);
    }

    /**
     * Returns 'unavailable_cover' list
     *
     * @return string[]
     */
    public function getUnavailableCover()
    {
        return $this->get(self::UNAVAILABLE_COVER);
    }

    /**
     * Returns 'unavailable_cover' iterator
     *
     * @return ArrayIterator
     */
    public function getUnavailableCoverIterator()
    {
        return new \ArrayIterator($this->get(self::UNAVAILABLE_COVER));
    }

    /**
     * Returns element from 'unavailable_cover' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return string
     */
    public function getUnavailableCoverAt($offset)
    {
        return $this->get(self::UNAVAILABLE_COVER, $offset);
    }

    /**
     * Returns count of 'unavailable_cover' list
     *
     * @return int
     */
    public function getUnavailableCoverCount()
    {
        return $this->count(self::UNAVAILABLE_COVER);
    }
}
}