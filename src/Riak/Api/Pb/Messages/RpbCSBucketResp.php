<?php
/**
 * Auto generated from riak_kv.proto at 2015-08-20 00:04:20
 *
 * riak.api.pb.messages package
 */

namespace Riak\Api\Pb\Messages {
/**
 * RpbCSBucketResp message
 */
class RpbCSBucketResp extends \ProtobufMessage
{
    /* Field index constants */
    const OBJECTS = 1;
    const CONTINUATION = 2;
    const DONE = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::OBJECTS => array(
            'name' => 'objects',
            'repeated' => true,
            'type' => '\Riak\Api\Pb\Messages\RpbIndexObject'
        ),
        self::CONTINUATION => array(
            'name' => 'continuation',
            'required' => false,
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
        $this->values[self::OBJECTS] = array();
        $this->values[self::CONTINUATION] = null;
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
     * Appends value to 'objects' list
     *
     * @param \Riak\Api\Pb\Messages\RpbIndexObject $value Value to append
     *
     * @return null
     */
    public function appendObjects(\Riak\Api\Pb\Messages\RpbIndexObject $value)
    {
        return $this->append(self::OBJECTS, $value);
    }

    /**
     * Clears 'objects' list
     *
     * @return null
     */
    public function clearObjects()
    {
        return $this->clear(self::OBJECTS);
    }

    /**
     * Returns 'objects' list
     *
     * @return \Riak\Api\Pb\Messages\RpbIndexObject[]
     */
    public function getObjects()
    {
        return $this->get(self::OBJECTS);
    }

    /**
     * Returns 'objects' iterator
     *
     * @return ArrayIterator
     */
    public function getObjectsIterator()
    {
        return new \ArrayIterator($this->get(self::OBJECTS));
    }

    /**
     * Returns element from 'objects' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return \Riak\Api\Pb\Messages\RpbIndexObject
     */
    public function getObjectsAt($offset)
    {
        return $this->get(self::OBJECTS, $offset);
    }

    /**
     * Returns count of 'objects' list
     *
     * @return int
     */
    public function getObjectsCount()
    {
        return $this->count(self::OBJECTS);
    }

    /**
     * Sets value of 'continuation' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setContinuation($value)
    {
        return $this->set(self::CONTINUATION, $value);
    }

    /**
     * Returns value of 'continuation' property
     *
     * @return string
     */
    public function getContinuation()
    {
        return $this->get(self::CONTINUATION);
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