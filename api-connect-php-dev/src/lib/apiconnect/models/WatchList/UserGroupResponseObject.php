<?php

namespace com\apiconnect\apiconnect\models\WatchList;

use \ArrayAccess;
use \com\apiconnect\ObjectSerializer;
use com\apiconnect\apiconnect\models\ModelInterface;

class UserGroupResponseObject implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'UserGroupResponseObject';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'gr_id' => 'string',
        'gr_name' => 'string',
        'gr_value' => 'string',
        'edit' => 'string',
        'updated_on' => 'int'
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     * @phpstan-var array<string, string|null>
     * @psalm-var array<string, string|null>
     */
    protected static $openAPIFormats = [
        'gr_id' => null,
        'gr_name' => null,
        'gr_value' => null,
        'edit' => null,
        'updated_on' => 'int64'
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
        'gr_id' => 'grID',
        'gr_name' => 'grName',
        'gr_value' => 'grValue',
        'edit' => 'edit',
        'updated_on' => 'updatedOn'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'gr_id' => 'setGrId',
        'gr_name' => 'setGrName',
        'gr_value' => 'setGrValue',
        'edit' => 'setEdit',
        'updated_on' => 'setUpdatedOn'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'gr_id' => 'getGrId',
        'gr_name' => 'getGrName',
        'gr_value' => 'getGrValue',
        'edit' => 'getEdit',
        'updated_on' => 'getUpdatedOn'
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
        $this->container['gr_id'] = $data['gr_id'] ?? null;
        $this->container['gr_name'] = $data['gr_name'] ?? null;
        $this->container['gr_value'] = $data['gr_value'] ?? null;
        $this->container['edit'] = $data['edit'] ?? null;
        $this->container['updated_on'] = $data['updated_on'] ?? null;
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
     * Gets gr_id
     *
     * @return string|null
     */
    public function getGrId()
    {
        return $this->container['gr_id'];
    }

    /**
     * Sets gr_id
     *
     * @param string|null $gr_id gr_id
     *
     * @return self
     */
    public function setGrId($gr_id)
    {
        $this->container['gr_id'] = $gr_id;

        return $this;
    }

    /**
     * Gets gr_name
     *
     * @return string|null
     */
    public function getGrName()
    {
        return $this->container['gr_name'];
    }

    /**
     * Sets gr_name
     *
     * @param string|null $gr_name gr_name
     *
     * @return self
     */
    public function setGrName($gr_name)
    {
        $this->container['gr_name'] = $gr_name;

        return $this;
    }

    /**
     * Gets gr_value
     *
     * @return string|null
     */
    public function getGrValue()
    {
        return $this->container['gr_value'];
    }

    /**
     * Sets gr_value
     *
     * @param string|null $gr_value gr_value
     *
     * @return self
     */
    public function setGrValue($gr_value)
    {
        $this->container['gr_value'] = $gr_value;

        return $this;
    }

    /**
     * Gets edit
     *
     * @return string|null
     */
    public function getEdit()
    {
        return $this->container['edit'];
    }

    /**
     * Sets edit
     *
     * @param string|null $edit edit
     *
     * @return self
     */
    public function setEdit($edit)
    {
        $this->container['edit'] = $edit;

        return $this;
    }

    /**
     * Gets updated_on
     *
     * @return int|null
     */
    public function getUpdatedOn()
    {
        return $this->container['updated_on'];
    }

    /**
     * Sets updated_on
     *
     * @param int|null $updated_on updated_on
     *
     * @return self
     */
    public function setUpdatedOn($updated_on)
    {
        $this->container['updated_on'] = $updated_on;

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
