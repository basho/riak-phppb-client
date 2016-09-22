<?php
/**
 * Auto generated from riak_search.proto at 2016-09-21 11:26:05
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbSearchDoc message
 */
class RpbSearchDoc extends \ProtobufMessage
{
    /* Field index constants */
    const FIELDS = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::FIELDS => array(
            'name' => 'fields',
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
        $this->values[self::FIELDS] = array();
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
     * Appends value to 'fields' list
     *
     * @param \Basho\Riak\Api\Pb\Message\RpbPair $value Value to append
     *
     * @return null
     */
    public function appendFields(\Basho\Riak\Api\Pb\Message\RpbPair $value)
    {
        return $this->append(self::FIELDS, $value);
    }

    /**
     * Clears 'fields' list
     *
     * @return null
     */
    public function clearFields()
    {
        return $this->clear(self::FIELDS);
    }

    /**
     * Returns 'fields' list
     *
     * @return \Basho\Riak\Api\Pb\Message\RpbPair[]
     */
    public function getFields()
    {
        return $this->get(self::FIELDS);
    }

    /**
     * Returns 'fields' iterator
     *
     * @return ArrayIterator
     */
    public function getFieldsIterator()
    {
        return new \ArrayIterator($this->get(self::FIELDS));
    }

    /**
     * Returns element from 'fields' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return \Basho\Riak\Api\Pb\Message\RpbPair
     */
    public function getFieldsAt($offset)
    {
        return $this->get(self::FIELDS, $offset);
    }

    /**
     * Returns count of 'fields' list
     *
     * @return int
     */
    public function getFieldsCount()
    {
        return $this->count(self::FIELDS);
    }
}
}