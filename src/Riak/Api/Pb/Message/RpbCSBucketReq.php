<?php
/**
 * Auto generated from riak_kv.proto at 2016-09-24 09:49:42
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbCSBucketReq message
 */
class RpbCSBucketReq extends \ProtobufMessage
{
    /* Field index constants */
    const BUCKET = 1;
    const START_KEY = 2;
    const END_KEY = 3;
    const START_INCL = 4;
    const END_INCL = 5;
    const CONTINUATION = 6;
    const MAX_RESULTS = 7;
    const TIMEOUT = 8;
    const TYPE = 9;
    const COVER_CONTEXT = 10;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::BUCKET => array(
            'name' => 'bucket',
            'required' => true,
            'type' => 7,
        ),
        self::START_KEY => array(
            'name' => 'start_key',
            'required' => true,
            'type' => 7,
        ),
        self::END_KEY => array(
            'name' => 'end_key',
            'required' => false,
            'type' => 7,
        ),
        self::START_INCL => array(
            'default' => true, 
            'name' => 'start_incl',
            'required' => false,
            'type' => 8,
        ),
        self::END_INCL => array(
            'default' => false, 
            'name' => 'end_incl',
            'required' => false,
            'type' => 8,
        ),
        self::CONTINUATION => array(
            'name' => 'continuation',
            'required' => false,
            'type' => 7,
        ),
        self::MAX_RESULTS => array(
            'name' => 'max_results',
            'required' => false,
            'type' => 5,
        ),
        self::TIMEOUT => array(
            'name' => 'timeout',
            'required' => false,
            'type' => 5,
        ),
        self::TYPE => array(
            'name' => 'type',
            'required' => false,
            'type' => 7,
        ),
        self::COVER_CONTEXT => array(
            'name' => 'cover_context',
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
        $this->values[self::START_KEY] = null;
        $this->values[self::END_KEY] = null;
        $this->values[self::START_INCL] = true;
        $this->values[self::END_INCL] = false;
        $this->values[self::CONTINUATION] = null;
        $this->values[self::MAX_RESULTS] = null;
        $this->values[self::TIMEOUT] = null;
        $this->values[self::TYPE] = null;
        $this->values[self::COVER_CONTEXT] = null;
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
     * Sets value of 'start_key' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStartKey($value)
    {
        return $this->set(self::START_KEY, $value);
    }

    /**
     * Returns value of 'start_key' property
     *
     * @return string
     */
    public function getStartKey()
    {
        return $this->get(self::START_KEY);
    }

    /**
     * Sets value of 'end_key' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setEndKey($value)
    {
        return $this->set(self::END_KEY, $value);
    }

    /**
     * Returns value of 'end_key' property
     *
     * @return string
     */
    public function getEndKey()
    {
        return $this->get(self::END_KEY);
    }

    /**
     * Sets value of 'start_incl' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setStartIncl($value)
    {
        return $this->set(self::START_INCL, $value);
    }

    /**
     * Returns value of 'start_incl' property
     *
     * @return bool
     */
    public function getStartIncl()
    {
        return $this->get(self::START_INCL);
    }

    /**
     * Sets value of 'end_incl' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setEndIncl($value)
    {
        return $this->set(self::END_INCL, $value);
    }

    /**
     * Returns value of 'end_incl' property
     *
     * @return bool
     */
    public function getEndIncl()
    {
        return $this->get(self::END_INCL);
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
     * Sets value of 'max_results' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setMaxResults($value)
    {
        return $this->set(self::MAX_RESULTS, $value);
    }

    /**
     * Returns value of 'max_results' property
     *
     * @return int
     */
    public function getMaxResults()
    {
        return $this->get(self::MAX_RESULTS);
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

    /**
     * Sets value of 'cover_context' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setCoverContext($value)
    {
        return $this->set(self::COVER_CONTEXT, $value);
    }

    /**
     * Returns value of 'cover_context' property
     *
     * @return string
     */
    public function getCoverContext()
    {
        return $this->get(self::COVER_CONTEXT);
    }
}
}