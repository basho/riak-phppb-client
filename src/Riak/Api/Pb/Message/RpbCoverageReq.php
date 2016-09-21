<?php
/**
 * Auto generated from riak_kv.proto at 2016-09-21 11:26:05
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbCoverageReq message
 */
class RpbCoverageReq extends \ProtobufMessage
{
    /* Field index constants */
    const TYPE = 1;
    const BUCKET = 2;
    const MIN_PARTITIONS = 3;
    const REPLACE_COVER = 4;
    const UNAVAILABLE_COVER = 5;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::TYPE => array(
            'name' => 'type',
            'required' => false,
            'type' => 7,
        ),
        self::BUCKET => array(
            'name' => 'bucket',
            'required' => true,
            'type' => 7,
        ),
        self::MIN_PARTITIONS => array(
            'name' => 'min_partitions',
            'required' => false,
            'type' => 5,
        ),
        self::REPLACE_COVER => array(
            'name' => 'replace_cover',
            'required' => false,
            'type' => 7,
        ),
        self::UNAVAILABLE_COVER => array(
            'name' => 'unavailable_cover',
            'repeated' => true,
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
        $this->values[self::TYPE] = null;
        $this->values[self::BUCKET] = null;
        $this->values[self::MIN_PARTITIONS] = null;
        $this->values[self::REPLACE_COVER] = null;
        $this->values[self::UNAVAILABLE_COVER] = array();
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
     * Sets value of 'type' property
     *
     * @param string $value Property value
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
     * @return string
     */
    public function getType()
    {
        return $this->get(self::TYPE);
    }

    /**
     * Sets value of 'bucket' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setBucket($value)
    {
        return $this->set(self::BUCKET, $value);
    }

    /**
     * Returns value of 'bucket' property
     *
     * @return string
     */
    public function getBucket()
    {
        return $this->get(self::BUCKET);
    }

    /**
     * Sets value of 'min_partitions' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setMinPartitions($value)
    {
        return $this->set(self::MIN_PARTITIONS, $value);
    }

    /**
     * Returns value of 'min_partitions' property
     *
     * @return int
     */
    public function getMinPartitions()
    {
        return $this->get(self::MIN_PARTITIONS);
    }

    /**
     * Sets value of 'replace_cover' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setReplaceCover($value)
    {
        return $this->set(self::REPLACE_COVER, $value);
    }

    /**
     * Returns value of 'replace_cover' property
     *
     * @return string
     */
    public function getReplaceCover()
    {
        return $this->get(self::REPLACE_COVER);
    }

    /**
     * Appends value to 'unavailable_cover' list
     *
     * @param string $value Value to append
     *
     * @return null
     */
    public function appendUnavailableCover($value)
    {
        return $this->append(self::UNAVAILABLE_COVER, $value);
    }

    /**
     * Clears 'unavailable_cover' list
     *
     * @return null
     */
    public function clearUnavailableCover()
    {
        return $this->clear(self::UNAVAILABLE_COVER);
    }

    /**
     * Returns 'unavailable_cover' list
     *
     * @return string[]
     */
    public function getUnavailableCover()
    {
        return $this->get(self::UNAVAILABLE_COVER);
    }

    /**
     * Returns 'unavailable_cover' iterator
     *
     * @return ArrayIterator
     */
    public function getUnavailableCoverIterator()
    {
        return new \ArrayIterator($this->get(self::UNAVAILABLE_COVER));
    }

    /**
     * Returns element from 'unavailable_cover' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return string
     */
    public function getUnavailableCoverAt($offset)
    {
        return $this->get(self::UNAVAILABLE_COVER, $offset);
    }

    /**
     * Returns count of 'unavailable_cover' list
     *
     * @return int
     */
    public function getUnavailableCoverCount()
    {
        return $this->count(self::UNAVAILABLE_COVER);
    }
}
}