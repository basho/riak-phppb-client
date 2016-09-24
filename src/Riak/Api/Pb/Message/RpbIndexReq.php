<?php
/**
 * Auto generated from riak_kv.proto at 2016-09-24 09:49:42
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbIndexReq message
 */
class RpbIndexReq extends \ProtobufMessage
{
    /* Field index constants */
    const BUCKET = 1;
    const INDEX = 2;
    const QTYPE = 3;
    const KEY = 4;
    const RANGE_MIN = 5;
    const RANGE_MAX = 6;
    const RETURN_TERMS = 7;
    const STREAM = 8;
    const MAX_RESULTS = 9;
    const CONTINUATION = 10;
    const TIMEOUT = 11;
    const TYPE = 12;
    const TERM_REGEX = 13;
    const PAGINATION_SORT = 14;
    const COVER_CONTEXT = 15;
    const RETURN_BODY = 16;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::BUCKET => array(
            'name' => 'bucket',
            'required' => true,
            'type' => 7,
        ),
        self::INDEX => array(
            'name' => 'index',
            'required' => true,
            'type' => 7,
        ),
        self::QTYPE => array(
            'name' => 'qtype',
            'required' => true,
            'type' => 5,
        ),
        self::KEY => array(
            'name' => 'key',
            'required' => false,
            'type' => 7,
        ),
        self::RANGE_MIN => array(
            'name' => 'range_min',
            'required' => false,
            'type' => 7,
        ),
        self::RANGE_MAX => array(
            'name' => 'range_max',
            'required' => false,
            'type' => 7,
        ),
        self::RETURN_TERMS => array(
            'name' => 'return_terms',
            'required' => false,
            'type' => 8,
        ),
        self::STREAM => array(
            'name' => 'stream',
            'required' => false,
            'type' => 8,
        ),
        self::MAX_RESULTS => array(
            'name' => 'max_results',
            'required' => false,
            'type' => 5,
        ),
        self::CONTINUATION => array(
            'name' => 'continuation',
            'required' => false,
            'type' => 7,
        ),
        self::TIMEOUT => array(
            'name' => 'timeout',
            'required' => false,
            'type' => 5,
        ),
        self::TYPE => array(
            'name' => 'type',
            'required' => false,
            'type' => 7,
        ),
        self::TERM_REGEX => array(
            'name' => 'term_regex',
            'required' => false,
            'type' => 7,
        ),
        self::PAGINATION_SORT => array(
            'name' => 'pagination_sort',
            'required' => false,
            'type' => 8,
        ),
        self::COVER_CONTEXT => array(
            'name' => 'cover_context',
            'required' => false,
            'type' => 7,
        ),
        self::RETURN_BODY => array(
            'name' => 'return_body',
            'required' => false,
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
        $this->values[self::BUCKET] = null;
        $this->values[self::INDEX] = null;
        $this->values[self::QTYPE] = null;
        $this->values[self::KEY] = null;
        $this->values[self::RANGE_MIN] = null;
        $this->values[self::RANGE_MAX] = null;
        $this->values[self::RETURN_TERMS] = null;
        $this->values[self::STREAM] = null;
        $this->values[self::MAX_RESULTS] = null;
        $this->values[self::CONTINUATION] = null;
        $this->values[self::TIMEOUT] = null;
        $this->values[self::TYPE] = null;
        $this->values[self::TERM_REGEX] = null;
        $this->values[self::PAGINATION_SORT] = null;
        $this->values[self::COVER_CONTEXT] = null;
        $this->values[self::RETURN_BODY] = null;
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
     * Sets value of 'index' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setIndex($value)
    {
        return $this->set(self::INDEX, $value);
    }

    /**
     * Returns value of 'index' property
     *
     * @return string
     */
    public function getIndex()
    {
        return $this->get(self::INDEX);
    }

    /**
     * Sets value of 'qtype' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setQtype($value)
    {
        return $this->set(self::QTYPE, $value);
    }

    /**
     * Returns value of 'qtype' property
     *
     * @return int
     */
    public function getQtype()
    {
        return $this->get(self::QTYPE);
    }

    /**
     * Sets value of 'key' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setKey($value)
    {
        return $this->set(self::KEY, $value);
    }

    /**
     * Returns value of 'key' property
     *
     * @return string
     */
    public function getKey()
    {
        return $this->get(self::KEY);
    }

    /**
     * Sets value of 'range_min' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setRangeMin($value)
    {
        return $this->set(self::RANGE_MIN, $value);
    }

    /**
     * Returns value of 'range_min' property
     *
     * @return string
     */
    public function getRangeMin()
    {
        return $this->get(self::RANGE_MIN);
    }

    /**
     * Sets value of 'range_max' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setRangeMax($value)
    {
        return $this->set(self::RANGE_MAX, $value);
    }

    /**
     * Returns value of 'range_max' property
     *
     * @return string
     */
    public function getRangeMax()
    {
        return $this->get(self::RANGE_MAX);
    }

    /**
     * Sets value of 'return_terms' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setReturnTerms($value)
    {
        return $this->set(self::RETURN_TERMS, $value);
    }

    /**
     * Returns value of 'return_terms' property
     *
     * @return bool
     */
    public function getReturnTerms()
    {
        return $this->get(self::RETURN_TERMS);
    }

    /**
     * Sets value of 'stream' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setStream($value)
    {
        return $this->set(self::STREAM, $value);
    }

    /**
     * Returns value of 'stream' property
     *
     * @return bool
     */
    public function getStream()
    {
        return $this->get(self::STREAM);
    }

    /**
     * Sets value of 'max_results' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setMaxResults($value)
    {
        return $this->set(self::MAX_RESULTS, $value);
    }

    /**
     * Returns value of 'max_results' property
     *
     * @return int
     */
    public function getMaxResults()
    {
        return $this->get(self::MAX_RESULTS);
    }

    /**
     * Sets value of 'continuation' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setContinuation($value)
    {
        return $this->set(self::CONTINUATION, $value);
    }

    /**
     * Returns value of 'continuation' property
     *
     * @return string
     */
    public function getContinuation()
    {
        return $this->get(self::CONTINUATION);
    }

    /**
     * Sets value of 'timeout' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setTimeout($value)
    {
        return $this->set(self::TIMEOUT, $value);
    }

    /**
     * Returns value of 'timeout' property
     *
     * @return int
     */
    public function getTimeout()
    {
        return $this->get(self::TIMEOUT);
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
     * Sets value of 'term_regex' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setTermRegex($value)
    {
        return $this->set(self::TERM_REGEX, $value);
    }

    /**
     * Returns value of 'term_regex' property
     *
     * @return string
     */
    public function getTermRegex()
    {
        return $this->get(self::TERM_REGEX);
    }

    /**
     * Sets value of 'pagination_sort' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setPaginationSort($value)
    {
        return $this->set(self::PAGINATION_SORT, $value);
    }

    /**
     * Returns value of 'pagination_sort' property
     *
     * @return bool
     */
    public function getPaginationSort()
    {
        return $this->get(self::PAGINATION_SORT);
    }

    /**
     * Sets value of 'cover_context' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setCoverContext($value)
    {
        return $this->set(self::COVER_CONTEXT, $value);
    }

    /**
     * Returns value of 'cover_context' property
     *
     * @return string
     */
    public function getCoverContext()
    {
        return $this->get(self::COVER_CONTEXT);
    }

    /**
     * Sets value of 'return_body' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setReturnBody($value)
    {
        return $this->set(self::RETURN_BODY, $value);
    }

    /**
     * Returns value of 'return_body' property
     *
     * @return bool
     */
    public function getReturnBody()
    {
        return $this->get(self::RETURN_BODY);
    }
}
}