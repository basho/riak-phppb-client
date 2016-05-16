<?php
/**
 * Auto generated from riak_dt.proto at 2016-05-06 13:12:12
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * DtFetchResp message
 */
class DtFetchResp extends \ProtobufMessage
{
    /* Field index constants */
    const CONTEXT = 1;
    const TYPE = 2;
    const VALUE = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::CONTEXT => array(
            'name' => 'context',
            'required' => false,
            'type' => 7,
        ),
        self::TYPE => array(
            'name' => 'type',
            'required' => true,
            'type' => 5,
        ),
        self::VALUE => array(
            'name' => 'value',
            'required' => false,
            'type' => '\Basho\Riak\Api\Pb\Message\DtValue'
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
        $this->values[self::CONTEXT] = null;
        $this->values[self::TYPE] = null;
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
     * Sets value of 'context' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setContext($value)
    {
        return $this->set(self::CONTEXT, $value);
    }

    /**
     * Returns value of 'context' property
     *
     * @return string
     */
    public function getContext()
    {
        return $this->get(self::CONTEXT);
    }

    /**
     * Sets value of 'type' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setType($value)
    {
        return $this->set(self::TYPE, $value);
    }

    /**
     * Returns value of 'type' property
     *
     * @return int
     */
    public function getType()
    {
        return $this->get(self::TYPE);
    }

    /**
     * Sets value of 'value' property
     *
     * @param \Basho\Riak\Api\Pb\Message\DtValue $value Property value
     *
     * @return null
     */
    public function setValue(\Basho\Riak\Api\Pb\Message\DtValue $value)
    {
        return $this->set(self::VALUE, $value);
    }

    /**
     * Returns value of 'value' property
     *
     * @return \Basho\Riak\Api\Pb\Message\DtValue
     */
    public function getValue()
    {
        return $this->get(self::VALUE);
    }
}
}