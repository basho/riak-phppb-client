<?php
/**
 * Auto generated from riak_kv.proto at 2016-09-24 09:49:42
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbPutReq message
 */
class RpbPutReq extends \ProtobufMessage
{
    /* Field index constants */
    const BUCKET = 1;
    const KEY = 2;
    const VCLOCK = 3;
    const CONTENT = 4;
    const W = 5;
    const DW = 6;
    const RETURN_BODY = 7;
    const PW = 8;
    const IF_NOT_MODIFIED = 9;
    const IF_NONE_MATCH = 10;
    const RETURN_HEAD = 11;
    const TIMEOUT = 12;
    const ASIS = 13;
    const SLOPPY_QUORUM = 14;
    const N_VAL = 15;
    const TYPE = 16;

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
        self::VCLOCK => array(
            'name' => 'vclock',
            'required' => false,
            'type' => 7,
        ),
        self::CONTENT => array(
            'name' => 'content',
            'required' => true,
            'type' => '\Basho\Riak\Api\Pb\Message\RpbContent'
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
        self::RETURN_BODY => array(
            'name' => 'return_body',
            'required' => false,
            'type' => 8,
        ),
        self::PW => array(
            'name' => 'pw',
            'required' => false,
            'type' => 5,
        ),
        self::IF_NOT_MODIFIED => array(
            'name' => 'if_not_modified',
            'required' => false,
            'type' => 8,
        ),
        self::IF_NONE_MATCH => array(
            'name' => 'if_none_match',
            'required' => false,
            'type' => 8,
        ),
        self::RETURN_HEAD => array(
            'name' => 'return_head',
            'required' => false,
            'type' => 8,
        ),
        self::TIMEOUT => array(
            'name' => 'timeout',
            'required' => false,
            'type' => 5,
        ),
        self::ASIS => array(
            'name' => 'asis',
            'required' => false,
            'type' => 8,
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
        $this->values[self::VCLOCK] = null;
        $this->values[self::CONTENT] = null;
        $this->values[self::W] = null;
        $this->values[self::DW] = null;
        $this->values[self::RETURN_BODY] = null;
        $this->values[self::PW] = null;
        $this->values[self::IF_NOT_MODIFIED] = null;
        $this->values[self::IF_NONE_MATCH] = null;
        $this->values[self::RETURN_HEAD] = null;
        $this->values[self::TIMEOUT] = null;
        $this->values[self::ASIS] = null;
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
     * Sets value of 'content' property
     *
     * @param \Basho\Riak\Api\Pb\Message\RpbContent $value Property value
     *
     * @return null
     */
    public function setContent(\Basho\Riak\Api\Pb\Message\RpbContent $value)
    {
        return $this->set(self::CONTENT, $value);
    }

    /**
     * Returns value of 'content' property
     *
     * @return \Basho\Riak\Api\Pb\Message\RpbContent
     */
    public function getContent()
    {
        return $this->get(self::CONTENT);
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
     * Sets value of 'if_not_modified' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setIfNotModified($value)
    {
        return $this->set(self::IF_NOT_MODIFIED, $value);
    }

    /**
     * Returns value of 'if_not_modified' property
     *
     * @return bool
     */
    public function getIfNotModified()
    {
        return $this->get(self::IF_NOT_MODIFIED);
    }

    /**
     * Sets value of 'if_none_match' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setIfNoneMatch($value)
    {
        return $this->set(self::IF_NONE_MATCH, $value);
    }

    /**
     * Returns value of 'if_none_match' property
     *
     * @return bool
     */
    public function getIfNoneMatch()
    {
        return $this->get(self::IF_NONE_MATCH);
    }

    /**
     * Sets value of 'return_head' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setReturnHead($value)
    {
        return $this->set(self::RETURN_HEAD, $value);
    }

    /**
     * Returns value of 'return_head' property
     *
     * @return bool
     */
    public function getReturnHead()
    {
        return $this->get(self::RETURN_HEAD);
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
     * Sets value of 'asis' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setAsis($value)
    {
        return $this->set(self::ASIS, $value);
    }

    /**
     * Returns value of 'asis' property
     *
     * @return bool
     */
    public function getAsis()
    {
        return $this->get(self::ASIS);
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