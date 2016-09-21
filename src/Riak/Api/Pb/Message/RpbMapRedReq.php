<?php
/**
 * Auto generated from riak_kv.proto at 2016-09-21 11:26:05
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbMapRedReq message
 */
class RpbMapRedReq extends \ProtobufMessage
{
    /* Field index constants */
    const REQUEST = 1;
    const CONTENT_TYPE = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::REQUEST => array(
            'name' => 'request',
            'required' => true,
            'type' => 7,
        ),
        self::CONTENT_TYPE => array(
            'name' => 'content_type',
            'required' => true,
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
        $this->values[self::REQUEST] = null;
        $this->values[self::CONTENT_TYPE] = null;
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
     * Sets value of 'request' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setRequest($value)
    {
        return $this->set(self::REQUEST, $value);
    }

    /**
     * Returns value of 'request' property
     *
     * @return string
     */
    public function getRequest()
    {
        return $this->get(self::REQUEST);
    }

    /**
     * Sets value of 'content_type' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setContentType($value)
    {
        return $this->set(self::CONTENT_TYPE, $value);
    }

    /**
     * Returns value of 'content_type' property
     *
     * @return string
     */
    public function getContentType()
    {
        return $this->get(self::CONTENT_TYPE);
    }
}
}