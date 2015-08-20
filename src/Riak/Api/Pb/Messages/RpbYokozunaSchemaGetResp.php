<?php
/**
 * Auto generated from riak_yokozuna.proto at 2015-08-20 00:06:02
 *
 * riak.api.pb.messages package
 */

namespace Riak\Api\Pb\Messages {
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
            'type' => '\Riak\Api\Pb\Messages\RpbYokozunaSchema'
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
     * @param \Riak\Api\Pb\Messages\RpbYokozunaSchema $value Property value
     *
     * @return null
     */
    public function setSchema(\Riak\Api\Pb\Messages\RpbYokozunaSchema $value)
    {
        return $this->set(self::SCHEMA, $value);
    }

    /**
     * Returns value of 'schema' property
     *
     * @return \Riak\Api\Pb\Messages\RpbYokozunaSchema
     */
    public function getSchema()
    {
        return $this->get(self::SCHEMA);
    }
}
}