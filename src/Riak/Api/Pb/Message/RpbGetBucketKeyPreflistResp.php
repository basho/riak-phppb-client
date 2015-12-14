<?php
/**
 * Auto generated from riak_kv.proto at 2015-12-14 21:14:59
 *
 * basho.riak.api.pb.message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbGetBucketKeyPreflistResp message
 */
class RpbGetBucketKeyPreflistResp extends \ProtobufMessage
{
    /* Field index constants */
    const PREFLIST = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::PREFLIST => array(
            'name' => 'preflist',
            'repeated' => true,
            'type' => '\Basho\Riak\Api\Pb\Message\RpbBucketKeyPreflistItem'
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
        $this->values[self::PREFLIST] = array();
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
     * Appends value to 'preflist' list
     *
     * @param \Basho\Riak\Api\Pb\Message\RpbBucketKeyPreflistItem $value Value to append
     *
     * @return null
     */
    public function appendPreflist(\Basho\Riak\Api\Pb\Message\RpbBucketKeyPreflistItem $value)
    {
        return $this->append(self::PREFLIST, $value);
    }

    /**
     * Clears 'preflist' list
     *
     * @return null
     */
    public function clearPreflist()
    {
        return $this->clear(self::PREFLIST);
    }

    /**
     * Returns 'preflist' list
     *
     * @return \Basho\Riak\Api\Pb\Message\RpbBucketKeyPreflistItem[]
     */
    public function getPreflist()
    {
        return $this->get(self::PREFLIST);
    }

    /**
     * Returns 'preflist' iterator
     *
     * @return ArrayIterator
     */
    public function getPreflistIterator()
    {
        return new \ArrayIterator($this->get(self::PREFLIST));
    }

    /**
     * Returns element from 'preflist' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return \Basho\Riak\Api\Pb\Message\RpbBucketKeyPreflistItem
     */
    public function getPreflistAt($offset)
    {
        return $this->get(self::PREFLIST, $offset);
    }

    /**
     * Returns count of 'preflist' list
     *
     * @return int
     */
    public function getPreflistCount()
    {
        return $this->count(self::PREFLIST);
    }
}
}