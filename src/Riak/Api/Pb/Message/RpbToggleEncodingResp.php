<?php
/**
 * Auto generated from riak.proto at 2015-12-14 20:48:33
 *
 * basho.riak.api.pb.message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbToggleEncodingResp message
 */
class RpbToggleEncodingResp extends \ProtobufMessage
{
    /* Field index constants */
    const USE_NATIVE = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::USE_NATIVE => array(
            'name' => 'use_native',
            'required' => true,
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
        $this->values[self::USE_NATIVE] = null;
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
     * Sets value of 'use_native' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setUseNative($value)
    {
        return $this->set(self::USE_NATIVE, $value);
    }

    /**
     * Returns value of 'use_native' property
     *
     * @return bool
     */
    public function getUseNative()
    {
        return $this->get(self::USE_NATIVE);
    }
}
}