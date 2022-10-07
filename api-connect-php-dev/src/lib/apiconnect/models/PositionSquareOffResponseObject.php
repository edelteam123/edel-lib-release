<?php
/**
 * PositionSquareOffResponseObject
 *
 * PHP version 7.2
 *
 * @category Class
 * @package  com\apiconnect
 * @author   Edelweiss
 * @link     https://www.edelweiss.in
 */

/**
 * Swagger spec for our Equity REST Project - Uat Version
 *
 * This page has details of all the resources related to equity that are a part of the REST API project. You can find request and response of all our APIs. You can try to generate a sample response by using the 'Try now' option as well. All APIs under the REST project have to be called by passing certain Authentication credentials as part of the request header. AppId and AppIdKey are the Authentication credentials that we expect for non logged in APIs whereas the logged in section will continue to accept JSESSIONID as a part of the cookie. We are working on it. Watch this space for any updates on the same.
 *
 * The version of the document: v1
 */

/**
 * Do not edit the class manually.
 */

namespace com\apiconnect\apiconnect\models;

use \ArrayAccess;
use \com\apiconnect\ObjectSerializer;

/**
 * PositionSquareOffResponseObject Class Doc Comment
 *
 * @category Class
 * @package  com\apiconnect
 * @author   Edelweiss
 * @link     https://www.edelweiss.in
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class PositionSquareOffResponseObject implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $modelName = 'PositionSquareOffResponseObject';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'errMsg' => 'string',
        'errCd' => 'string',
        'actCd' => 'string',
        'msg' => 'string',
        'oid' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'errMsg' => null,
        'errCd' => null,
        'actCd' => null,
        'msg' => null,
        'oid' => null
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
        'errMsg' => 'errMsg',
        'errCd' => 'errCd',
        'actCd' => 'actCd',
        'msg' => 'msg',
        'oid' => 'oid'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'errMsg' => 'setErrMsg',
        'errCd' => 'setErrCd',
        'actCd' => 'setActCd',
        'msg' => 'setMsg',
        'oid' => 'setOid'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'errMsg' => 'getErrMsg',
        'errCd' => 'getErrCd',
        'actCd' => 'getActCd',
        'msg' => 'getMsg',
        'oid' => 'getOid'
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
        return self::$modelName;
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
        $this->container['errMsg'] = $data['errMsg'] ?? null;
        $this->container['errCd'] = $data['errCd'] ?? null;
        $this->container['actCd'] = $data['actCd'] ?? null;
        $this->container['msg'] = $data['msg'] ?? null;
        $this->container['oid'] = $data['oid'] ?? null;
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
     * Gets errMsg
     *
     * @return string|null
     */
    public function getErrMsg()
    {
        return $this->container['errMsg'];
    }

    /**
     * Sets errMsg
     *
     * @param string|null $errMsg errMsg
     *
     * @return self
     */
    public function setErrMsg($errMsg)
    {
        $this->container['errMsg'] = $errMsg;

        return $this;
    }

    /**
     * Gets errCd
     *
     * @return string|null
     */
    public function getErrCd()
    {
        return $this->container['errCd'];
    }

    /**
     * Sets errCd
     *
     * @param string|null $errCd errCd
     *
     * @return self
     */
    public function setErrCd($errCd)
    {
        $this->container['errCd'] = $errCd;

        return $this;
    }

    /**
     * Gets actCd
     *
     * @return string|null
     */
    public function getActCd()
    {
        return $this->container['actCd'];
    }

    /**
     * Sets actCd
     *
     * @param string|null $actCd actCd
     *
     * @return self
     */
    public function setActCd($actCd)
    {
        $this->container['actCd'] = $actCd;

        return $this;
    }

    /**
     * Gets msg
     *
     * @return string|null
     */
    public function getMsg()
    {
        return $this->container['msg'];
    }

    /**
     * Sets msg
     *
     * @param string|null $msg msg
     *
     * @return self
     */
    public function setMsg($msg)
    {
        $this->container['msg'] = $msg;

        return $this;
    }

    /**
     * Gets oid
     *
     * @return string|null
     */
    public function getOid()
    {
        return $this->container['oid'];
    }

    /**
     * Sets oid
     *
     * @param string|null $oid oid
     *
     * @return self
     */
    public function setOid($oid)
    {
        $this->container['oid'] = $oid;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
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
    public function offsetSet($offset, $value)
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
    public function offsetUnset($offset)
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


