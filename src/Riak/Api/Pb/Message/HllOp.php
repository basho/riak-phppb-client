<?php
/**
 * Auto generated from riak_dt.proto at 2016-09-21 11:26:05
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * HllOp message
 */
class HllOp extends \ProtobufMessage
{
    /* Field index constants */
    const ADDS = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ADDS => array(
            'name' => 'adds',
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
        $this->values[self::ADDS] = array();
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
     * Appends value to 'adds' list
     *
     * @param string $value Value to append
     *
     * @return null
     */
    public function appendAdds($value)
    {
        return $this->append(self::ADDS, $value);
    }

    /**
     * Clears 'adds' list
     *
     * @return null
     */
    public function clearAdds()
    {
        return $this->clear(self::ADDS);
    }

    /**
     * Returns 'adds' list
     *
     * @return string[]
     */
    public function getAdds()
    {
        return $this->get(self::ADDS);
    }

    /**
     * Returns 'adds' iterator
     *
     * @return ArrayIterator
     */
    public function getAddsIterator()
    {
        return new \ArrayIterator($this->get(self::ADDS));
    }

    /**
     * Returns element from 'adds' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return string
     */
    public function getAddsAt($offset)
    {
        return $this->get(self::ADDS, $offset);
    }

    /**
     * Returns count of 'adds' list
     *
     * @return int
     */
    public function getAddsCount()
    {
        return $this->count(self::ADDS);
    }
}
}