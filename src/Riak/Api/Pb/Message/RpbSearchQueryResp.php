<?php
/**
 * Auto generated from riak_search.proto at 2015-08-20 00:06:07
 *
 * riak.api.pb.messages package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbSearchQueryResp message
 */
class RpbSearchQueryResp extends \ProtobufMessage
{
    /* Field index constants */
    const DOCS = 1;
    const MAX_SCORE = 2;
    const NUM_FOUND = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::DOCS => array(
            'name' => 'docs',
            'repeated' => true,
            'type' => '\Basho\Riak\Api\Pb\Message\RpbSearchDoc'
        ),
        self::MAX_SCORE => array(
            'name' => 'max_score',
            'required' => false,
            'type' => 4,
        ),
        self::NUM_FOUND => array(
            'name' => 'num_found',
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
        $this->values[self::DOCS] = array();
        $this->values[self::MAX_SCORE] = null;
        $this->values[self::NUM_FOUND] = null;
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
     * Appends value to 'docs' list
     *
     * @param \Basho\Riak\Api\Pb\Message\RpbSearchDoc $value Value to append
     *
     * @return null
     */
    public function appendDocs(\Basho\Riak\Api\Pb\Message\RpbSearchDoc $value)
    {
        return $this->append(self::DOCS, $value);
    }

    /**
     * Clears 'docs' list
     *
     * @return null
     */
    public function clearDocs()
    {
        return $this->clear(self::DOCS);
    }

    /**
     * Returns 'docs' list
     *
     * @return \Basho\Riak\Api\Pb\Message\RpbSearchDoc[]
     */
    public function getDocs()
    {
        return $this->get(self::DOCS);
    }

    /**
     * Returns 'docs' iterator
     *
     * @return ArrayIterator
     */
    public function getDocsIterator()
    {
        return new \ArrayIterator($this->get(self::DOCS));
    }

    /**
     * Returns element from 'docs' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return \Basho\Riak\Api\Pb\Message\RpbSearchDoc
     */
    public function getDocsAt($offset)
    {
        return $this->get(self::DOCS, $offset);
    }

    /**
     * Returns count of 'docs' list
     *
     * @return int
     */
    public function getDocsCount()
    {
        return $this->count(self::DOCS);
    }

    /**
     * Sets value of 'max_score' property
     *
     * @param float $value Property value
     *
     * @return null
     */
    public function setMaxScore($value)
    {
        return $this->set(self::MAX_SCORE, $value);
    }

    /**
     * Returns value of 'max_score' property
     *
     * @return float
     */
    public function getMaxScore()
    {
        return $this->get(self::MAX_SCORE);
    }

    /**
     * Sets value of 'num_found' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setNumFound($value)
    {
        return $this->set(self::NUM_FOUND, $value);
    }

    /**
     * Returns value of 'num_found' property
     *
     * @return int
     */
    public function getNumFound()
    {
        return $this->get(self::NUM_FOUND);
    }
}
}