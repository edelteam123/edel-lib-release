<?php

namespace com\apiconnect\apiconnect\models;

use \ArrayAccess;
use \com\apiconnect\ObjectSerializer;

/**
 * ChartData Class Doc Comment
 *
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class ChartData implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'ChartData';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'vol' => 'int[]',
        'ltt' => 'string[]',
        'open' => 'double[]',
        'high' => 'double[]',
        'low' => 'double[]',
        'close' => 'double[]'
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     * @phpstan-var array<string, string|null>
     * @psalm-var array<string, string|null>
     */
    protected static $openAPIFormats = [
        'vol' => 'int64',
        'ltt' => null,
        'open' => 'double',
        'high' => 'double',
        'low' => 'double',
        'close' => 'double'
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
        'vol' => 'vol',
        'ltt' => 'ltt',
        'open' => 'open',
        'high' => 'high',
        'low' => 'low',
        'close' => 'close'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'vol' => 'setVol',
        'ltt' => 'setLtt',
        'open' => 'setOpen',
        'high' => 'setHigh',
        'low' => 'setLow',
        'close' => 'setClose'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'vol' => 'getVol',
        'ltt' => 'getLtt',
        'open' => 'getOpen',
        'high' => 'getHigh',
        'low' => 'getLow',
        'close' => 'getClose'
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
        $this->container['vol'] = $data['vol'] ?? null;
        $this->container['ltt'] = $data['ltt'] ?? null;
        $this->container['open'] = $data['open'] ?? null;
        $this->container['high'] = $data['high'] ?? null;
        $this->container['low'] = $data['low'] ?? null;
        $this->container['close'] = $data['close'] ?? null;
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
     * Gets vol
     *
     * @return int[]|null
     */
    public function getVol()
    {
        return $this->container['vol'];
    }

    /**
     * Sets vol
     *
     * @param int[]|null $vol Array List of volume values
     *
     * @return self
     */
    public function setVol($vol)
    {
        $this->container['vol'] = $vol;

        return $this;
    }

    /**
     * Gets ltt
     *
     * @return string[]|null
     */
    public function getLtt()
    {
        return $this->container['ltt'];
    }

    /**
     * Sets ltt
     *
     * @param string[]|null $ltt Array List of ltt values
     *
     * @return self
     */
    public function setLtt($ltt)
    {
        $this->container['ltt'] = $ltt;

        return $this;
    }

    /**
     * Gets open
     *
     * @return double[]|null
     */
    public function getOpen()
    {
        return $this->container['open'];
    }

    /**
     * Sets open
     *
     * @param double[]|null $open Array List of high values
     *
     * @return self
     */
    public function setOpen($open)
    {
        $this->container['open'] = $open;

        return $this;
    }

    /**
     * Gets high
     *
     * @return double[]|null
     */
    public function getHigh()
    {
        return $this->container['high'];
    }

    /**
     * Sets high
     *
     * @param double[]|null $high Array List of high values
     *
     * @return self
     */
    public function setHigh($high)
    {
        $this->container['high'] = $high;

        return $this;
    }

    /**
     * Gets low
     *
     * @return double[]|null
     */
    public function getLow()
    {
        return $this->container['low'];
    }

    /**
     * Sets low
     *
     * @param double[]|null $low Array List of low values
     *
     * @return self
     */
    public function setLow($low)
    {
        $this->container['low'] = $low;

        return $this;
    }

    /**
     * Gets close
     *
     * @return double[]|null
     */
    public function getClose()
    {
        return $this->container['close'];
    }

    /**
     * Sets close
     *
     * @param double[]|null $close Array List of close values
     *
     * @return self
     */
    public function setClose($close)
    {
        $this->container['close'] = $close;

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
