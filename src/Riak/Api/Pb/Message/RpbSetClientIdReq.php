<?php
/**
 * Auto generated from riak_kv.proto at 2016-09-21 11:26:05
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbSetClientIdReq message
 */
class RpbSetClientIdReq extends \ProtobufMessage
{
    /* Field index constants */
    const CLIENT_ID = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::CLIENT_ID => array(
            'name' => 'client_id',
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
        $this->values[self::CLIENT_ID] = null;
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
     * Sets value of 'client_id' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setClientId($value)
    {
        return $this->set(self::CLIENT_ID, $value);
    }

    /**
     * Returns value of 'client_id' property
     *
     * @return string
     */
    public function getClientId()
    {
        return $this->get(self::CLIENT_ID);
    }
}
}