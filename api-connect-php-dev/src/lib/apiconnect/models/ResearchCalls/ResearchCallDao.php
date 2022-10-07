<?php

namespace com\apiconnect\apiconnect\models\ResearchCalls;

use \ArrayAccess;
use \com\apiconnect\ObjectSerializer;
use com\apiconnect\apiconnect\models\ModelInterface;

class ResearchCallDao implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'ResearchCallDao';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'rs_call_id' => 'string',
        'un_rl_gl' => 'string',
        'rl_gl' => 'string',
        'exp_rt' => 'string',
        'rt' => 'string',
        'act_rt' => 'string',
        'sts' => 'string',
        'tgt_prc1' => 'string',
        'tgt_prc2' => 'string',
        'entry_prc' => 'string',
        'exit_prc' => 'string',
        'sl_prc' => 'string',
        'up_dt' => 'string',
        'st_dt' => 'string',
        'cl_dt' => 'string',
        'rc_typ' => 'string',
        'cmp' => 'string',
        'active' => 'bool',
        'act' => '\com\apiconnect\apiconnect\models\ResearchCalls\ResearchCallActionDao',
        'term' => 'string',
        'stk_lst' => '\com\apiconnect\apiconnect\models\ResearchCalls\ResearchCallQuoteObject[]',
        'pair_trd' => 'bool',
        'cap' => 'string'
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     * @phpstan-var array<string, string|null>
     * @psalm-var array<string, string|null>
     */
    protected static $openAPIFormats = [
        'rs_call_id' => null,
        'un_rl_gl' => null,
        'rl_gl' => null,
        'exp_rt' => null,
        'rt' => null,
        'act_rt' => null,
        'sts' => null,
        'tgt_prc1' => null,
        'tgt_prc2' => null,
        'entry_prc' => null,
        'exit_prc' => null,
        'sl_prc' => null,
        'up_dt' => null,
        'st_dt' => null,
        'cl_dt' => null,
        'rc_typ' => null,
        'cmp' => null,
        'active' => null,
        'act' => null,
        'term' => null,
        'stk_lst' => null,
        'pair_trd' => null,
        'cap' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'rs_call_id' => 'rsCallId',
        'un_rl_gl' => 'unRlGL',
        'rl_gl' => 'rlGL',
        'exp_rt' => 'expRt',
        'rt' => 'rt',
        'act_rt' => 'actRt',
        'sts' => 'sts',
        'tgt_prc1' => 'tgtPrc1',
        'tgt_prc2' => 'tgtPrc2',
        'entry_prc' => 'entryPrc',
        'exit_prc' => 'exitPrc',
        'sl_prc' => 'slPrc',
        'up_dt' => 'upDt',
        'st_dt' => 'stDt',
        'cl_dt' => 'clDt',
        'rc_typ' => 'rcTyp',
        'cmp' => 'cmp',
        'active' => 'active',
        'act' => 'act',
        'term' => 'term',
        'stk_lst' => 'stkLst',
        'pair_trd' => 'pairTrd',
        'cap' => 'cap'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'rs_call_id' => 'setRsCallId',
        'un_rl_gl' => 'setUnRlGl',
        'rl_gl' => 'setRlGl',
        'exp_rt' => 'setExpRt',
        'rt' => 'setRt',
        'act_rt' => 'setActRt',
        'sts' => 'setSts',
        'tgt_prc1' => 'setTgtPrc1',
        'tgt_prc2' => 'setTgtPrc2',
        'entry_prc' => 'setEntryPrc',
        'exit_prc' => 'setExitPrc',
        'sl_prc' => 'setSlPrc',
        'up_dt' => 'setUpDt',
        'st_dt' => 'setStDt',
        'cl_dt' => 'setClDt',
        'rc_typ' => 'setRcTyp',
        'cmp' => 'setCmp',
        'active' => 'setActive',
        'act' => 'setAct',
        'term' => 'setTerm',
        'stk_lst' => 'setStkLst',
        'pair_trd' => 'setPairTrd',
        'cap' => 'setCap'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'rs_call_id' => 'getRsCallId',
        'un_rl_gl' => 'getUnRlGl',
        'rl_gl' => 'getRlGl',
        'exp_rt' => 'getExpRt',
        'rt' => 'getRt',
        'act_rt' => 'getActRt',
        'sts' => 'getSts',
        'tgt_prc1' => 'getTgtPrc1',
        'tgt_prc2' => 'getTgtPrc2',
        'entry_prc' => 'getEntryPrc',
        'exit_prc' => 'getExitPrc',
        'sl_prc' => 'getSlPrc',
        'up_dt' => 'getUpDt',
        'st_dt' => 'getStDt',
        'cl_dt' => 'getClDt',
        'rc_typ' => 'getRcTyp',
        'cmp' => 'getCmp',
        'active' => 'getActive',
        'act' => 'getAct',
        'term' => 'getTerm',
        'stk_lst' => 'getStkLst',
        'pair_trd' => 'getPairTrd',
        'cap' => 'getCap'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }


    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['rs_call_id'] = $data['rs_call_id'] ?? null;
        $this->container['un_rl_gl'] = $data['un_rl_gl'] ?? null;
        $this->container['rl_gl'] = $data['rl_gl'] ?? null;
        $this->container['exp_rt'] = $data['exp_rt'] ?? null;
        $this->container['rt'] = $data['rt'] ?? null;
        $this->container['act_rt'] = $data['act_rt'] ?? null;
        $this->container['sts'] = $data['sts'] ?? null;
        $this->container['tgt_prc1'] = $data['tgt_prc1'] ?? null;
        $this->container['tgt_prc2'] = $data['tgt_prc2'] ?? null;
        $this->container['entry_prc'] = $data['entry_prc'] ?? null;
        $this->container['exit_prc'] = $data['exit_prc'] ?? null;
        $this->container['sl_prc'] = $data['sl_prc'] ?? null;
        $this->container['up_dt'] = $data['up_dt'] ?? null;
        $this->container['st_dt'] = $data['st_dt'] ?? null;
        $this->container['cl_dt'] = $data['cl_dt'] ?? null;
        $this->container['rc_typ'] = $data['rc_typ'] ?? null;
        $this->container['cmp'] = $data['cmp'] ?? null;
        $this->container['active'] = $data['active'] ?? false;
        $this->container['act'] = $data['act'] ?? null;
        $this->container['term'] = $data['term'] ?? null;
        $this->container['stk_lst'] = $data['stk_lst'] ?? null;
        $this->container['pair_trd'] = $data['pair_trd'] ?? false;
        $this->container['cap'] = $data['cap'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets rs_call_id
     *
     * @return string|null
     */
    public function getRsCallId()
    {
        return $this->container['rs_call_id'];
    }

    /**
     * Sets rs_call_id
     *
     * @param string|null $rs_call_id Research call unique identifier for detail call
     *
     * @return self
     */
    public function setRsCallId($rs_call_id)
    {
        $this->container['rs_call_id'] = $rs_call_id;

        return $this;
    }

    /**
     * Gets un_rl_gl
     *
     * @return string|null
     */
    public function getUnRlGl()
    {
        return $this->container['un_rl_gl'];
    }

    /**
     * Sets un_rl_gl
     *
     * @param string|null $un_rl_gl Unrealized gain on
     *
     * @return self
     */
    public function setUnRlGl($un_rl_gl)
    {
        $this->container['un_rl_gl'] = $un_rl_gl;

        return $this;
    }

    /**
     * Gets rl_gl
     *
     * @return string|null
     */
    public function getRlGl()
    {
        return $this->container['rl_gl'];
    }

    /**
     * Sets rl_gl
     *
     * @param string|null $rl_gl Realized gain or loss for closed calls
     *
     * @return self
     */
    public function setRlGl($rl_gl)
    {
        $this->container['rl_gl'] = $rl_gl;

        return $this;
    }

    /**
     * Gets exp_rt
     *
     * @return string|null
     */
    public function getExpRt()
    {
        return $this->container['exp_rt'];
    }

    /**
     * Sets exp_rt
     *
     * @param string|null $exp_rt Expected returns from research call
     *
     * @return self
     */
    public function setExpRt($exp_rt)
    {
        $this->container['exp_rt'] = $exp_rt;

        return $this;
    }

    /**
     * Gets rt
     *
     * @return string|null
     */
    public function getRt()
    {
        return $this->container['rt'];
    }

    /**
     * Sets rt
     *
     * @param string|null $rt Returns from research call
     *
     * @return self
     */
    public function setRt($rt)
    {
        $this->container['rt'] = $rt;

        return $this;
    }

    /**
     * Gets act_rt
     *
     * @return string|null
     */
    public function getActRt()
    {
        return $this->container['act_rt'];
    }

    /**
     * Sets act_rt
     *
     * @param string|null $act_rt Actual returns from research call for closed calls
     *
     * @return self
     */
    public function setActRt($act_rt)
    {
        $this->container['act_rt'] = $act_rt;

        return $this;
    }

    /**
     * Gets sts
     *
     * @return string|null
     */
    public function getSts()
    {
        return $this->container['sts'];
    }

    /**
     * Sets sts
     *
     * @param string|null $sts Status of current research call
     *
     * @return self
     */
    public function setSts($sts)
    {
        $this->container['sts'] = $sts;

        return $this;
    }

    /**
     * Gets tgt_prc1
     *
     * @return string|null
     */
    public function getTgtPrc1()
    {
        return $this->container['tgt_prc1'];
    }

    /**
     * Sets tgt_prc1
     *
     * @param string|null $tgt_prc1 Target price / ratio 1
     *
     * @return self
     */
    public function setTgtPrc1($tgt_prc1)
    {
        $this->container['tgt_prc1'] = $tgt_prc1;

        return $this;
    }

    /**
     * Gets tgt_prc2
     *
     * @return string|null
     */
    public function getTgtPrc2()
    {
        return $this->container['tgt_prc2'];
    }

    /**
     * Sets tgt_prc2
     *
     * @param string|null $tgt_prc2 Target price / ratio 2
     *
     * @return self
     */
    public function setTgtPrc2($tgt_prc2)
    {
        $this->container['tgt_prc2'] = $tgt_prc2;

        return $this;
    }

    /**
     * Gets entry_prc
     *
     * @return string|null
     */
    public function getEntryPrc()
    {
        return $this->container['entry_prc'];
    }

    /**
     * Sets entry_prc
     *
     * @param string|null $entry_prc Entry price / ratio for the research call
     *
     * @return self
     */
    public function setEntryPrc($entry_prc)
    {
        $this->container['entry_prc'] = $entry_prc;

        return $this;
    }

    /**
     * Gets exit_prc
     *
     * @return string|null
     */
    public function getExitPrc()
    {
        return $this->container['exit_prc'];
    }

    /**
     * Sets exit_prc
     *
     * @param string|null $exit_prc Exit price
     *
     * @return self
     */
    public function setExitPrc($exit_prc)
    {
        $this->container['exit_prc'] = $exit_prc;

        return $this;
    }

    /**
     * Gets sl_prc
     *
     * @return string|null
     */
    public function getSlPrc()
    {
        return $this->container['sl_prc'];
    }

    /**
     * Sets sl_prc
     *
     * @param string|null $sl_prc Stop Loss price / ratio for the research call
     *
     * @return self
     */
    public function setSlPrc($sl_prc)
    {
        $this->container['sl_prc'] = $sl_prc;

        return $this;
    }

    /**
     * Gets up_dt
     *
     * @return string|null
     */
    public function getUpDt()
    {
        return $this->container['up_dt'];
    }

    /**
     * Sets up_dt
     *
     * @param string|null $up_dt Last updated on
     *
     * @return self
     */
    public function setUpDt($up_dt)
    {
        $this->container['up_dt'] = $up_dt;

        return $this;
    }

    /**
     * Gets st_dt
     *
     * @return string|null
     */
    public function getStDt()
    {
        return $this->container['st_dt'];
    }

    /**
     * Sets st_dt
     *
     * @param string|null $st_dt Recommended on
     *
     * @return self
     */
    public function setStDt($st_dt)
    {
        $this->container['st_dt'] = $st_dt;

        return $this;
    }

    /**
     * Gets cl_dt
     *
     * @return string|null
     */
    public function getClDt()
    {
        return $this->container['cl_dt'];
    }

    /**
     * Sets cl_dt
     *
     * @param string|null $cl_dt End date for the research call
     *
     * @return self
     */
    public function setClDt($cl_dt)
    {
        $this->container['cl_dt'] = $cl_dt;

        return $this;
    }

    /**
     * Gets rc_typ
     *
     * @return string|null
     */
    public function getRcTyp()
    {
        return $this->container['rc_typ'];
    }

    /**
     * Sets rc_typ
     *
     * @param string|null $rc_typ Recommendation type of the call, this will be used for displaying recommendation source
     *
     * @return self
     */
    public function setRcTyp($rc_typ)
    {
        $this->container['rc_typ'] = $rc_typ;

        return $this;
    }

    /**
     * Gets cmp
     *
     * @return string|null
     */
    public function getCmp()
    {
        return $this->container['cmp'];
    }

    /**
     * Sets cmp
     *
     * @param string|null $cmp Current Market Price for normal stock and Current Spread for pair stock
     *
     * @return self
     */
    public function setCmp($cmp)
    {
        $this->container['cmp'] = $cmp;

        return $this;
    }

    /**
     * Gets active
     *
     * @return bool|null
     */
    public function getActive()
    {
        return $this->container['active'];
    }

    /**
     * Sets active
     *
     * @param bool|null $active Active Status
     *
     * @return self
     */
    public function setActive($active)
    {
        $this->container['active'] = $active;

        return $this;
    }

    /**
     * Gets act
     *
     * @return \OpenAPI\Client\Model\ResearchCallActionDao|null
     */
    public function getAct()
    {
        return $this->container['act'];
    }

    /**
     * Sets act
     *
     * @param \OpenAPI\Client\Model\ResearchCallActionDao|null $act act
     *
     * @return self
     */
    public function setAct($act)
    {
        $this->container['act'] = $act;

        return $this;
    }

    /**
     * Gets term
     *
     * @return string|null
     */
    public function getTerm()
    {
        return $this->container['term'];
    }

    /**
     * Sets term
     *
     * @param string|null $term Term : SHORTTERM, MIDTERM, LONGTERM
     *
     * @return self
     */
    public function setTerm($term)
    {
        $this->container['term'] = $term;

        return $this;
    }

    /**
     * Gets stk_lst
     *
     * @return \OpenAPI\Client\Model\ResearchCallQuoteObject[]|null
     */
    public function getStkLst()
    {
        return $this->container['stk_lst'];
    }

    /**
     * Sets stk_lst
     *
     * @param \OpenAPI\Client\Model\ResearchCallQuoteObject[]|null $stk_lst stk_lst
     *
     * @return self
     */
    public function setStkLst($stk_lst)
    {
        $this->container['stk_lst'] = $stk_lst;

        return $this;
    }

    /**
     * Gets pair_trd
     *
     * @return bool|null
     */
    public function getPairTrd()
    {
        return $this->container['pair_trd'];
    }

    /**
     * Sets pair_trd
     *
     * @param bool|null $pair_trd pair_trd
     *
     * @return self
     */
    public function setPairTrd($pair_trd)
    {
        $this->container['pair_trd'] = $pair_trd;

        return $this;
    }

    /**
     * Gets cap
     *
     * @return string|null
     */
    public function getCap()
    {
        return $this->container['cap'];
    }

    /**
     * Sets cap
     *
     * @param string|null $cap Cap : Small, Medium, Large
     *
     * @return self
     */
    public function setCap($cap)
    {
        $this->container['cap'] = $cap;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    public function jsonSerialize()
    {
        return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
