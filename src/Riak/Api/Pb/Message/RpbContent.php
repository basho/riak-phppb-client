<?php
/**
 * Auto generated from riak_kv.proto at 2015-08-20 00:04:20
 *
 * riak.api.pb.messages package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbContent message
 */
class RpbContent extends \ProtobufMessage
{
    /* Field index constants */
    const VALUE = 1;
    const CONTENT_TYPE = 2;
    const CHARSET = 3;
    const CONTENT_ENCODING = 4;
    const VTAG = 5;
    const LINKS = 6;
    const LAST_MOD = 7;
    const LAST_MOD_USECS = 8;
    const USERMETA = 9;
    const INDEXES = 10;
    const DELETED = 11;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::VALUE => array(
            'name' => 'value',
            'required' => true,
            'type' => 7,
        ),
        self::CONTENT_TYPE => array(
            'name' => 'content_type',
            'required' => false,
            'type' => 7,
        ),
        self::CHARSET => array(
            'name' => 'charset',
            'required' => false,
            'type' => 7,
        ),
        self::CONTENT_ENCODING => array(
            'name' => 'content_encoding',
            'required' => false,
            'type' => 7,
        ),
        self::VTAG => array(
            'name' => 'vtag',
            'required' => false,
            'type' => 7,
        ),
        self::LINKS => array(
            'name' => 'links',
            'repeated' => true,
            'type' => '\Basho\Riak\Api\Pb\Message\RpbLink'
        ),
        self::LAST_MOD => array(
            'name' => 'last_mod',
            'required' => false,
            'type' => 5,
        ),
        self::LAST_MOD_USECS => array(
            'name' => 'last_mod_usecs',
            'required' => false,
            'type' => 5,
        ),
        self::USERMETA => array(
            'name' => 'usermeta',
            'repeated' => true,
            'type' => '\Basho\Riak\Api\Pb\Message\RpbPair'
        ),
        self::INDEXES => array(
            'name' => 'indexes',
            'repeated' => true,
            'type' => '\Basho\Riak\Api\Pb\Message\RpbPair'
        ),
        self::DELETED => array(
            'name' => 'deleted',
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
        $this->values[self::VALUE] = null;
        $this->values[self::CONTENT_TYPE] = null;
        $this->values[self::CHARSET] = null;
        $this->values[self::CONTENT_ENCODING] = null;
        $this->values[self::VTAG] = null;
        $this->values[self::LINKS] = array();
        $this->values[self::LAST_MOD] = null;
        $this->values[self::LAST_MOD_USECS] = null;
        $this->values[self::USERMETA] = array();
        $this->values[self::INDEXES] = array();
        $this->values[self::DELETED] = null;
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
     * Sets value of 'value' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setValue($value)
    {
        return $this->set(self::VALUE, $value);
    }

    /**
     * Returns value of 'value' property
     *
     * @return string
     */
    public function getValue()
    {
        return $this->get(self::VALUE);
    }

    /**
     * Sets value of 'content_type' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setContentType($value)
    {
        return $this->set(self::CONTENT_TYPE, $value);
    }

    /**
     * Returns value of 'content_type' property
     *
     * @return string
     */
    public function getContentType()
    {
        return $this->get(self::CONTENT_TYPE);
    }

    /**
     * Sets value of 'charset' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setCharset($value)
    {
        return $this->set(self::CHARSET, $value);
    }

    /**
     * Returns value of 'charset' property
     *
     * @return string
     */
    public function getCharset()
    {
        return $this->get(self::CHARSET);
    }

    /**
     * Sets value of 'content_encoding' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setContentEncoding($value)
    {
        return $this->set(self::CONTENT_ENCODING, $value);
    }

    /**
     * Returns value of 'content_encoding' property
     *
     * @return string
     */
    public function getContentEncoding()
    {
        return $this->get(self::CONTENT_ENCODING);
    }

    /**
     * Sets value of 'vtag' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setVtag($value)
    {
        return $this->set(self::VTAG, $value);
    }

    /**
     * Returns value of 'vtag' property
     *
     * @return string
     */
    public function getVtag()
    {
        return $this->get(self::VTAG);
    }

    /**
     * Appends value to 'links' list
     *
     * @param \Basho\Riak\Api\Pb\Message\RpbLink $value Value to append
     *
     * @return null
     */
    public function appendLinks(\Basho\Riak\Api\Pb\Message\RpbLink $value)
    {
        return $this->append(self::LINKS, $value);
    }

    /**
     * Clears 'links' list
     *
     * @return null
     */
    public function clearLinks()
    {
        return $this->clear(self::LINKS);
    }

    /**
     * Returns 'links' list
     *
     * @return \Basho\Riak\Api\Pb\Message\RpbLink[]
     */
    public function getLinks()
    {
        return $this->get(self::LINKS);
    }

    /**
     * Returns 'links' iterator
     *
     * @return ArrayIterator
     */
    public function getLinksIterator()
    {
        return new \ArrayIterator($this->get(self::LINKS));
    }

    /**
     * Returns element from 'links' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return \Basho\Riak\Api\Pb\Message\RpbLink
     */
    public function getLinksAt($offset)
    {
        return $this->get(self::LINKS, $offset);
    }

    /**
     * Returns count of 'links' list
     *
     * @return int
     */
    public function getLinksCount()
    {
        return $this->count(self::LINKS);
    }

    /**
     * Sets value of 'last_mod' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setLastMod($value)
    {
        return $this->set(self::LAST_MOD, $value);
    }

    /**
     * Returns value of 'last_mod' property
     *
     * @return int
     */
    public function getLastMod()
    {
        return $this->get(self::LAST_MOD);
    }

    /**
     * Sets value of 'last_mod_usecs' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setLastModUsecs($value)
    {
        return $this->set(self::LAST_MOD_USECS, $value);
    }

    /**
     * Returns value of 'last_mod_usecs' property
     *
     * @return int
     */
    public function getLastModUsecs()
    {
        return $this->get(self::LAST_MOD_USECS);
    }

    /**
     * Appends value to 'usermeta' list
     *
     * @param \Basho\Riak\Api\Pb\Message\RpbPair $value Value to append
     *
     * @return null
     */
    public function appendUsermeta(\Basho\Riak\Api\Pb\Message\RpbPair $value)
    {
        return $this->append(self::USERMETA, $value);
    }

    /**
     * Clears 'usermeta' list
     *
     * @return null
     */
    public function clearUsermeta()
    {
        return $this->clear(self::USERMETA);
    }

    /**
     * Returns 'usermeta' list
     *
     * @return \Basho\Riak\Api\Pb\Message\RpbPair[]
     */
    public function getUsermeta()
    {
        return $this->get(self::USERMETA);
    }

    /**
     * Returns 'usermeta' iterator
     *
     * @return ArrayIterator
     */
    public function getUsermetaIterator()
    {
        return new \ArrayIterator($this->get(self::USERMETA));
    }

    /**
     * Returns element from 'usermeta' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return \Basho\Riak\Api\Pb\Message\RpbPair
     */
    public function getUsermetaAt($offset)
    {
        return $this->get(self::USERMETA, $offset);
    }

    /**
     * Returns count of 'usermeta' list
     *
     * @return int
     */
    public function getUsermetaCount()
    {
        return $this->count(self::USERMETA);
    }

    /**
     * Appends value to 'indexes' list
     *
     * @param \Basho\Riak\Api\Pb\Message\RpbPair $value Value to append
     *
     * @return null
     */
    public function appendIndexes(\Basho\Riak\Api\Pb\Message\RpbPair $value)
    {
        return $this->append(self::INDEXES, $value);
    }

    /**
     * Clears 'indexes' list
     *
     * @return null
     */
    public function clearIndexes()
    {
        return $this->clear(self::INDEXES);
    }

    /**
     * Returns 'indexes' list
     *
     * @return \Basho\Riak\Api\Pb\Message\RpbPair[]
     */
    public function getIndexes()
    {
        return $this->get(self::INDEXES);
    }

    /**
     * Returns 'indexes' iterator
     *
     * @return ArrayIterator
     */
    public function getIndexesIterator()
    {
        return new \ArrayIterator($this->get(self::INDEXES));
    }

    /**
     * Returns element from 'indexes' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return \Basho\Riak\Api\Pb\Message\RpbPair
     */
    public function getIndexesAt($offset)
    {
        return $this->get(self::INDEXES, $offset);
    }

    /**
     * Returns count of 'indexes' list
     *
     * @return int
     */
    public function getIndexesCount()
    {
        return $this->count(self::INDEXES);
    }

    /**
     * Sets value of 'deleted' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setDeleted($value)
    {
        return $this->set(self::DELETED, $value);
    }

    /**
     * Returns value of 'deleted' property
     *
     * @return bool
     */
    public function getDeleted()
    {
        return $this->get(self::DELETED);
    }
}
}