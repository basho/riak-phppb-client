<?php
/**
 * Auto generated from riak_ts.proto at 2016-09-24 09:49:42
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * TsRow message
 */
class TsRow extends \ProtobufMessage
{
    /* Field index constants */
    const CELLS = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::CELLS => array(
            'name' => 'cells',
            'repeated' => true,
            'type' => '\Basho\Riak\Api\Pb\Message\TsCell'
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
        $this->values[self::CELLS] = array();
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
     * Appends value to 'cells' list
     *
     * @param \Basho\Riak\Api\Pb\Message\TsCell $value Value to append
     *
     * @return null
     */
    public function appendCells(\Basho\Riak\Api\Pb\Message\TsCell $value)
    {
        return $this->append(self::CELLS, $value);
    }

    /**
     * Clears 'cells' list
     *
     * @return null
     */
    public function clearCells()
    {
        return $this->clear(self::CELLS);
    }

    /**
     * Returns 'cells' list
     *
     * @return \Basho\Riak\Api\Pb\Message\TsCell[]
     */
    public function getCells()
    {
        return $this->get(self::CELLS);
    }

    /**
     * Returns 'cells' iterator
     *
     * @return ArrayIterator
     */
    public function getCellsIterator()
    {
        return new \ArrayIterator($this->get(self::CELLS));
    }

    /**
     * Returns element from 'cells' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return \Basho\Riak\Api\Pb\Message\TsCell
     */
    public function getCellsAt($offset)
    {
        return $this->get(self::CELLS, $offset);
    }

    /**
     * Returns count of 'cells' list
     *
     * @return int
     */
    public function getCellsCount()
    {
        return $this->count(self::CELLS);
    }
}
}