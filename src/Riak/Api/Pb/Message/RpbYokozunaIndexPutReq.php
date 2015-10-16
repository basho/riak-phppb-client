<?php
/**
 * Auto generated from riak_yokozuna.proto at 2015-08-20 00:06:02
 *
 * riak.api.pb.messages package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbYokozunaIndexPutReq message
 */
class RpbYokozunaIndexPutReq extends \ProtobufMessage
{
    /* Field index constants */
    const INDEX = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::INDEX => array(
            'name' => 'index',
            'required' => true,
            'type' => '\Basho\Riak\Api\Pb\Message\RpbYokozunaIndex'
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
}
}