<?php

namespace com\apiconnect\apiconnect\models\LiveNews;

use \ArrayAccess;
use \com\apiconnect\ObjectSerializer;
use com\apiconnect\apiconnect\models\ModelInterface;

class SingleSymItem implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'SingleSymItem';

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
        'symbol' => 'string',
        'has_more_news_items' => 'bool',
        'news_items' => '\com\apiconnect\apiconnect\models\LiveNews\SingleResultsItem[]'
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
        'symbol' => null,
        'has_more_news_items' => null,
        'news_items' => null
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
        'symbol' => 'symbol',
        'has_more_news_items' => 'hasMoreNewsItems',
        'news_items' => 'newsItems'
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
        'symbol' => 'setSymbol',
        'has_more_news_items' => 'setHasMoreNewsItems',
        'news_items' => 'setNewsItems'
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
        'symbol' => 'getSymbol',
        'has_more_news_items' => 'getHasMoreNewsItems',
        'news_items' => 'getNewsItems'
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
        $this->container['symbol'] = $data['symbol'] ?? null;
        $this->container['has_more_news_items'] = $data['has_more_news_items'] ?? false;
        $this->container['news_items'] = $data['news_items'] ?? null;
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
     * Gets symbol
     *
     * @return string|null
     */
    public function getSymbol()
    {
        return $this->container['symbol'];
    }

    /**
     * Sets symbol
     *
     * @param string|null $symbol symbol
     *
     * @return self
     */
    public function setSymbol($symbol)
    {
        $this->container['symbol'] = $symbol;

        return $this;
    }

    /**
     * Gets has_more_news_items
     *
     * @return bool|null
     */
    public function getHasMoreNewsItems()
    {
        return $this->container['has_more_news_items'];
    }

    /**
     * Sets has_more_news_items
     *
     * @param bool|null $has_more_news_items has_more_news_items
     *
     * @return self
     */
    public function setHasMoreNewsItems($has_more_news_items)
    {
        $this->container['has_more_news_items'] = $has_more_news_items;

        return $this;
    }

    /**
     * Gets news_items
     *
     * @return \com\apiconnect\apiconnect\models\LiveNews\SingleResultsItem[]|null
     */
    public function getNewsItems()
    {
        return $this->container['news_items'];
    }

    /**
     * Sets news_items
     *
     * @param \com\apiconnect\apiconnect\models\LiveNews\SingleResultsItem[]|null $news_items news_items
     *
     * @return self
     */
    public function setNewsItems($news_items)
    {
        $this->container['news_items'] = $news_items;

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
