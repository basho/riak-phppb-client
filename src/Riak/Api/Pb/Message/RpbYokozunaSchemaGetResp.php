<?php
/**
 * Auto generated from riak_yokozuna.proto at 2016-09-24 09:49:42
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbYokozunaSchemaGetResp message
 */
class RpbYokozunaSchemaGetResp extends \ProtobufMessage
{
    /* Field index constants */
    const SCHEMA = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::SCHEMA => array(
            'name' => 'schema',
            'required' => true,
            'type' => '\Basho\Riak\Api\Pb\Message\RpbYokozunaSchema'
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
        $this->values[self::SCHEMA] = null;
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
     * Sets value of 'schema' property
     *
     * @param \Basho\Riak\Api\Pb\Message\RpbYokozunaSchema $value Property value
     *
     * @return null
     */
    public function setSchema(\Basho\Riak\Api\Pb\Message\RpbYokozunaSchema $value)
    {
        return $this->set(self::SCHEMA, $value);
    }

    /**
     * Returns value of 'schema' property
     *
     * @return \Basho\Riak\Api\Pb\Message\RpbYokozunaSchema
     */
    public function getSchema()
    {
        return $this->get(self::SCHEMA);
    }
}
}