<?php
/**
 * Auto generated from riak.proto at 2015-12-14 20:48:33
 *
 * basho.riak.api.pb.message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbModFun message
 */
class RpbModFun extends \ProtobufMessage
{
    /* Field index constants */
    const MODULE = 1;
    /* NOTE: FUNCTION is a reserved keyword and cannot be used as a constant, manual change */
    const FUNC = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::MODULE => array(
            'name' => 'module',
            'required' => true,
            'type' => 7,
        ),
        self::FUNC => array(
            'name' => 'function',
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
        $this->values[self::MODULE] = null;
        $this->values[self::FUNC] = null;
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
     * Sets value of 'module' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setModule($value)
    {
        return $this->set(self::MODULE, $value);
    }

    /**
     * Returns value of 'module' property
     *
     * @return string
     */
    public function getModule()
    {
        return $this->get(self::MODULE);
    }

    /**
     * Sets value of 'function' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setFunction($value)
    {
        return $this->set(self::FUNC, $value);
    }

    /**
     * Returns value of 'function' property
     *
     * @return string
     */
    public function getFunction()
    {
        return $this->get(self::FUNC);
    }
}
}