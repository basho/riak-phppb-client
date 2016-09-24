<?php
/**
 * Auto generated from riak_kv.proto at 2016-09-24 09:49:42
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbListBucketsResp message
 */
class RpbListBucketsResp extends \ProtobufMessage
{
    /* Field index constants */
    const BUCKETS = 1;
    const DONE = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::BUCKETS => array(
            'name' => 'buckets',
            'repeated' => true,
            'type' => 7,
        ),
        self::DONE => array(
            'name' => 'done',
            'required' => false,
            'type' => 8,
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
        $this->values[self::BUCKETS] = array();
        $this->values[self::DONE] = null;
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
     * Appends value to 'buckets' list
     *
     * @param string $value Value to append
     *
     * @return null
     */
    public function appendBuckets($value)
    {
        return $this->append(self::BUCKETS, $value);
    }

    /**
     * Clears 'buckets' list
     *
     * @return null
     */
    public function clearBuckets()
    {
        return $this->clear(self::BUCKETS);
    }

    /**
     * Returns 'buckets' list
     *
     * @return string[]
     */
    public function getBuckets()
    {
        return $this->get(self::BUCKETS);
    }

    /**
     * Returns 'buckets' iterator
     *
     * @return ArrayIterator
     */
    public function getBucketsIterator()
    {
        return new \ArrayIterator($this->get(self::BUCKETS));
    }

    /**
     * Returns element from 'buckets' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return string
     */
    public function getBucketsAt($offset)
    {
        return $this->get(self::BUCKETS, $offset);
    }

    /**
     * Returns count of 'buckets' list
     *
     * @return int
     */
    public function getBucketsCount()
    {
        return $this->count(self::BUCKETS);
    }

    /**
     * Sets value of 'done' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setDone($value)
    {
        return $this->set(self::DONE, $value);
    }

    /**
     * Returns value of 'done' property
     *
     * @return bool
     */
    public function getDone()
    {
        return $this->get(self::DONE);
    }
}
}