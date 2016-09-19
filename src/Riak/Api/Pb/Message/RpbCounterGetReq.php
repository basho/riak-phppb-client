<?php
/**
 * Auto generated from riak_kv.proto at 2016-09-19 10:16:32
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbCounterGetReq message
 */
class RpbCounterGetReq extends \ProtobufMessage
{
    /* Field index constants */
    const BUCKET = 1;
    const KEY = 2;
    const R = 3;
    const PR = 4;
    const BASIC_QUORUM = 5;
    const NOTFOUND_OK = 6;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::BUCKET => array(
            'name' => 'bucket',
            'required' => true,
            'type' => 7,
        ),
        self::KEY => array(
            'name' => 'key',
            'required' => true,
            'type' => 7,
        ),
        self::R => array(
            'name' => 'r',
            'required' => false,
            'type' => 5,
        ),
        self::PR => array(
            'name' => 'pr',
            'required' => false,
            'type' => 5,
        ),
        self::BASIC_QUORUM => array(
            'name' => 'basic_quorum',
            'required' => false,
            'type' => 8,
        ),
        self::NOTFOUND_OK => array(
            'name' => 'notfound_ok',
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
        $this->values[self::BUCKET] = null;
        $this->values[self::KEY] = null;
        $this->values[self::R] = null;
        $this->values[self::PR] = null;
        $this->values[self::BASIC_QUORUM] = null;
        $this->values[self::NOTFOUND_OK] = null;
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
     * Sets value of 'r' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setR($value)
    {
        return $this->set(self::R, $value);
    }

    /**
     * Returns value of 'r' property
     *
     * @return int
     */
    public function getR()
    {
        return $this->get(self::R);
    }

    /**
     * Sets value of 'pr' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setPr($value)
    {
        return $this->set(self::PR, $value);
    }

    /**
     * Returns value of 'pr' property
     *
     * @return int
     */
    public function getPr()
    {
        return $this->get(self::PR);
    }

    /**
     * Sets value of 'basic_quorum' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setBasicQuorum($value)
    {
        return $this->set(self::BASIC_QUORUM, $value);
    }

    /**
     * Returns value of 'basic_quorum' property
     *
     * @return bool
     */
    public function getBasicQuorum()
    {
        return $this->get(self::BASIC_QUORUM);
    }

    /**
     * Sets value of 'notfound_ok' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setNotfoundOk($value)
    {
        return $this->set(self::NOTFOUND_OK, $value);
    }

    /**
     * Returns value of 'notfound_ok' property
     *
     * @return bool
     */
    public function getNotfoundOk()
    {
        return $this->get(self::NOTFOUND_OK);
    }
}
}