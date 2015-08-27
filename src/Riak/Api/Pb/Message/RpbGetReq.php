<?php
/**
 * Auto generated from riak_kv.proto at 2015-08-20 00:04:20
 *
 * riak.api.pb.messages package
 */

namespace Riak\Api\Pb\Messages {
/**
 * RpbGetReq message
 */
class RpbGetReq extends \ProtobufMessage
{
    /* Field index constants */
    const BUCKET = 1;
    const KEY = 2;
    const R = 3;
    const PR = 4;
    const BASIC_QUORUM = 5;
    const NOTFOUND_OK = 6;
    const IF_MODIFIED = 7;
    const HEAD = 8;
    const DELETEDVCLOCK = 9;
    const TIMEOUT = 10;
    const SLOPPY_QUORUM = 11;
    const N_VAL = 12;
    const TYPE = 13;

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
        self::IF_MODIFIED => array(
            'name' => 'if_modified',
            'required' => false,
            'type' => 7,
        ),
        self::HEAD => array(
            'name' => 'head',
            'required' => false,
            'type' => 8,
        ),
        self::DELETEDVCLOCK => array(
            'name' => 'deletedvclock',
            'required' => false,
            'type' => 8,
        ),
        self::TIMEOUT => array(
            'name' => 'timeout',
            'required' => false,
            'type' => 5,
        ),
        self::SLOPPY_QUORUM => array(
            'name' => 'sloppy_quorum',
            'required' => false,
            'type' => 8,
        ),
        self::N_VAL => array(
            'name' => 'n_val',
            'required' => false,
            'type' => 5,
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
        $this->values[self::BUCKET] = null;
        $this->values[self::KEY] = null;
        $this->values[self::R] = null;
        $this->values[self::PR] = null;
        $this->values[self::BASIC_QUORUM] = null;
        $this->values[self::NOTFOUND_OK] = null;
        $this->values[self::IF_MODIFIED] = null;
        $this->values[self::HEAD] = null;
        $this->values[self::DELETEDVCLOCK] = null;
        $this->values[self::TIMEOUT] = null;
        $this->values[self::SLOPPY_QUORUM] = null;
        $this->values[self::N_VAL] = null;
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

    /**
     * Sets value of 'if_modified' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setIfModified($value)
    {
        return $this->set(self::IF_MODIFIED, $value);
    }

    /**
     * Returns value of 'if_modified' property
     *
     * @return string
     */
    public function getIfModified()
    {
        return $this->get(self::IF_MODIFIED);
    }

    /**
     * Sets value of 'head' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setHead($value)
    {
        return $this->set(self::HEAD, $value);
    }

    /**
     * Returns value of 'head' property
     *
     * @return bool
     */
    public function getHead()
    {
        return $this->get(self::HEAD);
    }

    /**
     * Sets value of 'deletedvclock' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setDeletedvclock($value)
    {
        return $this->set(self::DELETEDVCLOCK, $value);
    }

    /**
     * Returns value of 'deletedvclock' property
     *
     * @return bool
     */
    public function getDeletedvclock()
    {
        return $this->get(self::DELETEDVCLOCK);
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
     * Sets value of 'sloppy_quorum' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setSloppyQuorum($value)
    {
        return $this->set(self::SLOPPY_QUORUM, $value);
    }

    /**
     * Returns value of 'sloppy_quorum' property
     *
     * @return bool
     */
    public function getSloppyQuorum()
    {
        return $this->get(self::SLOPPY_QUORUM);
    }

    /**
     * Sets value of 'n_val' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setNVal($value)
    {
        return $this->set(self::N_VAL, $value);
    }

    /**
     * Returns value of 'n_val' property
     *
     * @return int
     */
    public function getNVal()
    {
        return $this->get(self::N_VAL);
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