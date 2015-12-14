<?php
/**
 * Auto generated from riak_ts.proto at 2015-12-14 21:17:37
 *
 * basho.riak.api.pb.message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * TsQueryReq message
 */
class TsQueryReq extends \ProtobufMessage
{
    /* Field index constants */
    const QUERY = 1;
    const STREAM = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::QUERY => array(
            'name' => 'query',
            'required' => false,
            'type' => '\Basho\Riak\Api\Pb\Message\TsInterpolation'
        ),
        self::STREAM => array(
            'default' => false, 
            'name' => 'stream',
            'required' => false,
            'type' => 8,
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
        $this->values[self::QUERY] = null;
        $this->values[self::STREAM] = false;
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
     * Sets value of 'query' property
     *
     * @param \Basho\Riak\Api\Pb\Message\TsInterpolation $value Property value
     *
     * @return null
     */
    public function setQuery(\Basho\Riak\Api\Pb\Message\TsInterpolation $value)
    {
        return $this->set(self::QUERY, $value);
    }

    /**
     * Returns value of 'query' property
     *
     * @return \Basho\Riak\Api\Pb\Message\TsInterpolation
     */
    public function getQuery()
    {
        return $this->get(self::QUERY);
    }

    /**
     * Sets value of 'stream' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setStream($value)
    {
        return $this->set(self::STREAM, $value);
    }

    /**
     * Returns value of 'stream' property
     *
     * @return bool
     */
    public function getStream()
    {
        return $this->get(self::STREAM);
    }
}
}