<?php
/**
 * Auto generated from riak_kv.proto at 2015-12-14 21:14:59
 *
 * basho.riak.api.pb.message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbCoverageEntry message
 */
class RpbCoverageEntry extends \ProtobufMessage
{
    /* Field index constants */
    const IP = 1;
    const PORT = 2;
    const KEYSPACE_DESC = 3;
    const COVER_CONTEXT = 4;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IP => array(
            'name' => 'ip',
            'required' => true,
            'type' => 7,
        ),
        self::PORT => array(
            'name' => 'port',
            'required' => true,
            'type' => 5,
        ),
        self::KEYSPACE_DESC => array(
            'name' => 'keyspace_desc',
            'required' => false,
            'type' => 7,
        ),
        self::COVER_CONTEXT => array(
            'name' => 'cover_context',
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
        $this->values[self::IP] = null;
        $this->values[self::PORT] = null;
        $this->values[self::KEYSPACE_DESC] = null;
        $this->values[self::COVER_CONTEXT] = null;
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
     * Sets value of 'ip' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setIp($value)
    {
        return $this->set(self::IP, $value);
    }

    /**
     * Returns value of 'ip' property
     *
     * @return string
     */
    public function getIp()
    {
        return $this->get(self::IP);
    }

    /**
     * Sets value of 'port' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setPort($value)
    {
        return $this->set(self::PORT, $value);
    }

    /**
     * Returns value of 'port' property
     *
     * @return int
     */
    public function getPort()
    {
        return $this->get(self::PORT);
    }

    /**
     * Sets value of 'keyspace_desc' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setKeyspaceDesc($value)
    {
        return $this->set(self::KEYSPACE_DESC, $value);
    }

    /**
     * Returns value of 'keyspace_desc' property
     *
     * @return string
     */
    public function getKeyspaceDesc()
    {
        return $this->get(self::KEYSPACE_DESC);
    }

    /**
     * Sets value of 'cover_context' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setCoverContext($value)
    {
        return $this->set(self::COVER_CONTEXT, $value);
    }

    /**
     * Returns value of 'cover_context' property
     *
     * @return string
     */
    public function getCoverContext()
    {
        return $this->get(self::COVER_CONTEXT);
    }
}
}