<?php
/**
 * Auto generated from riak_kv.proto at 2016-09-24 09:49:42
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbDelReq message
 */
class RpbDelReq extends \ProtobufMessage
{
    /* Field index constants */
    const BUCKET = 1;
    const KEY = 2;
    const RW = 3;
    const VCLOCK = 4;
    const R = 5;
    const W = 6;
    const PR = 7;
    const PW = 8;
    const DW = 9;
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
        self::RW => array(
            'name' => 'rw',
            'required' => false,
            'type' => 5,
        ),
        self::VCLOCK => array(
            'name' => 'vclock',
            'required' => false,
            'type' => 7,
        ),
        self::R => array(
            'name' => 'r',
            'required' => false,
            'type' => 5,
        ),
        self::W => array(
            'name' => 'w',
            'required' => false,
            'type' => 5,
        ),
        self::PR => array(
            'name' => 'pr',
            'required' => false,
            'type' => 5,
        ),
        self::PW => array(
            'name' => 'pw',
            'required' => false,
            'type' => 5,
        ),
        self::DW => array(
            'name' => 'dw',
            'required' => false,
            'type' => 5,
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
        $this->values[self::RW] = null;
        $this->values[self::VCLOCK] = null;
        $this->values[self::R] = null;
        $this->values[self::W] = null;
        $this->values[self::PR] = null;
        $this->values[self::PW] = null;
        $this->values[self::DW] = null;
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
     * Sets value of 'rw' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setRw($value)
    {
        return $this->set(self::RW, $value);
    }

    /**
     * Returns value of 'rw' property
     *
     * @return int
     */
    public function getRw()
    {
        return $this->get(self::RW);
    }

    /**
     * Sets value of 'vclock' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setVclock($value)
    {
        return $this->set(self::VCLOCK, $value);
    }

    /**
     * Returns value of 'vclock' property
     *
     * @return string
     */
    public function getVclock()
    {
        return $this->get(self::VCLOCK);
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
     * Sets value of 'w' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setW($value)
    {
        return $this->set(self::W, $value);
    }

    /**
     * Returns value of 'w' property
     *
     * @return int
     */
    public function getW()
    {
        return $this->get(self::W);
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
     * Sets value of 'pw' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setPw($value)
    {
        return $this->set(self::PW, $value);
    }

    /**
     * Returns value of 'pw' property
     *
     * @return int
     */
    public function getPw()
    {
        return $this->get(self::PW);
    }

    /**
     * Sets value of 'dw' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setDw($value)
    {
        return $this->set(self::DW, $value);
    }

    /**
     * Returns value of 'dw' property
     *
     * @return int
     */
    public function getDw()
    {
        return $this->get(self::DW);
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