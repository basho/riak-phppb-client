<?php
/**
 * Auto generated from riak.proto at 2016-09-19 10:16:32
 *
 * Basho\Riak\Api\Pb\Message package
 */

namespace Basho\Riak\Api\Pb\Message {
/**
 * RpbBucketProps message
 */
class RpbBucketProps extends \ProtobufMessage
{
    /* Field index constants */
    const N_VAL = 1;
    const ALLOW_MULT = 2;
    const LAST_WRITE_WINS = 3;
    const PRECOMMIT = 4;
    const HAS_PRECOMMIT = 5;
    const POSTCOMMIT = 6;
    const HAS_POSTCOMMIT = 7;
    const CHASH_KEYFUN = 8;
    const LINKFUN = 9;
    const OLD_VCLOCK = 10;
    const YOUNG_VCLOCK = 11;
    const BIG_VCLOCK = 12;
    const SMALL_VCLOCK = 13;
    const PR = 14;
    const R = 15;
    const W = 16;
    const PW = 17;
    const DW = 18;
    const RW = 19;
    const BASIC_QUORUM = 20;
    const NOTFOUND_OK = 21;
    const BACKEND = 22;
    const SEARCH = 23;
    const REPL = 24;
    const SEARCH_INDEX = 25;
    const DATATYPE = 26;
    const CONSISTENT = 27;
    const WRITE_ONCE = 28;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::N_VAL => array(
            'name' => 'n_val',
            'required' => false,
            'type' => 5,
        ),
        self::ALLOW_MULT => array(
            'name' => 'allow_mult',
            'required' => false,
            'type' => 8,
        ),
        self::LAST_WRITE_WINS => array(
            'name' => 'last_write_wins',
            'required' => false,
            'type' => 8,
        ),
        self::PRECOMMIT => array(
            'name' => 'precommit',
            'repeated' => true,
            'type' => '\Basho\Riak\Api\Pb\Message\RpbCommitHook'
        ),
        self::HAS_PRECOMMIT => array(
            'default' => false, 
            'name' => 'has_precommit',
            'required' => false,
            'type' => 8,
        ),
        self::POSTCOMMIT => array(
            'name' => 'postcommit',
            'repeated' => true,
            'type' => '\Basho\Riak\Api\Pb\Message\RpbCommitHook'
        ),
        self::HAS_POSTCOMMIT => array(
            'default' => false, 
            'name' => 'has_postcommit',
            'required' => false,
            'type' => 8,
        ),
        self::CHASH_KEYFUN => array(
            'name' => 'chash_keyfun',
            'required' => false,
            'type' => '\Basho\Riak\Api\Pb\Message\RpbModFun'
        ),
        self::LINKFUN => array(
            'name' => 'linkfun',
            'required' => false,
            'type' => '\Basho\Riak\Api\Pb\Message\RpbModFun'
        ),
        self::OLD_VCLOCK => array(
            'name' => 'old_vclock',
            'required' => false,
            'type' => 5,
        ),
        self::YOUNG_VCLOCK => array(
            'name' => 'young_vclock',
            'required' => false,
            'type' => 5,
        ),
        self::BIG_VCLOCK => array(
            'name' => 'big_vclock',
            'required' => false,
            'type' => 5,
        ),
        self::SMALL_VCLOCK => array(
            'name' => 'small_vclock',
            'required' => false,
            'type' => 5,
        ),
        self::PR => array(
            'name' => 'pr',
            'required' => false,
            'type' => 5,
        ),
        self::R => array(
            'name' => 'r',
            'required' => false,
            'type' => 5,
        ),
        self::W => array(
            'name' => 'w',
            'required' => false,
            'type' => 5,
        ),
        self::PW => array(
            'name' => 'pw',
            'required' => false,
            'type' => 5,
        ),
        self::DW => array(
            'name' => 'dw',
            'required' => false,
            'type' => 5,
        ),
        self::RW => array(
            'name' => 'rw',
            'required' => false,
            'type' => 5,
        ),
        self::BASIC_QUORUM => array(
            'name' => 'basic_quorum',
            'required' => false,
            'type' => 8,
        ),
        self::NOTFOUND_OK => array(
            'name' => 'notfound_ok',
            'required' => false,
            'type' => 8,
        ),
        self::BACKEND => array(
            'name' => 'backend',
            'required' => false,
            'type' => 7,
        ),
        self::SEARCH => array(
            'name' => 'search',
            'required' => false,
            'type' => 8,
        ),
        self::REPL => array(
            'name' => 'repl',
            'required' => false,
            'type' => 5,
        ),
        self::SEARCH_INDEX => array(
            'name' => 'search_index',
            'required' => false,
            'type' => 7,
        ),
        self::DATATYPE => array(
            'name' => 'datatype',
            'required' => false,
            'type' => 7,
        ),
        self::CONSISTENT => array(
            'name' => 'consistent',
            'required' => false,
            'type' => 8,
        ),
        self::WRITE_ONCE => array(
            'name' => 'write_once',
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
        $this->values[self::N_VAL] = null;
        $this->values[self::ALLOW_MULT] = null;
        $this->values[self::LAST_WRITE_WINS] = null;
        $this->values[self::PRECOMMIT] = array();
        $this->values[self::HAS_PRECOMMIT] = false;
        $this->values[self::POSTCOMMIT] = array();
        $this->values[self::HAS_POSTCOMMIT] = false;
        $this->values[self::CHASH_KEYFUN] = null;
        $this->values[self::LINKFUN] = null;
        $this->values[self::OLD_VCLOCK] = null;
        $this->values[self::YOUNG_VCLOCK] = null;
        $this->values[self::BIG_VCLOCK] = null;
        $this->values[self::SMALL_VCLOCK] = null;
        $this->values[self::PR] = null;
        $this->values[self::R] = null;
        $this->values[self::W] = null;
        $this->values[self::PW] = null;
        $this->values[self::DW] = null;
        $this->values[self::RW] = null;
        $this->values[self::BASIC_QUORUM] = null;
        $this->values[self::NOTFOUND_OK] = null;
        $this->values[self::BACKEND] = null;
        $this->values[self::SEARCH] = null;
        $this->values[self::REPL] = null;
        $this->values[self::SEARCH_INDEX] = null;
        $this->values[self::DATATYPE] = null;
        $this->values[self::CONSISTENT] = null;
        $this->values[self::WRITE_ONCE] = null;
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
     * Sets value of 'n_val' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setNVal($value)
    {
        return $this->set(self::N_VAL, $value);
    }

    /**
     * Returns value of 'n_val' property
     *
     * @return int
     */
    public function getNVal()
    {
        return $this->get(self::N_VAL);
    }

    /**
     * Sets value of 'allow_mult' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setAllowMult($value)
    {
        return $this->set(self::ALLOW_MULT, $value);
    }

    /**
     * Returns value of 'allow_mult' property
     *
     * @return bool
     */
    public function getAllowMult()
    {
        return $this->get(self::ALLOW_MULT);
    }

    /**
     * Sets value of 'last_write_wins' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setLastWriteWins($value)
    {
        return $this->set(self::LAST_WRITE_WINS, $value);
    }

    /**
     * Returns value of 'last_write_wins' property
     *
     * @return bool
     */
    public function getLastWriteWins()
    {
        return $this->get(self::LAST_WRITE_WINS);
    }

    /**
     * Appends value to 'precommit' list
     *
     * @param \Basho\Riak\Api\Pb\Message\RpbCommitHook $value Value to append
     *
     * @return null
     */
    public function appendPrecommit(\Basho\Riak\Api\Pb\Message\RpbCommitHook $value)
    {
        return $this->append(self::PRECOMMIT, $value);
    }

    /**
     * Clears 'precommit' list
     *
     * @return null
     */
    public function clearPrecommit()
    {
        return $this->clear(self::PRECOMMIT);
    }

    /**
     * Returns 'precommit' list
     *
     * @return \Basho\Riak\Api\Pb\Message\RpbCommitHook[]
     */
    public function getPrecommit()
    {
        return $this->get(self::PRECOMMIT);
    }

    /**
     * Returns 'precommit' iterator
     *
     * @return ArrayIterator
     */
    public function getPrecommitIterator()
    {
        return new \ArrayIterator($this->get(self::PRECOMMIT));
    }

    /**
     * Returns element from 'precommit' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return \Basho\Riak\Api\Pb\Message\RpbCommitHook
     */
    public function getPrecommitAt($offset)
    {
        return $this->get(self::PRECOMMIT, $offset);
    }

    /**
     * Returns count of 'precommit' list
     *
     * @return int
     */
    public function getPrecommitCount()
    {
        return $this->count(self::PRECOMMIT);
    }

    /**
     * Sets value of 'has_precommit' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setHasPrecommit($value)
    {
        return $this->set(self::HAS_PRECOMMIT, $value);
    }

    /**
     * Returns value of 'has_precommit' property
     *
     * @return bool
     */
    public function getHasPrecommit()
    {
        return $this->get(self::HAS_PRECOMMIT);
    }

    /**
     * Appends value to 'postcommit' list
     *
     * @param \Basho\Riak\Api\Pb\Message\RpbCommitHook $value Value to append
     *
     * @return null
     */
    public function appendPostcommit(\Basho\Riak\Api\Pb\Message\RpbCommitHook $value)
    {
        return $this->append(self::POSTCOMMIT, $value);
    }

    /**
     * Clears 'postcommit' list
     *
     * @return null
     */
    public function clearPostcommit()
    {
        return $this->clear(self::POSTCOMMIT);
    }

    /**
     * Returns 'postcommit' list
     *
     * @return \Basho\Riak\Api\Pb\Message\RpbCommitHook[]
     */
    public function getPostcommit()
    {
        return $this->get(self::POSTCOMMIT);
    }

    /**
     * Returns 'postcommit' iterator
     *
     * @return ArrayIterator
     */
    public function getPostcommitIterator()
    {
        return new \ArrayIterator($this->get(self::POSTCOMMIT));
    }

    /**
     * Returns element from 'postcommit' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return \Basho\Riak\Api\Pb\Message\RpbCommitHook
     */
    public function getPostcommitAt($offset)
    {
        return $this->get(self::POSTCOMMIT, $offset);
    }

    /**
     * Returns count of 'postcommit' list
     *
     * @return int
     */
    public function getPostcommitCount()
    {
        return $this->count(self::POSTCOMMIT);
    }

    /**
     * Sets value of 'has_postcommit' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setHasPostcommit($value)
    {
        return $this->set(self::HAS_POSTCOMMIT, $value);
    }

    /**
     * Returns value of 'has_postcommit' property
     *
     * @return bool
     */
    public function getHasPostcommit()
    {
        return $this->get(self::HAS_POSTCOMMIT);
    }

    /**
     * Sets value of 'chash_keyfun' property
     *
     * @param \Basho\Riak\Api\Pb\Message\RpbModFun $value Property value
     *
     * @return null
     */
    public function setChashKeyfun(\Basho\Riak\Api\Pb\Message\RpbModFun $value)
    {
        return $this->set(self::CHASH_KEYFUN, $value);
    }

    /**
     * Returns value of 'chash_keyfun' property
     *
     * @return \Basho\Riak\Api\Pb\Message\RpbModFun
     */
    public function getChashKeyfun()
    {
        return $this->get(self::CHASH_KEYFUN);
    }

    /**
     * Sets value of 'linkfun' property
     *
     * @param \Basho\Riak\Api\Pb\Message\RpbModFun $value Property value
     *
     * @return null
     */
    public function setLinkfun(\Basho\Riak\Api\Pb\Message\RpbModFun $value)
    {
        return $this->set(self::LINKFUN, $value);
    }

    /**
     * Returns value of 'linkfun' property
     *
     * @return \Basho\Riak\Api\Pb\Message\RpbModFun
     */
    public function getLinkfun()
    {
        return $this->get(self::LINKFUN);
    }

    /**
     * Sets value of 'old_vclock' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setOldVclock($value)
    {
        return $this->set(self::OLD_VCLOCK, $value);
    }

    /**
     * Returns value of 'old_vclock' property
     *
     * @return int
     */
    public function getOldVclock()
    {
        return $this->get(self::OLD_VCLOCK);
    }

    /**
     * Sets value of 'young_vclock' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setYoungVclock($value)
    {
        return $this->set(self::YOUNG_VCLOCK, $value);
    }

    /**
     * Returns value of 'young_vclock' property
     *
     * @return int
     */
    public function getYoungVclock()
    {
        return $this->get(self::YOUNG_VCLOCK);
    }

    /**
     * Sets value of 'big_vclock' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setBigVclock($value)
    {
        return $this->set(self::BIG_VCLOCK, $value);
    }

    /**
     * Returns value of 'big_vclock' property
     *
     * @return int
     */
    public function getBigVclock()
    {
        return $this->get(self::BIG_VCLOCK);
    }

    /**
     * Sets value of 'small_vclock' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setSmallVclock($value)
    {
        return $this->set(self::SMALL_VCLOCK, $value);
    }

    /**
     * Returns value of 'small_vclock' property
     *
     * @return int
     */
    public function getSmallVclock()
    {
        return $this->get(self::SMALL_VCLOCK);
    }

    /**
     * Sets value of 'pr' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setPr($value)
    {
        return $this->set(self::PR, $value);
    }

    /**
     * Returns value of 'pr' property
     *
     * @return int
     */
    public function getPr()
    {
        return $this->get(self::PR);
    }

    /**
     * Sets value of 'r' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setR($value)
    {
        return $this->set(self::R, $value);
    }

    /**
     * Returns value of 'r' property
     *
     * @return int
     */
    public function getR()
    {
        return $this->get(self::R);
    }

    /**
     * Sets value of 'w' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setW($value)
    {
        return $this->set(self::W, $value);
    }

    /**
     * Returns value of 'w' property
     *
     * @return int
     */
    public function getW()
    {
        return $this->get(self::W);
    }

    /**
     * Sets value of 'pw' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setPw($value)
    {
        return $this->set(self::PW, $value);
    }

    /**
     * Returns value of 'pw' property
     *
     * @return int
     */
    public function getPw()
    {
        return $this->get(self::PW);
    }

    /**
     * Sets value of 'dw' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setDw($value)
    {
        return $this->set(self::DW, $value);
    }

    /**
     * Returns value of 'dw' property
     *
     * @return int
     */
    public function getDw()
    {
        return $this->get(self::DW);
    }

    /**
     * Sets value of 'rw' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setRw($value)
    {
        return $this->set(self::RW, $value);
    }

    /**
     * Returns value of 'rw' property
     *
     * @return int
     */
    public function getRw()
    {
        return $this->get(self::RW);
    }

    /**
     * Sets value of 'basic_quorum' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setBasicQuorum($value)
    {
        return $this->set(self::BASIC_QUORUM, $value);
    }

    /**
     * Returns value of 'basic_quorum' property
     *
     * @return bool
     */
    public function getBasicQuorum()
    {
        return $this->get(self::BASIC_QUORUM);
    }

    /**
     * Sets value of 'notfound_ok' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setNotfoundOk($value)
    {
        return $this->set(self::NOTFOUND_OK, $value);
    }

    /**
     * Returns value of 'notfound_ok' property
     *
     * @return bool
     */
    public function getNotfoundOk()
    {
        return $this->get(self::NOTFOUND_OK);
    }

    /**
     * Sets value of 'backend' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setBackend($value)
    {
        return $this->set(self::BACKEND, $value);
    }

    /**
     * Returns value of 'backend' property
     *
     * @return string
     */
    public function getBackend()
    {
        return $this->get(self::BACKEND);
    }

    /**
     * Sets value of 'search' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setSearch($value)
    {
        return $this->set(self::SEARCH, $value);
    }

    /**
     * Returns value of 'search' property
     *
     * @return bool
     */
    public function getSearch()
    {
        return $this->get(self::SEARCH);
    }

    /**
     * Sets value of 'repl' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setRepl($value)
    {
        return $this->set(self::REPL, $value);
    }

    /**
     * Returns value of 'repl' property
     *
     * @return int
     */
    public function getRepl()
    {
        return $this->get(self::REPL);
    }

    /**
     * Sets value of 'search_index' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setSearchIndex($value)
    {
        return $this->set(self::SEARCH_INDEX, $value);
    }

    /**
     * Returns value of 'search_index' property
     *
     * @return string
     */
    public function getSearchIndex()
    {
        return $this->get(self::SEARCH_INDEX);
    }

    /**
     * Sets value of 'datatype' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setDatatype($value)
    {
        return $this->set(self::DATATYPE, $value);
    }

    /**
     * Returns value of 'datatype' property
     *
     * @return string
     */
    public function getDatatype()
    {
        return $this->get(self::DATATYPE);
    }

    /**
     * Sets value of 'consistent' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setConsistent($value)
    {
        return $this->set(self::CONSISTENT, $value);
    }

    /**
     * Returns value of 'consistent' property
     *
     * @return bool
     */
    public function getConsistent()
    {
        return $this->get(self::CONSISTENT);
    }

    /**
     * Sets value of 'write_once' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setWriteOnce($value)
    {
        return $this->set(self::WRITE_ONCE, $value);
    }

    /**
     * Returns value of 'write_once' property
     *
     * @return bool
     */
    public function getWriteOnce()
    {
        return $this->get(self::WRITE_ONCE);
    }
}
}