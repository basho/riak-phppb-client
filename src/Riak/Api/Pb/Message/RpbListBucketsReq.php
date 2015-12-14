<?php
/**
 * Auto generated from riak_kv.proto at 2015-12-14 21:14:59
 *
 * basho.riak.api.pb.message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbListBucketsReq message
 */
class RpbListBucketsReq extends \ProtobufMessage
{
    /* Field index constants */
    const TIMEOUT = 1;
    const STREAM = 2;
    const TYPE = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::TIMEOUT => array(
            'name' => 'timeout',
            'required' => false,
            'type' => 5,
        ),
        self::STREAM => array(
            'name' => 'stream',
            'required' => false,
            'type' => 8,
        ),
        self::TYPE => array(
            'name' => 'type',
            'required' => false,
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
        $this->values[self::TIMEOUT] = null;
        $this->values[self::STREAM] = null;
        $this->values[self::TYPE] = null;
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
     * Sets value of 'timeout' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setTimeout($value)
    {
        return $this->set(self::TIMEOUT, $value);
    }

    /**
     * Returns value of 'timeout' property
     *
     * @return int
     */
    public function getTimeout()
    {
        return $this->get(self::TIMEOUT);
    }

    /**
     * Sets value of 'stream' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setStream($value)
    {
        return $this->set(self::STREAM, $value);
    }

    /**
     * Returns value of 'stream' property
     *
     * @return bool
     */
    public function getStream()
    {
        return $this->get(self::STREAM);
    }

    /**
     * Sets value of 'type' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setType($value)
    {
        return $this->set(self::TYPE, $value);
    }

    /**
     * Returns value of 'type' property
     *
     * @return string
     */
    public function getType()
    {
        return $this->get(self::TYPE);
    }
}
}