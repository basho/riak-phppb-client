<?php
/**
 * Auto generated from riak_ts.proto at 2016-09-21 11:26:05
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * TsRange message
 */
class TsRange extends \ProtobufMessage
{
    /* Field index constants */
    const FIELD_NAME = 1;
    const LOWER_BOUND = 2;
    const LOWER_BOUND_INCLUSIVE = 3;
    const UPPER_BOUND = 4;
    const UPPER_BOUND_INCLUSIVE = 5;
    const DESC = 6;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::FIELD_NAME => array(
            'name' => 'field_name',
            'required' => true,
            'type' => 7,
        ),
        self::LOWER_BOUND => array(
            'name' => 'lower_bound',
            'required' => true,
            'type' => 6,
        ),
        self::LOWER_BOUND_INCLUSIVE => array(
            'name' => 'lower_bound_inclusive',
            'required' => true,
            'type' => 8,
        ),
        self::UPPER_BOUND => array(
            'name' => 'upper_bound',
            'required' => true,
            'type' => 6,
        ),
        self::UPPER_BOUND_INCLUSIVE => array(
            'name' => 'upper_bound_inclusive',
            'required' => true,
            'type' => 8,
        ),
        self::DESC => array(
            'name' => 'desc',
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
        $this->values[self::FIELD_NAME] = null;
        $this->values[self::LOWER_BOUND] = null;
        $this->values[self::LOWER_BOUND_INCLUSIVE] = null;
        $this->values[self::UPPER_BOUND] = null;
        $this->values[self::UPPER_BOUND_INCLUSIVE] = null;
        $this->values[self::DESC] = null;
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
     * Sets value of 'field_name' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setFieldName($value)
    {
        return $this->set(self::FIELD_NAME, $value);
    }

    /**
     * Returns value of 'field_name' property
     *
     * @return string
     */
    public function getFieldName()
    {
        return $this->get(self::FIELD_NAME);
    }

    /**
     * Sets value of 'lower_bound' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setLowerBound($value)
    {
        return $this->set(self::LOWER_BOUND, $value);
    }

    /**
     * Returns value of 'lower_bound' property
     *
     * @return int
     */
    public function getLowerBound()
    {
        return $this->get(self::LOWER_BOUND);
    }

    /**
     * Sets value of 'lower_bound_inclusive' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setLowerBoundInclusive($value)
    {
        return $this->set(self::LOWER_BOUND_INCLUSIVE, $value);
    }

    /**
     * Returns value of 'lower_bound_inclusive' property
     *
     * @return bool
     */
    public function getLowerBoundInclusive()
    {
        return $this->get(self::LOWER_BOUND_INCLUSIVE);
    }

    /**
     * Sets value of 'upper_bound' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setUpperBound($value)
    {
        return $this->set(self::UPPER_BOUND, $value);
    }

    /**
     * Returns value of 'upper_bound' property
     *
     * @return int
     */
    public function getUpperBound()
    {
        return $this->get(self::UPPER_BOUND);
    }

    /**
     * Sets value of 'upper_bound_inclusive' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setUpperBoundInclusive($value)
    {
        return $this->set(self::UPPER_BOUND_INCLUSIVE, $value);
    }

    /**
     * Returns value of 'upper_bound_inclusive' property
     *
     * @return bool
     */
    public function getUpperBoundInclusive()
    {
        return $this->get(self::UPPER_BOUND_INCLUSIVE);
    }

    /**
     * Sets value of 'desc' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setDesc($value)
    {
        return $this->set(self::DESC, $value);
    }

    /**
     * Returns value of 'desc' property
     *
     * @return string
     */
    public function getDesc()
    {
        return $this->get(self::DESC);
    }
}
}