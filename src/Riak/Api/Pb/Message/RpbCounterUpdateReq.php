<?php
/**
 * Auto generated from riak_kv.proto at 2015-12-14 21:14:59
 *
 * basho.riak.api.pb.message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbCounterUpdateReq message
 */
class RpbCounterUpdateReq extends \ProtobufMessage
{
    /* Field index constants */
    const BUCKET = 1;
    const KEY = 2;
    const AMOUNT = 3;
    const W = 4;
    const DW = 5;
    const PW = 6;
    const RETURNVALUE = 7;

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
        self::AMOUNT => array(
            'name' => 'amount',
            'required' => true,
            'type' => 6,
        ),
        self::W => array(
            'name' => 'w',
            'required' => false,
            'type' => 5,
        ),
        self::DW => array(
            'name' => 'dw',
            'required' => false,
            'type' => 5,
        ),
        self::PW => array(
            'name' => 'pw',
            'required' => false,
            'type' => 5,
        ),
        self::RETURNVALUE => array(
            'name' => 'returnvalue',
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
        $this->values[self::AMOUNT] = null;
        $this->values[self::W] = null;
        $this->values[self::DW] = null;
        $this->values[self::PW] = null;
        $this->values[self::RETURNVALUE] = null;
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
     * Sets value of 'amount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setAmount($value)
    {
        return $this->set(self::AMOUNT, $value);
    }

    /**
     * Returns value of 'amount' property
     *
     * @return int
     */
    public function getAmount()
    {
        return $this->get(self::AMOUNT);
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
     * Sets value of 'returnvalue' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setReturnvalue($value)
    {
        return $this->set(self::RETURNVALUE, $value);
    }

    /**
     * Returns value of 'returnvalue' property
     *
     * @return bool
     */
    public function getReturnvalue()
    {
        return $this->get(self::RETURNVALUE);
    }
}
}