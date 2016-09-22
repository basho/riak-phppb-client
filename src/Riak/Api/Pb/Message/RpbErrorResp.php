<?php
/**
 * Auto generated from riak.proto at 2016-09-21 11:26:05
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbErrorResp message
 */
class RpbErrorResp extends \ProtobufMessage
{
    /* Field index constants */
    const ERRMSG = 1;
    const ERRCODE = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ERRMSG => array(
            'name' => 'errmsg',
            'required' => true,
            'type' => 7,
        ),
        self::ERRCODE => array(
            'name' => 'errcode',
            'required' => true,
            'type' => 5,
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
        $this->values[self::ERRMSG] = null;
        $this->values[self::ERRCODE] = null;
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
     * Sets value of 'errmsg' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setErrmsg($value)
    {
        return $this->set(self::ERRMSG, $value);
    }

    /**
     * Returns value of 'errmsg' property
     *
     * @return string
     */
    public function getErrmsg()
    {
        return $this->get(self::ERRMSG);
    }

    /**
     * Sets value of 'errcode' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setErrcode($value)
    {
        return $this->set(self::ERRCODE, $value);
    }

    /**
     * Returns value of 'errcode' property
     *
     * @return int
     */
    public function getErrcode()
    {
        return $this->get(self::ERRCODE);
    }
}
}