<?php

namespace com\apiconnect\Enums;

use com\apiconnect\Exceptions\ValidationException;
use ReflectionClass;

/**
 * BaseEnum
 */
abstract class BaseEnum
{
    private static $constCacheArray = NULL;

    /**
     * getConstants
     *
     * @return array
     */
    private static function getConstants()
    {
        if (self::$constCacheArray == NULL) {
            self::$constCacheArray = [];
        }
        $calledClass = get_called_class();
        if (!array_key_exists($calledClass, self::$constCacheArray)) {
            $reflect = new ReflectionClass($calledClass);
            self::$constCacheArray[$calledClass] = $reflect->getConstants();
        }
        return self::$constCacheArray[$calledClass];
    }

    /**
     * isValidValue
     *
     * @param  mixed $value
     * @param  mixed $strict
     * @return void
     */
    public static function isValidValue($value, $strict = true)
    {
        $values = array_values(self::getConstants());
        if (!in_array($value, $values, $strict)) {
            throw new ValidationException('Validation Failed', 422);
        }
        return $value;
    }
}
