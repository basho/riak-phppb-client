<?php
/**
 * Auto generated from riak_yokozuna.proto at 2015-08-20 00:06:02
 *
 * riak.api.pb.messages package
 */

namespace Riak\Api\Pb\Messages {
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
            'type' => '\Riak\Api\Pb\Messages\RpbYokozunaIndex'
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
     * @param \Riak\Api\Pb\Messages\RpbYokozunaIndex $value Property value
     *
     * @return null
     */
    public function setIndex(\Riak\Api\Pb\Messages\RpbYokozunaIndex $value)
    {
        return $this->set(self::INDEX, $value);
    }

    /**
     * Returns value of 'index' property
     *
     * @return \Riak\Api\Pb\Messages\RpbYokozunaIndex
     */
    public function getIndex()
    {
        return $this->get(self::INDEX);
    }
}
}