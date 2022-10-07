<?php

namespace com\apiconnect\apiconnect\models\LiveNews;

use \ArrayAccess;
use \com\apiconnect\ObjectSerializer;
use com\apiconnect\apiconnect\models\ModelInterface;;

/**
 * NewsFilterListDao Class Doc Comment
 *
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class NewsFilterListDao implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'NewsFilterListDao';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'dpNm' => 'string',
        'exc' => 'string[]',
        'inc' => 'string[]',
        'lgrq' => 'bool',
        'uiTyp' => 'string',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     * @phpstan-var array<string, string|null>
     * @psalm-var array<string, string|null>
     */
    protected static $openAPIFormats = [
        'dpNm' => null,
        'exc' => null,
        'inc' => null,
        'lgrq' => null,
        'uiTyp' => null
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
        'dpNm' => 'dpNm',
        'exc' => 'exc',
        'inc' => 'inc',
        'lgrq' => 'lgrq',
        'uiTyp' => 'uiTyp',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'dpNm' => 'setDpNm',
        'exc' => 'setExc',
        'inc' => 'setInc',
        'lgrq' => 'setLgrq',
        'uiTyp' => 'setUiTyp'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'dpNm' => 'getDpNm',
        'exc' => 'getExc',
        'inc' => 'getInc',
        'lgrq' => 'getLgrq',
        'uiTyp' => 'getUiTyp'
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
        $this->container['dpNm'] = $data['dpNm'] ?? null;
        $this->container['exc'] = $data['exc'] ?? null;
        $this->container['inc'] = $data['inc'] ?? null;
        $this->container['lgrp'] = $data['lgrp'] ?? null;
        $this->container['uiTyp'] = $data['uiTyp'] ?? null;
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
     * Gets ltt
     *
     * @return string[]|null
     */
    public function getDpNm()
    {
        return $this->container['dpNm'];
    }

    /**
     * Sets ltt
     *
     * @param string[]|null $ltt Array List of ltt values
     *
     * @return self
     */
    public function setDpNm($dpNm)
    {
        $this->container['dpNm'] = $dpNm;

        return $this;
    }

    /**
     * Gets ltt
     *
     * @return string[]|null
     */
    public function getExc()
    {
        return $this->container['exc'];
    }

    /**
     * Sets ltt
     *
     * @param string[]|null $ltt Array List of ltt values
     *
     * @return self
     */
    public function setExc($exc)
    {
        $this->container['exc'] = $exc;

        return $this;
    }

    /**
     * Gets ltt
     *
     * @return string[]|null
     */
    public function getInc()
    {
        return $this->container['inc'];
    }

    /**
     * Sets ltt
     *
     * @param string[]|null $ltt Array List of ltt values
     *
     * @return self
     */
    public function setInc($inc)
    {
        $this->container['inc'] = $inc;

        return $this;
    }

     /**
     * Gets ltt
     *
     * @return string[]|null
     */
    public function getLgrq()
    {
        return $this->container['lgrq'];
    }

    /**
     * Sets ltt
     *
     * @param string[]|null $ltt Array List of ltt values
     *
     * @return self
     */
    public function setLgrq($lgrq)
    {
        $this->container['lgrq'] = $lgrq;

        return $this;
    }

    /**
     * Gets open
     *
     * @return double[]|null
     */
    public function getUiTyp()
    {
        return $this->container['uiTyp'];
    }

    /**
     * Sets open
     *
     * @param double[]|null $open Array List of high values
     *
     * @return self
     */
    public function setUiTyp($uiTyp)
    {
        $this->container['uiTyp'] = $uiTyp;

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
