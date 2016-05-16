<?php
/**
 * Auto generated from riak.proto at 2016-05-06 13:12:07
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbCommitHook message
 */
class RpbCommitHook extends \ProtobufMessage
{
    /* Field index constants */
    const MODFUN = 1;
    const NAME = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::MODFUN => array(
            'name' => 'modfun',
            'required' => false,
            'type' => '\Basho\Riak\Api\Pb\Message\RpbModFun'
        ),
        self::NAME => array(
            'name' => 'name',
            'required' => false,
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
        $this->values[self::MODFUN] = null;
        $this->values[self::NAME] = null;
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
     * Sets value of 'modfun' property
     *
     * @param \Basho\Riak\Api\Pb\Message\RpbModFun $value Property value
     *
     * @return null
     */
    public function setModfun(\Basho\Riak\Api\Pb\Message\RpbModFun $value)
    {
        return $this->set(self::MODFUN, $value);
    }

    /**
     * Returns value of 'modfun' property
     *
     * @return \Basho\Riak\Api\Pb\Message\RpbModFun
     */
    public function getModfun()
    {
        return $this->get(self::MODFUN);
    }

    /**
     * Sets value of 'name' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setName($value)
    {
        return $this->set(self::NAME, $value);
    }

    /**
     * Returns value of 'name' property
     *
     * @return string
     */
    public function getName()
    {
        return $this->get(self::NAME);
    }
}
}