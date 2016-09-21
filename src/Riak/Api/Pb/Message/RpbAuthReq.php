<?php
/**
 * Auto generated from riak.proto at 2016-09-19 10:16:32
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbAuthReq message
 */
class RpbAuthReq extends \ProtobufMessage
{
    /* Field index constants */
    const USER = 1;
    const PASSWORD = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::USER => array(
            'name' => 'user',
            'required' => true,
            'type' => 7,
        ),
        self::PASSWORD => array(
            'name' => 'password',
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
        $this->values[self::USER] = null;
        $this->values[self::PASSWORD] = null;
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
     * Sets value of 'user' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setUser($value)
    {
        return $this->set(self::USER, $value);
    }

    /**
     * Returns value of 'user' property
     *
     * @return string
     */
    public function getUser()
    {
        return $this->get(self::USER);
    }

    /**
     * Sets value of 'password' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setPassword($value)
    {
        return $this->set(self::PASSWORD, $value);
    }

    /**
     * Returns value of 'password' property
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->get(self::PASSWORD);
    }
}
}