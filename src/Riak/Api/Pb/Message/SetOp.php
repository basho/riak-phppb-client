<?php
/**
 * Auto generated from riak_dt.proto at 2016-09-19 10:16:32
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * SetOp message
 */
class SetOp extends \ProtobufMessage
{
    /* Field index constants */
    const ADDS = 1;
    const REMOVES = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ADDS => array(
            'name' => 'adds',
            'repeated' => true,
            'type' => 7,
        ),
        self::REMOVES => array(
            'name' => 'removes',
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
        $this->values[self::REMOVES] = array();
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

    /**
     * Appends value to 'removes' list
     *
     * @param string $value Value to append
     *
     * @return null
     */
    public function appendRemoves($value)
    {
        return $this->append(self::REMOVES, $value);
    }

    /**
     * Clears 'removes' list
     *
     * @return null
     */
    public function clearRemoves()
    {
        return $this->clear(self::REMOVES);
    }

    /**
     * Returns 'removes' list
     *
     * @return string[]
     */
    public function getRemoves()
    {
        return $this->get(self::REMOVES);
    }

    /**
     * Returns 'removes' iterator
     *
     * @return ArrayIterator
     */
    public function getRemovesIterator()
    {
        return new \ArrayIterator($this->get(self::REMOVES));
    }

    /**
     * Returns element from 'removes' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return string
     */
    public function getRemovesAt($offset)
    {
        return $this->get(self::REMOVES, $offset);
    }

    /**
     * Returns count of 'removes' list
     *
     * @return int
     */
    public function getRemovesCount()
    {
        return $this->count(self::REMOVES);
    }
}
}