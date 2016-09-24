<?php
/**
 * Auto generated from riak.proto at 2016-09-24 09:49:42
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbModFun message
 */
class RpbModFun extends \ProtobufMessage
{
    /* Field index constants */
    const MODULE = 1;
    const FUNCTION_FIELD = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::MODULE => array(
            'name' => 'module',
            'required' => true,
            'type' => 7,
        ),
        self::FUNCTION_FIELD => array(
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
        $this->values[self::FUNCTION_FIELD] = null;
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
        return $this->set(self::FUNCTION_FIELD, $value);
    }

    /**
     * Returns value of 'function' property
     *
     * @return string
     */
    public function getFunction()
    {
        return $this->get(self::FUNCTION_FIELD);
    }
}
}