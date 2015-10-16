<?php
/**
 * Auto generated from riak_kv.proto at 2015-08-20 00:04:20
 *
 * riak.api.pb.messages package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbLink message
 */
class RpbLink extends \ProtobufMessage
{
    /* Field index constants */
    const BUCKET = 1;
    const KEY = 2;
    const TAG = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::BUCKET => array(
            'name' => 'bucket',
            'required' => false,
            'type' => 7,
        ),
        self::KEY => array(
            'name' => 'key',
            'required' => false,
            'type' => 7,
        ),
        self::TAG => array(
            'name' => 'tag',
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
        $this->values[self::BUCKET] = null;
        $this->values[self::KEY] = null;
        $this->values[self::TAG] = null;
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
     * Sets value of 'bucket' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setBucket($value)
    {
        return $this->set(self::BUCKET, $value);
    }

    /**
     * Returns value of 'bucket' property
     *
     * @return string
     */
    public function getBucket()
    {
        return $this->get(self::BUCKET);
    }

    /**
     * Sets value of 'key' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setKey($value)
    {
        return $this->set(self::KEY, $value);
    }

    /**
     * Returns value of 'key' property
     *
     * @return string
     */
    public function getKey()
    {
        return $this->get(self::KEY);
    }

    /**
     * Sets value of 'tag' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setTag($value)
    {
        return $this->set(self::TAG, $value);
    }

    /**
     * Returns value of 'tag' property
     *
     * @return string
     */
    public function getTag()
    {
        return $this->get(self::TAG);
    }
}
}