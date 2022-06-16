<?php

namespace com\edel\Enums;

/**
 * ActionEnum
 */
class IntradayIntTypeEnum
{
    const INTERVAL_M1 = "M1";
    const INTERVAL_M3 = "M3";
    const INTERVAL_M5 = "M5";
    const INTERVAL_M15 = "M15";
    const INTERVAL_M30 = "M30";
    const INTERVAL_H1 = "H1";

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public static function getIntTypAllowableValues()
    {
        return [
            self::INTERVAL_M1,
            self::INTERVAL_M3,
            self::INTERVAL_M5,
            self::INTERVAL_M15,
            self::INTERVAL_M30,
            self::INTERVAL_H1,
        ];
    }
}
