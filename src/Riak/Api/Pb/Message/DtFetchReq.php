<?php
/**
 * Auto generated from riak_dt.proto at 2016-09-21 11:26:05
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * DtFetchReq message
 */
class DtFetchReq extends \ProtobufMessage
{
    /* Field index constants */
    const BUCKET = 1;
    const KEY = 2;
    const TYPE = 3;
    const R = 4;
    const PR = 5;
    const BASIC_QUORUM = 6;
    const NOTFOUND_OK = 7;
    const TIMEOUT = 8;
    const SLOPPY_QUORUM = 9;
    const N_VAL = 10;
    const INCLUDE_CONTEXT = 11;

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
        self::TYPE => array(
            'name' => 'type',
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
        self::INCLUDE_CONTEXT => array(
            'default' => true, 
            'name' => 'include_context',
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
        $this->values[self::TYPE] = null;
        $this->values[self::R] = null;
        $this->values[self::PR] = null;
        $this->values[self::BASIC_QUORUM] = null;
        $this->values[self::NOTFOUND_OK] = null;
        $this->values[self::TIMEOUT] = null;
        $this->values[self::SLOPPY_QUORUM] = null;
        $this->values[self::N_VAL] = null;
        $this->values[self::INCLUDE_CONTEXT] = true;
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
     * Sets value of 'include_context' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setIncludeContext($value)
    {
        return $this->set(self::INCLUDE_CONTEXT, $value);
    }

    /**
     * Returns value of 'include_context' property
     *
     * @return bool
     */
    public function getIncludeContext()
    {
        return $this->get(self::INCLUDE_CONTEXT);
    }
}
}