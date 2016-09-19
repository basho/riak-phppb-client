<?php
/**
 * Auto generated from riak_kv.proto at 2016-09-19 10:16:32
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbListKeysResp message
 */
class RpbListKeysResp extends \ProtobufMessage
{
    /* Field index constants */
    const KEYS = 1;
    const DONE = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::KEYS => array(
            'name' => 'keys',
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
        $this->values[self::KEYS] = array();
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
     * Appends value to 'keys' list
     *
     * @param string $value Value to append
     *
     * @return null
     */
    public function appendKeys($value)
    {
        return $this->append(self::KEYS, $value);
    }

    /**
     * Clears 'keys' list
     *
     * @return null
     */
    public function clearKeys()
    {
        return $this->clear(self::KEYS);
    }

    /**
     * Returns 'keys' list
     *
     * @return string[]
     */
    public function getKeys()
    {
        return $this->get(self::KEYS);
    }

    /**
     * Returns 'keys' iterator
     *
     * @return ArrayIterator
     */
    public function getKeysIterator()
    {
        return new \ArrayIterator($this->get(self::KEYS));
    }

    /**
     * Returns element from 'keys' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return string
     */
    public function getKeysAt($offset)
    {
        return $this->get(self::KEYS, $offset);
    }

    /**
     * Returns count of 'keys' list
     *
     * @return int
     */
    public function getKeysCount()
    {
        return $this->count(self::KEYS);
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