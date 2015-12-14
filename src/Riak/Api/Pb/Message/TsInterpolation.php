<?php
/**
 * Auto generated from riak_ts.proto at 2015-12-14 21:17:37
 *
 * basho.riak.api.pb.message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * TsInterpolation message
 */
class TsInterpolation extends \ProtobufMessage
{
    /* Field index constants */
    const BASE = 1;
    const INTERPOLATIONS = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::BASE => array(
            'name' => 'base',
            'required' => true,
            'type' => 7,
        ),
        self::INTERPOLATIONS => array(
            'name' => 'interpolations',
            'repeated' => true,
            'type' => '\Basho\Riak\Api\Pb\Message\RpbPair'
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
        $this->values[self::BASE] = null;
        $this->values[self::INTERPOLATIONS] = array();
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
     * Sets value of 'base' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setBase($value)
    {
        return $this->set(self::BASE, $value);
    }

    /**
     * Returns value of 'base' property
     *
     * @return string
     */
    public function getBase()
    {
        return $this->get(self::BASE);
    }

    /**
     * Appends value to 'interpolations' list
     *
     * @param \Basho\Riak\Api\Pb\Message\RpbPair $value Value to append
     *
     * @return null
     */
    public function appendInterpolations(\Basho\Riak\Api\Pb\Message\RpbPair $value)
    {
        return $this->append(self::INTERPOLATIONS, $value);
    }

    /**
     * Clears 'interpolations' list
     *
     * @return null
     */
    public function clearInterpolations()
    {
        return $this->clear(self::INTERPOLATIONS);
    }

    /**
     * Returns 'interpolations' list
     *
     * @return \Basho\Riak\Api\Pb\Message\RpbPair[]
     */
    public function getInterpolations()
    {
        return $this->get(self::INTERPOLATIONS);
    }

    /**
     * Returns 'interpolations' iterator
     *
     * @return ArrayIterator
     */
    public function getInterpolationsIterator()
    {
        return new \ArrayIterator($this->get(self::INTERPOLATIONS));
    }

    /**
     * Returns element from 'interpolations' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return \Basho\Riak\Api\Pb\Message\RpbPair
     */
    public function getInterpolationsAt($offset)
    {
        return $this->get(self::INTERPOLATIONS, $offset);
    }

    /**
     * Returns count of 'interpolations' list
     *
     * @return int
     */
    public function getInterpolationsCount()
    {
        return $this->count(self::INTERPOLATIONS);
    }
}
}