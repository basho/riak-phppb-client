<?php
/**
 * Auto generated from riak_yokozuna.proto at 2016-09-24 09:49:42
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbYokozunaIndexPutReq message
 */
class RpbYokozunaIndexPutReq extends \ProtobufMessage
{
    /* Field index constants */
    const INDEX = 1;
    const TIMEOUT = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::INDEX => array(
            'name' => 'index',
            'required' => true,
            'type' => '\Basho\Riak\Api\Pb\Message\RpbYokozunaIndex'
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
        $this->values[self::INDEX] = null;
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
     * Sets value of 'index' property
     *
     * @param \Basho\Riak\Api\Pb\Message\RpbYokozunaIndex $value Property value
     *
     * @return null
     */
    public function setIndex(\Basho\Riak\Api\Pb\Message\RpbYokozunaIndex $value)
    {
        return $this->set(self::INDEX, $value);
    }

    /**
     * Returns value of 'index' property
     *
     * @return \Basho\Riak\Api\Pb\Message\RpbYokozunaIndex
     */
    public function getIndex()
    {
        return $this->get(self::INDEX);
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