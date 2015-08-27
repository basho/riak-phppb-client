<?php
/**
 * Auto generated from riak_dt.proto at 2015-08-20 00:04:26
 *
 * riak.api.pb.messages package
 */

namespace Riak\Api\Pb\Messages {
/**
 * DtUpdateReq message
 */
class DtUpdateReq extends \ProtobufMessage
{
    /* Field index constants */
    const BUCKET = 1;
    const KEY = 2;
    const TYPE = 3;
    const CONTEXT = 4;
    const OP = 5;
    const W = 6;
    const DW = 7;
    const PW = 8;
    const RETURN_BODY = 9;
    const TIMEOUT = 10;
    const SLOPPY_QUORUM = 11;
    const N_VAL = 12;
    const INCLUDE_CONTEXT = 13;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::BUCKET => array(
            'name' => 'bucket',
            'required' => true,
            'type' => 7,
        ),
        self::KEY => array(
            'name' => 'key',
            'required' => false,
            'type' => 7,
        ),
        self::TYPE => array(
            'name' => 'type',
            'required' => true,
            'type' => 7,
        ),
        self::CONTEXT => array(
            'name' => 'context',
            'required' => false,
            'type' => 7,
        ),
        self::OP => array(
            'name' => 'op',
            'required' => true,
            'type' => '\Riak\Api\Pb\Messages\DtOp'
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
        self::RETURN_BODY => array(
            'default' => false, 
            'name' => 'return_body',
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
        $this->values[self::CONTEXT] = null;
        $this->values[self::OP] = null;
        $this->values[self::W] = null;
        $this->values[self::DW] = null;
        $this->values[self::PW] = null;
        $this->values[self::RETURN_BODY] = false;
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
     * Sets value of 'context' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setContext($value)
    {
        return $this->set(self::CONTEXT, $value);
    }

    /**
     * Returns value of 'context' property
     *
     * @return string
     */
    public function getContext()
    {
        return $this->get(self::CONTEXT);
    }

    /**
     * Sets value of 'op' property
     *
     * @param \Riak\Api\Pb\Messages\DtOp $value Property value
     *
     * @return null
     */
    public function setOp(\Riak\Api\Pb\Messages\DtOp $value)
    {
        return $this->set(self::OP, $value);
    }

    /**
     * Returns value of 'op' property
     *
     * @return \Riak\Api\Pb\Messages\DtOp
     */
    public function getOp()
    {
        return $this->get(self::OP);
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
     * Sets value of 'return_body' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setReturnBody($value)
    {
        return $this->set(self::RETURN_BODY, $value);
    }

    /**
     * Returns value of 'return_body' property
     *
     * @return bool
     */
    public function getReturnBody()
    {
        return $this->get(self::RETURN_BODY);
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