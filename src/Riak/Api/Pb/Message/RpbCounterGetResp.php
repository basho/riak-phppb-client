<?php
/**
 * Auto generated from riak_kv.proto at 2016-05-06 13:12:31
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbCounterGetResp message
 */
class RpbCounterGetResp extends \ProtobufMessage
{
    /* Field index constants */
    const VALUE = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::VALUE => array(
            'name' => 'value',
            'required' => false,
            'type' => 6,
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
        $this->values[self::VALUE] = null;
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
     * Sets value of 'value' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setValue($value)
    {
        return $this->set(self::VALUE, $value);
    }

    /**
     * Returns value of 'value' property
     *
     * @return int
     */
    public function getValue()
    {
        return $this->get(self::VALUE);
    }
}
}