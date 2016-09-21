<?php
/**
 * Auto generated from riak_ts.proto at 2016-09-19 10:16:32
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * TsCoverageEntry message
 */
class TsCoverageEntry extends \ProtobufMessage
{
    /* Field index constants */
    const IP = 1;
    const PORT = 2;
    const COVER_CONTEXT = 3;
    const RANGE = 4;

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
        self::COVER_CONTEXT => array(
            'name' => 'cover_context',
            'required' => true,
            'type' => 7,
        ),
        self::RANGE => array(
            'name' => 'range',
            'required' => false,
            'type' => '\Basho\Riak\Api\Pb\Message\TsRange'
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
        $this->values[self::COVER_CONTEXT] = null;
        $this->values[self::RANGE] = null;
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

    /**
     * Sets value of 'range' property
     *
     * @param \Basho\Riak\Api\Pb\Message\TsRange $value Property value
     *
     * @return null
     */
    public function setRange(\Basho\Riak\Api\Pb\Message\TsRange $value)
    {
        return $this->set(self::RANGE, $value);
    }

    /**
     * Returns value of 'range' property
     *
     * @return \Basho\Riak\Api\Pb\Message\TsRange
     */
    public function getRange()
    {
        return $this->get(self::RANGE);
    }
}
}