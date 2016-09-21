<?php
/**
 * Auto generated from riak_yokozuna.proto at 2016-09-21 11:26:05
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbYokozunaIndex message
 */
class RpbYokozunaIndex extends \ProtobufMessage
{
    /* Field index constants */
    const NAME = 1;
    const SCHEMA = 2;
    const N_VAL = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::NAME => array(
            'name' => 'name',
            'required' => true,
            'type' => 7,
        ),
        self::SCHEMA => array(
            'name' => 'schema',
            'required' => false,
            'type' => 7,
        ),
        self::N_VAL => array(
            'name' => 'n_val',
            'required' => false,
            'type' => 5,
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
        $this->values[self::NAME] = null;
        $this->values[self::SCHEMA] = null;
        $this->values[self::N_VAL] = null;
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
     * Sets value of 'name' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setName($value)
    {
        return $this->set(self::NAME, $value);
    }

    /**
     * Returns value of 'name' property
     *
     * @return string
     */
    public function getName()
    {
        return $this->get(self::NAME);
    }

    /**
     * Sets value of 'schema' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setSchema($value)
    {
        return $this->set(self::SCHEMA, $value);
    }

    /**
     * Returns value of 'schema' property
     *
     * @return string
     */
    public function getSchema()
    {
        return $this->get(self::SCHEMA);
    }

    /**
     * Sets value of 'n_val' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setNVal($value)
    {
        return $this->set(self::N_VAL, $value);
    }

    /**
     * Returns value of 'n_val' property
     *
     * @return int
     */
    public function getNVal()
    {
        return $this->get(self::N_VAL);
    }
}
}