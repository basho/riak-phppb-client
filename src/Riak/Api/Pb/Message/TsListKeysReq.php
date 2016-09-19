<?php
/**
 * Auto generated from riak_ts.proto at 2016-09-19 10:16:32
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * TsListKeysReq message
 */
class TsListKeysReq extends \ProtobufMessage
{
    /* Field index constants */
    const TABLE = 1;
    const TIMEOUT = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::TABLE => array(
            'name' => 'table',
            'required' => true,
            'type' => 7,
        ),
        self::TIMEOUT => array(
            'name' => 'timeout',
            'required' => false,
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
        $this->values[self::TABLE] = null;
        $this->values[self::TIMEOUT] = null;
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
     * Sets value of 'table' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setTable($value)
    {
        return $this->set(self::TABLE, $value);
    }

    /**
     * Returns value of 'table' property
     *
     * @return string
     */
    public function getTable()
    {
        return $this->get(self::TABLE);
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
}
}