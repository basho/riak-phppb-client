<?php
/**
 * Auto generated from riak_kv.proto at 2016-09-19 10:16:32
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbBucketKeyPreflistItem message
 */
class RpbBucketKeyPreflistItem extends \ProtobufMessage
{
    /* Field index constants */
    const PARTITION = 1;
    const NODE = 2;
    const PRIMARY = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::PARTITION => array(
            'name' => 'partition',
            'required' => true,
            'type' => 5,
        ),
        self::NODE => array(
            'name' => 'node',
            'required' => true,
            'type' => 7,
        ),
        self::PRIMARY => array(
            'name' => 'primary',
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
        $this->values[self::PARTITION] = null;
        $this->values[self::NODE] = null;
        $this->values[self::PRIMARY] = null;
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
     * Sets value of 'partition' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setPartition($value)
    {
        return $this->set(self::PARTITION, $value);
    }

    /**
     * Returns value of 'partition' property
     *
     * @return int
     */
    public function getPartition()
    {
        return $this->get(self::PARTITION);
    }

    /**
     * Sets value of 'node' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setNode($value)
    {
        return $this->set(self::NODE, $value);
    }

    /**
     * Returns value of 'node' property
     *
     * @return string
     */
    public function getNode()
    {
        return $this->get(self::NODE);
    }

    /**
     * Sets value of 'primary' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setPrimary($value)
    {
        return $this->set(self::PRIMARY, $value);
    }

    /**
     * Returns value of 'primary' property
     *
     * @return bool
     */
    public function getPrimary()
    {
        return $this->get(self::PRIMARY);
    }
}
}