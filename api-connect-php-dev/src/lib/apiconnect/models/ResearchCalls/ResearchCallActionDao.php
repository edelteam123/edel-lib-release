<?php

namespace com\apiconnect\apiconnect\models\ResearchCalls;

use \ArrayAccess;
use \com\apiconnect\ObjectSerializer;
use com\apiconnect\apiconnect\models\ModelInterface;

class ResearchCallActionDao implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'ResearchCallActionDao';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'dp_act' => 'string',
        'act' => 'string',
        'sntmnt' => 'int'
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     * @phpstan-var array<string, string|null>
     * @psalm-var array<string, string|null>
     */
    protected static $openAPIFormats = [
        'dp_act' => null,
        'act' => null,
        'sntmnt' => 'int32'
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
        'dp_act' => 'dpAct',
        'act' => 'act',
        'sntmnt' => 'sntmnt'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'dp_act' => 'setDpAct',
        'act' => 'setAct',
        'sntmnt' => 'setSntmnt'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'dp_act' => 'getDpAct',
        'act' => 'getAct',
        'sntmnt' => 'getSntmnt'
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

    const DP_ACT_BOOK_PROFIT = 'Book profit';
    const DP_ACT_STOP_LOSS = 'Stop Loss';
    const DP_ACT_PART_PROFIT = 'Part Profit';
    const ACT_BOOK_PROFIT = 'BOOK_PROFIT';
    const ACT_STOP_LOSS = 'STOP_LOSS';
    const ACT_PART_PROFIT = 'PART_PROFIT';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getDpActAllowableValues()
    {
        return [
            self::DP_ACT_BOOK_PROFIT,
            self::DP_ACT_STOP_LOSS,
            self::DP_ACT_PART_PROFIT,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getActAllowableValues()
    {
        return [
            self::ACT_BOOK_PROFIT,
            self::ACT_STOP_LOSS,
            self::ACT_PART_PROFIT,
        ];
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
        $this->container['dp_act'] = $data['dp_act'] ?? null;
        $this->container['act'] = $data['act'] ?? null;
        $this->container['sntmnt'] = $data['sntmnt'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        // $allowedValues = $this->getDpActAllowableValues();
        // if (!is_null($this->container['dp_act']) && !in_array($this->container['dp_act'], $allowedValues, true)) {
        //     $invalidProperties[] = sprintf(
        //         "invalid value '%s' for 'dp_act', must be one of '%s'",
        //         $this->container['dp_act'],
        //         implode("', '", $allowedValues)
        //     );
        // }

        // $allowedValues = $this->getActAllowableValues();
        // if (!is_null($this->container['act']) && !in_array($this->container['act'], $allowedValues, true)) {
        //     $invalidProperties[] = sprintf(
        //         "invalid value '%s' for 'act', must be one of '%s'",
        //         $this->container['act'],
        //         implode("', '", $allowedValues)
        //     );
        // }

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
     * Gets dp_act
     *
     * @return string|null
     */
    public function getDpAct()
    {
        return $this->container['dp_act'];
    }

    /**
     * Sets dp_act
     *
     * @param string|null $dp_act Display Action state of research call
     *
     * @return self
     */
    public function setDpAct($dp_act)
    {
        // $allowedValues = $this->getDpActAllowableValues();
        // if (!is_null($dp_act) && !in_array($dp_act, $allowedValues, true)) {
        //     throw new \InvalidArgumentException(
        //         sprintf(
        //             "Invalid value '%s' for 'dp_act', must be one of '%s'",
        //             $dp_act,
        //             implode("', '", $allowedValues)
        //         )
        //     );
        // }
        $this->container['dp_act'] = $dp_act;

        return $this;
    }

    /**
     * Gets act
     *
     * @return string|null
     */
    public function getAct()
    {
        return $this->container['act'];
    }

    /**
     * Sets act
     *
     * @param string|null $act Action state of research call
     *
     * @return self
     */
    public function setAct($act)
    {
        // $allowedValues = $this->getActAllowableValues();
        // if (!is_null($act) && !in_array($act, $allowedValues, true)) {
        //     throw new \InvalidArgumentException(
        //         sprintf(
        //             "Invalid value '%s' for 'act', must be one of '%s'",
        //             $act,
        //             implode("', '", $allowedValues)
        //         )
        //     );
        // }
        $this->container['act'] = $act;

        return $this;
    }

    /**
     * Gets sntmnt
     *
     * @return int|null
     */
    public function getSntmnt()
    {
        return $this->container['sntmnt'];
    }

    /**
     * Sets sntmnt
     *
     * @param int|null $sntmnt Used to change sentiment of the research call.
     *
     * @return self
     */
    public function setSntmnt($sntmnt)
    {
        $this->container['sntmnt'] = $sntmnt;

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
