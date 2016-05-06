<?php
/**
 * Auto generated from riak_kv.proto at 2016-05-06 13:12:31
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbCoverageResp message
 */
class RpbCoverageResp extends \ProtobufMessage
{
    /* Field index constants */
    const ENTRIES = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ENTRIES => array(
            'name' => 'entries',
            'repeated' => true,
            'type' => '\Basho\Riak\Api\Pb\Message\RpbCoverageEntry'
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
        $this->values[self::ENTRIES] = array();
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
     * Appends value to 'entries' list
     *
     * @param \Basho\Riak\Api\Pb\Message\RpbCoverageEntry $value Value to append
     *
     * @return null
     */
    public function appendEntries(\Basho\Riak\Api\Pb\Message\RpbCoverageEntry $value)
    {
        return $this->append(self::ENTRIES, $value);
    }

    /**
     * Clears 'entries' list
     *
     * @return null
     */
    public function clearEntries()
    {
        return $this->clear(self::ENTRIES);
    }

    /**
     * Returns 'entries' list
     *
     * @return \Basho\Riak\Api\Pb\Message\RpbCoverageEntry[]
     */
    public function getEntries()
    {
        return $this->get(self::ENTRIES);
    }

    /**
     * Returns 'entries' iterator
     *
     * @return ArrayIterator
     */
    public function getEntriesIterator()
    {
        return new \ArrayIterator($this->get(self::ENTRIES));
    }

    /**
     * Returns element from 'entries' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return \Basho\Riak\Api\Pb\Message\RpbCoverageEntry
     */
    public function getEntriesAt($offset)
    {
        return $this->get(self::ENTRIES, $offset);
    }

    /**
     * Returns count of 'entries' list
     *
     * @return int
     */
    public function getEntriesCount()
    {
        return $this->count(self::ENTRIES);
    }
}
}