<?php
/**
 * Auto generated from riak_kv.proto at 2015-08-20 00:04:20
 *
 * riak.api.pb.messages package
 */

namespace Riak\Api\Pb\Messages {
/**
 * RpbMapRedResp message
 */
class RpbMapRedResp extends \ProtobufMessage
{
    /* Field index constants */
    const PHASE = 1;
    const RESPONSE = 2;
    const DONE = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::PHASE => array(
            'name' => 'phase',
            'required' => false,
            'type' => 5,
        ),
        self::RESPONSE => array(
            'name' => 'response',
            'required' => false,
            'type' => 7,
        ),
        self::DONE => array(
            'name' => 'done',
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
        $this->values[self::PHASE] = null;
        $this->values[self::RESPONSE] = null;
        $this->values[self::DONE] = null;
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
     * Sets value of 'phase' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setPhase($value)
    {
        return $this->set(self::PHASE, $value);
    }

    /**
     * Returns value of 'phase' property
     *
     * @return int
     */
    public function getPhase()
    {
        return $this->get(self::PHASE);
    }

    /**
     * Sets value of 'response' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setResponse($value)
    {
        return $this->set(self::RESPONSE, $value);
    }

    /**
     * Returns value of 'response' property
     *
     * @return string
     */
    public function getResponse()
    {
        return $this->get(self::RESPONSE);
    }

    /**
     * Sets value of 'done' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setDone($value)
    {
        return $this->set(self::DONE, $value);
    }

    /**
     * Returns value of 'done' property
     *
     * @return bool
     */
    public function getDone()
    {
        return $this->get(self::DONE);
    }
}
}