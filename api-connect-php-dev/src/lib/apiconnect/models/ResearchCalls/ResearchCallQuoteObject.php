<?php

namespace com\apiconnect\apiconnect\models\ResearchCalls;

use \ArrayAccess;
use \com\apiconnect\ObjectSerializer;
use com\apiconnect\apiconnect\models\ModelInterface;

class ResearchCallQuoteObject implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'ResearchCallQuoteObject';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'sym' => 'string',
        'ltp' => 'string',
        'ltt' => 'string',
        'chg' => 'string',
        'chg_p' => 'string',
        'exc' => 'string',
        'vol' => 'string',
        'dp_name' => 'string',
        'trd_sym' => 'string',
        'as_typ' => 'string',
        'lt_sz' => 'string',
        'tk_sz' => 'string',
        'dp_ins_typ' => 'string',
        'desc' => 'string',
        'dp_val' => 'string',
        'stk_prc' => 'string',
        'op_typ' => 'string',
        'exp' => 'string',
        'dp_exp_dt' => 'string',
        'op_int' => 'string',
        'op_int_chg' => 'string',
        'op_int_chg_p' => 'string',
        'spot' => 'string',
        'rl_ovr_p' => 'string',
        'rl_c_abs' => 'string',
        'by_sl_typ' => 'string',
        'sym_exp' => 'bool',
        'as_sym' => '\com\apiconnect\apiconnect\models\ResearchCalls\ResearchCallQuoteObject'
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     * @phpstan-var array<string, string|null>
     * @psalm-var array<string, string|null>
     */
    protected static $openAPIFormats = [
        'sym' => null,
        'ltp' => null,
        'ltt' => null,
        'chg' => null,
        'chg_p' => null,
        'exc' => null,
        'vol' => null,
        'dp_name' => null,
        'trd_sym' => null,
        'as_typ' => null,
        'lt_sz' => null,
        'tk_sz' => null,
        'dp_ins_typ' => null,
        'desc' => null,
        'dp_val' => null,
        'stk_prc' => null,
        'op_typ' => null,
        'exp' => null,
        'dp_exp_dt' => null,
        'op_int' => null,
        'op_int_chg' => null,
        'op_int_chg_p' => null,
        'spot' => null,
        'rl_ovr_p' => null,
        'rl_c_abs' => null,
        'by_sl_typ' => null,
        'sym_exp' => null,
        'as_sym' => null
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
        'sym' => 'sym',
        'ltp' => 'ltp',
        'ltt' => 'ltt',
        'chg' => 'chg',
        'chg_p' => 'chgP',
        'exc' => 'exc',
        'vol' => 'vol',
        'dp_name' => 'dpName',
        'trd_sym' => 'trdSym',
        'as_typ' => 'asTyp',
        'lt_sz' => 'ltSz',
        'tk_sz' => 'tkSz',
        'dp_ins_typ' => 'dpInsTyp',
        'desc' => 'desc',
        'dp_val' => 'dpVal',
        'stk_prc' => 'stkPrc',
        'op_typ' => 'opTyp',
        'exp' => 'exp',
        'dp_exp_dt' => 'dpExpDt',
        'op_int' => 'opInt',
        'op_int_chg' => 'opIntChg',
        'op_int_chg_p' => 'opIntChgP',
        'spot' => 'spot',
        'rl_ovr_p' => 'rlOvrP',
        'rl_c_abs' => 'rlCAbs',
        'by_sl_typ' => 'bySlTyp',
        'sym_exp' => 'symExp',
        'as_sym' => 'asSym'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'sym' => 'setSym',
        'ltp' => 'setLtp',
        'ltt' => 'setLtt',
        'chg' => 'setChg',
        'chg_p' => 'setChgP',
        'exc' => 'setExc',
        'vol' => 'setVol',
        'dp_name' => 'setDpName',
        'trd_sym' => 'setTrdSym',
        'as_typ' => 'setAsTyp',
        'lt_sz' => 'setLtSz',
        'tk_sz' => 'setTkSz',
        'dp_ins_typ' => 'setDpInsTyp',
        'desc' => 'setDesc',
        'dp_val' => 'setDpVal',
        'stk_prc' => 'setStkPrc',
        'op_typ' => 'setOpTyp',
        'exp' => 'setExp',
        'dp_exp_dt' => 'setDpExpDt',
        'op_int' => 'setOpInt',
        'op_int_chg' => 'setOpIntChg',
        'op_int_chg_p' => 'setOpIntChgP',
        'spot' => 'setSpot',
        'rl_ovr_p' => 'setRlOvrP',
        'rl_c_abs' => 'setRlCAbs',
        'by_sl_typ' => 'setBySlTyp',
        'sym_exp' => 'setSymExp',
        'as_sym' => 'setAsSym'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'sym' => 'getSym',
        'ltp' => 'getLtp',
        'ltt' => 'getLtt',
        'chg' => 'getChg',
        'chg_p' => 'getChgP',
        'exc' => 'getExc',
        'vol' => 'getVol',
        'dp_name' => 'getDpName',
        'trd_sym' => 'getTrdSym',
        'as_typ' => 'getAsTyp',
        'lt_sz' => 'getLtSz',
        'tk_sz' => 'getTkSz',
        'dp_ins_typ' => 'getDpInsTyp',
        'desc' => 'getDesc',
        'dp_val' => 'getDpVal',
        'stk_prc' => 'getStkPrc',
        'op_typ' => 'getOpTyp',
        'exp' => 'getExp',
        'dp_exp_dt' => 'getDpExpDt',
        'op_int' => 'getOpInt',
        'op_int_chg' => 'getOpIntChg',
        'op_int_chg_p' => 'getOpIntChgP',
        'spot' => 'getSpot',
        'rl_ovr_p' => 'getRlOvrP',
        'rl_c_abs' => 'getRlCAbs',
        'by_sl_typ' => 'getBySlTyp',
        'sym_exp' => 'getSymExp',
        'as_sym' => 'getAsSym'
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
        $this->container['sym'] = $data['sym'] ?? null;
        $this->container['ltp'] = $data['ltp'] ?? null;
        $this->container['ltt'] = $data['ltt'] ?? null;
        $this->container['chg'] = $data['chg'] ?? null;
        $this->container['chg_p'] = $data['chg_p'] ?? null;
        $this->container['exc'] = $data['exc'] ?? null;
        $this->container['vol'] = $data['vol'] ?? null;
        $this->container['dp_name'] = $data['dp_name'] ?? null;
        $this->container['trd_sym'] = $data['trd_sym'] ?? null;
        $this->container['as_typ'] = $data['as_typ'] ?? null;
        $this->container['lt_sz'] = $data['lt_sz'] ?? null;
        $this->container['tk_sz'] = $data['tk_sz'] ?? null;
        $this->container['dp_ins_typ'] = $data['dp_ins_typ'] ?? null;
        $this->container['desc'] = $data['desc'] ?? null;
        $this->container['dp_val'] = $data['dp_val'] ?? null;
        $this->container['stk_prc'] = $data['stk_prc'] ?? null;
        $this->container['op_typ'] = $data['op_typ'] ?? null;
        $this->container['exp'] = $data['exp'] ?? null;
        $this->container['dp_exp_dt'] = $data['dp_exp_dt'] ?? null;
        $this->container['op_int'] = $data['op_int'] ?? null;
        $this->container['op_int_chg'] = $data['op_int_chg'] ?? null;
        $this->container['op_int_chg_p'] = $data['op_int_chg_p'] ?? null;
        $this->container['spot'] = $data['spot'] ?? null;
        $this->container['rl_ovr_p'] = $data['rl_ovr_p'] ?? null;
        $this->container['rl_c_abs'] = $data['rl_c_abs'] ?? null;
        $this->container['by_sl_typ'] = $data['by_sl_typ'] ?? null;
        $this->container['sym_exp'] = $data['sym_exp'] ?? false;
        $this->container['as_sym'] = $data['as_sym'] ?? null;
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
     * Gets sym
     *
     * @return string|null
     */
    public function getSym()
    {
        return $this->container['sym'];
    }

    /**
     * Sets sym
     *
     * @param string|null $sym sym
     *
     * @return self
     */
    public function setSym($sym)
    {
        $this->container['sym'] = $sym;

        return $this;
    }

    /**
     * Gets ltp
     *
     * @return string|null
     */
    public function getLtp()
    {
        return $this->container['ltp'];
    }

    /**
     * Sets ltp
     *
     * @param string|null $ltp ltp
     *
     * @return self
     */
    public function setLtp($ltp)
    {
        $this->container['ltp'] = $ltp;

        return $this;
    }

    /**
     * Gets ltt
     *
     * @return string|null
     */
    public function getLtt()
    {
        return $this->container['ltt'];
    }

    /**
     * Sets ltt
     *
     * @param string|null $ltt ltt
     *
     * @return self
     */
    public function setLtt($ltt)
    {
        $this->container['ltt'] = $ltt;

        return $this;
    }

    /**
     * Gets chg
     *
     * @return string|null
     */
    public function getChg()
    {
        return $this->container['chg'];
    }

    /**
     * Sets chg
     *
     * @param string|null $chg chg
     *
     * @return self
     */
    public function setChg($chg)
    {
        $this->container['chg'] = $chg;

        return $this;
    }

    /**
     * Gets chg_p
     *
     * @return string|null
     */
    public function getChgP()
    {
        return $this->container['chg_p'];
    }

    /**
     * Sets chg_p
     *
     * @param string|null $chg_p chg_p
     *
     * @return self
     */
    public function setChgP($chg_p)
    {
        $this->container['chg_p'] = $chg_p;

        return $this;
    }

    /**
     * Gets exc
     *
     * @return string|null
     */
    public function getExc()
    {
        return $this->container['exc'];
    }

    /**
     * Sets exc
     *
     * @param string|null $exc exc
     *
     * @return self
     */
    public function setExc($exc)
    {
        $this->container['exc'] = $exc;

        return $this;
    }

    /**
     * Gets vol
     *
     * @return string|null
     */
    public function getVol()
    {
        return $this->container['vol'];
    }

    /**
     * Sets vol
     *
     * @param string|null $vol vol
     *
     * @return self
     */
    public function setVol($vol)
    {
        $this->container['vol'] = $vol;

        return $this;
    }

    /**
     * Gets dp_name
     *
     * @return string|null
     */
    public function getDpName()
    {
        return $this->container['dp_name'];
    }

    /**
     * Sets dp_name
     *
     * @param string|null $dp_name dp_name
     *
     * @return self
     */
    public function setDpName($dp_name)
    {
        $this->container['dp_name'] = $dp_name;

        return $this;
    }

    /**
     * Gets trd_sym
     *
     * @return string|null
     */
    public function getTrdSym()
    {
        return $this->container['trd_sym'];
    }

    /**
     * Sets trd_sym
     *
     * @param string|null $trd_sym trd_sym
     *
     * @return self
     */
    public function setTrdSym($trd_sym)
    {
        $this->container['trd_sym'] = $trd_sym;

        return $this;
    }

    /**
     * Gets as_typ
     *
     * @return string|null
     */
    public function getAsTyp()
    {
        return $this->container['as_typ'];
    }

    /**
     * Sets as_typ
     *
     * @param string|null $as_typ as_typ
     *
     * @return self
     */
    public function setAsTyp($as_typ)
    {
        $this->container['as_typ'] = $as_typ;

        return $this;
    }

    /**
     * Gets lt_sz
     *
     * @return string|null
     */
    public function getLtSz()
    {
        return $this->container['lt_sz'];
    }

    /**
     * Sets lt_sz
     *
     * @param string|null $lt_sz lt_sz
     *
     * @return self
     */
    public function setLtSz($lt_sz)
    {
        $this->container['lt_sz'] = $lt_sz;

        return $this;
    }

    /**
     * Gets tk_sz
     *
     * @return string|null
     */
    public function getTkSz()
    {
        return $this->container['tk_sz'];
    }

    /**
     * Sets tk_sz
     *
     * @param string|null $tk_sz tk_sz
     *
     * @return self
     */
    public function setTkSz($tk_sz)
    {
        $this->container['tk_sz'] = $tk_sz;

        return $this;
    }

    /**
     * Gets dp_ins_typ
     *
     * @return string|null
     */
    public function getDpInsTyp()
    {
        return $this->container['dp_ins_typ'];
    }

    /**
     * Sets dp_ins_typ
     *
     * @param string|null $dp_ins_typ dp_ins_typ
     *
     * @return self
     */
    public function setDpInsTyp($dp_ins_typ)
    {
        $this->container['dp_ins_typ'] = $dp_ins_typ;

        return $this;
    }

    /**
     * Gets desc
     *
     * @return string|null
     */
    public function getDesc()
    {
        return $this->container['desc'];
    }

    /**
     * Sets desc
     *
     * @param string|null $desc desc
     *
     * @return self
     */
    public function setDesc($desc)
    {
        $this->container['desc'] = $desc;

        return $this;
    }

    /**
     * Gets dp_val
     *
     * @return string|null
     */
    public function getDpVal()
    {
        return $this->container['dp_val'];
    }

    /**
     * Sets dp_val
     *
     * @param string|null $dp_val dp_val
     *
     * @return self
     */
    public function setDpVal($dp_val)
    {
        $this->container['dp_val'] = $dp_val;

        return $this;
    }

    /**
     * Gets stk_prc
     *
     * @return string|null
     */
    public function getStkPrc()
    {
        return $this->container['stk_prc'];
    }

    /**
     * Sets stk_prc
     *
     * @param string|null $stk_prc stk_prc
     *
     * @return self
     */
    public function setStkPrc($stk_prc)
    {
        $this->container['stk_prc'] = $stk_prc;

        return $this;
    }

    /**
     * Gets op_typ
     *
     * @return string|null
     */
    public function getOpTyp()
    {
        return $this->container['op_typ'];
    }

    /**
     * Sets op_typ
     *
     * @param string|null $op_typ op_typ
     *
     * @return self
     */
    public function setOpTyp($op_typ)
    {
        $this->container['op_typ'] = $op_typ;

        return $this;
    }

    /**
     * Gets exp
     *
     * @return string|null
     */
    public function getExp()
    {
        return $this->container['exp'];
    }

    /**
     * Sets exp
     *
     * @param string|null $exp exp
     *
     * @return self
     */
    public function setExp($exp)
    {
        $this->container['exp'] = $exp;

        return $this;
    }

    /**
     * Gets dp_exp_dt
     *
     * @return string|null
     */
    public function getDpExpDt()
    {
        return $this->container['dp_exp_dt'];
    }

    /**
     * Sets dp_exp_dt
     *
     * @param string|null $dp_exp_dt dp_exp_dt
     *
     * @return self
     */
    public function setDpExpDt($dp_exp_dt)
    {
        $this->container['dp_exp_dt'] = $dp_exp_dt;

        return $this;
    }

    /**
     * Gets op_int
     *
     * @return string|null
     */
    public function getOpInt()
    {
        return $this->container['op_int'];
    }

    /**
     * Sets op_int
     *
     * @param string|null $op_int op_int
     *
     * @return self
     */
    public function setOpInt($op_int)
    {
        $this->container['op_int'] = $op_int;

        return $this;
    }

    /**
     * Gets op_int_chg
     *
     * @return string|null
     */
    public function getOpIntChg()
    {
        return $this->container['op_int_chg'];
    }

    /**
     * Sets op_int_chg
     *
     * @param string|null $op_int_chg op_int_chg
     *
     * @return self
     */
    public function setOpIntChg($op_int_chg)
    {
        $this->container['op_int_chg'] = $op_int_chg;

        return $this;
    }

    /**
     * Gets op_int_chg_p
     *
     * @return string|null
     */
    public function getOpIntChgP()
    {
        return $this->container['op_int_chg_p'];
    }

    /**
     * Sets op_int_chg_p
     *
     * @param string|null $op_int_chg_p op_int_chg_p
     *
     * @return self
     */
    public function setOpIntChgP($op_int_chg_p)
    {
        $this->container['op_int_chg_p'] = $op_int_chg_p;

        return $this;
    }

    /**
     * Gets spot
     *
     * @return string|null
     */
    public function getSpot()
    {
        return $this->container['spot'];
    }

    /**
     * Sets spot
     *
     * @param string|null $spot spot
     *
     * @return self
     */
    public function setSpot($spot)
    {
        $this->container['spot'] = $spot;

        return $this;
    }

    /**
     * Gets rl_ovr_p
     *
     * @return string|null
     */
    public function getRlOvrP()
    {
        return $this->container['rl_ovr_p'];
    }

    /**
     * Sets rl_ovr_p
     *
     * @param string|null $rl_ovr_p rl_ovr_p
     *
     * @return self
     */
    public function setRlOvrP($rl_ovr_p)
    {
        $this->container['rl_ovr_p'] = $rl_ovr_p;

        return $this;
    }

    /**
     * Gets rl_c_abs
     *
     * @return string|null
     */
    public function getRlCAbs()
    {
        return $this->container['rl_c_abs'];
    }

    /**
     * Sets rl_c_abs
     *
     * @param string|null $rl_c_abs rl_c_abs
     *
     * @return self
     */
    public function setRlCAbs($rl_c_abs)
    {
        $this->container['rl_c_abs'] = $rl_c_abs;

        return $this;
    }

    /**
     * Gets by_sl_typ
     *
     * @return string|null
     */
    public function getBySlTyp()
    {
        return $this->container['by_sl_typ'];
    }

    /**
     * Sets by_sl_typ
     *
     * @param string|null $by_sl_typ Buy or sell type. To display button
     *
     * @return self
     */
    public function setBySlTyp($by_sl_typ)
    {
        $this->container['by_sl_typ'] = $by_sl_typ;

        return $this;
    }

    /**
     * Gets sym_exp
     *
     * @return bool|null
     */
    public function getSymExp()
    {
        return $this->container['sym_exp'];
    }

    /**
     * Sets sym_exp
     *
     * @param bool|null $sym_exp Expired Symbol Flag
     *
     * @return self
     */
    public function setSymExp($sym_exp)
    {
        $this->container['sym_exp'] = $sym_exp;

        return $this;
    }

    /**
     * Gets as_sym
     *
     * @return \OpenAPI\Client\Model\ResearchCallQuoteObject|null
     */
    public function getAsSym()
    {
        return $this->container['as_sym'];
    }

    /**
     * Sets as_sym
     *
     * @param \OpenAPI\Client\Model\ResearchCallQuoteObject|null $as_sym as_sym
     *
     * @return self
     */
    public function setAsSym($as_sym)
    {
        $this->container['as_sym'] = $as_sym;

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
