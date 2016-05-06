<?php
/**
 * Auto generated from riak.proto at 2016-05-06 13:12:07
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbGetServerInfoResp message
 */
class RpbGetServerInfoResp extends \ProtobufMessage
{
    /* Field index constants */
    const NODE = 1;
    const SERVER_VERSION = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::NODE => array(
            'name' => 'node',
            'required' => false,
            'type' => 7,
        ),
        self::SERVER_VERSION => array(
            'name' => 'server_version',
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
        $this->values[self::NODE] = null;
        $this->values[self::SERVER_VERSION] = null;
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
     * Sets value of 'node' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setNode($value)
    {
        return $this->set(self::NODE, $value);
    }

    /**
     * Returns value of 'node' property
     *
     * @return string
     */
    public function getNode()
    {
        return $this->get(self::NODE);
    }

    /**
     * Sets value of 'server_version' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setServerVersion($value)
    {
        return $this->set(self::SERVER_VERSION, $value);
    }

    /**
     * Returns value of 'server_version' property
     *
     * @return string
     */
    public function getServerVersion()
    {
        return $this->get(self::SERVER_VERSION);
    }
}
}