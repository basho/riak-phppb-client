<?php
/**
 * Auto generated from riak_kv.proto at 2015-08-20 00:04:20
 *
 * riak.api.pb.messages package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbIndexResp message
 */
class RpbIndexResp extends \ProtobufMessage
{
    /* Field index constants */
    const KEYS = 1;
    const RESULTS = 2;
    const CONTINUATION = 3;
    const DONE = 4;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::KEYS => array(
            'name' => 'keys',
            'repeated' => true,
            'type' => 7,
        ),
        self::RESULTS => array(
            'name' => 'results',
            'repeated' => true,
            'type' => '\Basho\Riak\Api\Pb\Message\RpbPair'
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
        $this->values[self::KEYS] = array();
        $this->values[self::RESULTS] = array();
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
     * Appends value to 'results' list
     *
     * @param \Basho\Riak\Api\Pb\Message\RpbPair $value Value to append
     *
     * @return null
     */
    public function appendResults(\Basho\Riak\Api\Pb\Message\RpbPair $value)
    {
        return $this->append(self::RESULTS, $value);
    }

    /**
     * Clears 'results' list
     *
     * @return null
     */
    public function clearResults()
    {
        return $this->clear(self::RESULTS);
    }

    /**
     * Returns 'results' list
     *
     * @return \Basho\Riak\Api\Pb\Message\RpbPair[]
     */
    public function getResults()
    {
        return $this->get(self::RESULTS);
    }

    /**
     * Returns 'results' iterator
     *
     * @return ArrayIterator
     */
    public function getResultsIterator()
    {
        return new \ArrayIterator($this->get(self::RESULTS));
    }

    /**
     * Returns element from 'results' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return \Basho\Riak\Api\Pb\Message\RpbPair
     */
    public function getResultsAt($offset)
    {
        return $this->get(self::RESULTS, $offset);
    }

    /**
     * Returns count of 'results' list
     *
     * @return int
     */
    public function getResultsCount()
    {
        return $this->count(self::RESULTS);
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