<?php
/**
 * Auto generated from riak_ts.proto at 2015-12-14 21:17:37
 *
 * basho.riak.api.pb.message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * TsCell message
 */
class TsCell extends \ProtobufMessage
{
    /* Field index constants */
    const VARCHAR_VALUE = 1;
    const SINT64_VALUE = 2;
    const TIMESTAMP_VALUE = 3;
    const BOOLEAN_VALUE = 4;
    const DOUBLE_VALUE = 5;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::VARCHAR_VALUE => array(
            'name' => 'varchar_value',
            'required' => false,
            'type' => 7,
        ),
        self::SINT64_VALUE => array(
            'name' => 'sint64_value',
            'required' => false,
            'type' => 6,
        ),
        self::TIMESTAMP_VALUE => array(
            'name' => 'timestamp_value',
            'required' => false,
            'type' => 6,
        ),
        self::BOOLEAN_VALUE => array(
            'name' => 'boolean_value',
            'required' => false,
            'type' => 8,
        ),
        self::DOUBLE_VALUE => array(
            'name' => 'double_value',
            'required' => false,
            'type' => 1,
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
        $this->values[self::VARCHAR_VALUE] = null;
        $this->values[self::SINT64_VALUE] = null;
        $this->values[self::TIMESTAMP_VALUE] = null;
        $this->values[self::BOOLEAN_VALUE] = null;
        $this->values[self::DOUBLE_VALUE] = null;
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
     * Sets value of 'varchar_value' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setVarcharValue($value)
    {
        return $this->set(self::VARCHAR_VALUE, $value);
    }

    /**
     * Returns value of 'varchar_value' property
     *
     * @return string
     */
    public function getVarcharValue()
    {
        return $this->get(self::VARCHAR_VALUE);
    }

    /**
     * Sets value of 'sint64_value' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setSint64Value($value)
    {
        return $this->set(self::SINT64_VALUE, $value);
    }

    /**
     * Returns value of 'sint64_value' property
     *
     * @return int
     */
    public function getSint64Value()
    {
        return $this->get(self::SINT64_VALUE);
    }

    /**
     * Sets value of 'timestamp_value' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setTimestampValue($value)
    {
        return $this->set(self::TIMESTAMP_VALUE, $value);
    }

    /**
     * Returns value of 'timestamp_value' property
     *
     * @return int
     */
    public function getTimestampValue()
    {
        return $this->get(self::TIMESTAMP_VALUE);
    }

    /**
     * Sets value of 'boolean_value' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setBooleanValue($value)
    {
        return $this->set(self::BOOLEAN_VALUE, $value);
    }

    /**
     * Returns value of 'boolean_value' property
     *
     * @return bool
     */
    public function getBooleanValue()
    {
        return $this->get(self::BOOLEAN_VALUE);
    }

    /**
     * Sets value of 'double_value' property
     *
     * @param float $value Property value
     *
     * @return null
     */
    public function setDoubleValue($value)
    {
        return $this->set(self::DOUBLE_VALUE, $value);
    }

    /**
     * Returns value of 'double_value' property
     *
     * @return float
     */
    public function getDoubleValue()
    {
        return $this->get(self::DOUBLE_VALUE);
    }
}
}