<?php
/**
 * Auto generated from riak_dt.proto at 2016-09-21 11:26:05
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * MapOp message
 */
class MapOp extends \ProtobufMessage
{
    /* Field index constants */
    const REMOVES = 1;
    const UPDATES = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::REMOVES => array(
            'name' => 'removes',
            'repeated' => true,
            'type' => '\Basho\Riak\Api\Pb\Message\MapField'
        ),
        self::UPDATES => array(
            'name' => 'updates',
            'repeated' => true,
            'type' => '\Basho\Riak\Api\Pb\Message\MapUpdate'
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
        $this->values[self::REMOVES] = array();
        $this->values[self::UPDATES] = array();
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
     * Appends value to 'removes' list
     *
     * @param \Basho\Riak\Api\Pb\Message\MapField $value Value to append
     *
     * @return null
     */
    public function appendRemoves(\Basho\Riak\Api\Pb\Message\MapField $value)
    {
        return $this->append(self::REMOVES, $value);
    }

    /**
     * Clears 'removes' list
     *
     * @return null
     */
    public function clearRemoves()
    {
        return $this->clear(self::REMOVES);
    }

    /**
     * Returns 'removes' list
     *
     * @return \Basho\Riak\Api\Pb\Message\MapField[]
     */
    public function getRemoves()
    {
        return $this->get(self::REMOVES);
    }

    /**
     * Returns 'removes' iterator
     *
     * @return ArrayIterator
     */
    public function getRemovesIterator()
    {
        return new \ArrayIterator($this->get(self::REMOVES));
    }

    /**
     * Returns element from 'removes' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return \Basho\Riak\Api\Pb\Message\MapField
     */
    public function getRemovesAt($offset)
    {
        return $this->get(self::REMOVES, $offset);
    }

    /**
     * Returns count of 'removes' list
     *
     * @return int
     */
    public function getRemovesCount()
    {
        return $this->count(self::REMOVES);
    }

    /**
     * Appends value to 'updates' list
     *
     * @param \Basho\Riak\Api\Pb\Message\MapUpdate $value Value to append
     *
     * @return null
     */
    public function appendUpdates(\Basho\Riak\Api\Pb\Message\MapUpdate $value)
    {
        return $this->append(self::UPDATES, $value);
    }

    /**
     * Clears 'updates' list
     *
     * @return null
     */
    public function clearUpdates()
    {
        return $this->clear(self::UPDATES);
    }

    /**
     * Returns 'updates' list
     *
     * @return \Basho\Riak\Api\Pb\Message\MapUpdate[]
     */
    public function getUpdates()
    {
        return $this->get(self::UPDATES);
    }

    /**
     * Returns 'updates' iterator
     *
     * @return ArrayIterator
     */
    public function getUpdatesIterator()
    {
        return new \ArrayIterator($this->get(self::UPDATES));
    }

    /**
     * Returns element from 'updates' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return \Basho\Riak\Api\Pb\Message\MapUpdate
     */
    public function getUpdatesAt($offset)
    {
        return $this->get(self::UPDATES, $offset);
    }

    /**
     * Returns count of 'updates' list
     *
     * @return int
     */
    public function getUpdatesCount()
    {
        return $this->count(self::UPDATES);
    }
}
}