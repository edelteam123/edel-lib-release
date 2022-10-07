<?php

namespace com\apiconnect\apiconnect\models\WatchList;

use \ArrayAccess;
use \com\apiconnect\ObjectSerializer;
use com\apiconnect\apiconnect\models\ModelInterface;

class UserGroupsResponseDao implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the modael.
     *
     * @var string
     */
    protected static $openAPIModelName = 'UserGroupsResponseDao';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'def_gr' => '\com\apiconnect\apiconnect\models\WatchList\UserGroupResponseObject[]',
        'usr_gr' => '\com\apiconnect\apiconnect\models\WatchList\UserGroupResponseObject[]',
        'idx_gr' => '\com\apiconnect\apiconnect\models\WatchList\UserGroupResponseObject[]',
        'usr_tbs' => '\com\apiconnect\apiconnect\models\WatchList\UserTab[]'
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     * @phpstan-var array<string, string|null>
     * @psalm-var array<string, string|null>
     */
    protected static $openAPIFormats = [
        'def_gr' => null,
        'usr_gr' => null,
        'idx_gr' => null,
        'usr_tbs' => null
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
        'def_gr' => 'defGr',
        'usr_gr' => 'usrGr',
        'idx_gr' => 'idxGr',
        'usr_tbs' => 'usrTbs'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'def_gr' => 'setDefGr',
        'usr_gr' => 'setUsrGr',
        'idx_gr' => 'setIdxGr',
        'usr_tbs' => 'setUsrTbs'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'def_gr' => 'getDefGr',
        'usr_gr' => 'getUsrGr',
        'idx_gr' => 'getIdxGr',
        'usr_tbs' => 'getUsrTbs'
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
        $this->container['def_gr'] = $data['def_gr'] ?? null;
        $this->container['usr_gr'] = $data['usr_gr'] ?? null;
        $this->container['idx_gr'] = $data['idx_gr'] ?? null;
        $this->container['usr_tbs'] = $data['usr_tbs'] ?? null;
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
     * Gets def_gr
     *
     * @return \com\apiconnect\apiconnect\models\WatchList\UserGroupResponseObject[]|null
     */
    public function getDefGr()
    {
        return $this->container['def_gr'];
    }

    /**
     * Sets def_gr
     *
     * @param \com\apiconnect\apiconnect\models\WatchList\UserGroupResponseObject[]|null $def_gr Defined groups for all users ex: My Positions,Strategies etc
     *
     * @return self
     */
    public function setDefGr($def_gr)
    {
        $this->container['def_gr'] = $def_gr;

        return $this;
    }

    /**
     * Gets usr_gr
     *
     * @return \com\apiconnect\apiconnect\models\WatchList\UserGroupResponseObject[]|null
     */
    public function getUsrGr()
    {
        return $this->container['usr_gr'];
    }

    /**
     * Sets usr_gr
     *
     * @param \com\apiconnect\apiconnect\models\WatchList\UserGroupResponseObject[]|null $usr_gr List of User Defined Groups
     *
     * @return self
     */
    public function setUsrGr($usr_gr)
    {
        $this->container['usr_gr'] = $usr_gr;

        return $this;
    }

    /**
     * Gets idx_gr
     *
     * @return \com\apiconnect\apiconnect\models\WatchList\UserGroupResponseObject[]|null
     */
    public function getIdxGr()
    {
        return $this->container['idx_gr'];
    }

    /**
     * Sets idx_gr
     *
     * @param \com\apiconnect\apiconnect\models\WatchList\UserGroupResponseObject[]|null $idx_gr List of Indices Groups
     *
     * @return self
     */
    public function setIdxGr($idx_gr)
    {
        $this->container['idx_gr'] = $idx_gr;

        return $this;
    }

    /**
     * Gets usr_tbs
     *
     * @return \com\apiconnect\apiconnect\models\WatchList\UserTab[]|null
     */
    public function getUsrTbs()
    {
        return $this->container['usr_tbs'];
    }

    /**
     * Sets usr_tbs
     *
     * @param \com\apiconnect\apiconnect\models\WatchList\UserTab[]|null $usr_tbs List of User Tabs
     *
     * @return self
     */
    public function setUsrTbs($usr_tbs)
    {
        $this->container['usr_tbs'] = $usr_tbs;

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
