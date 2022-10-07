<?php

namespace com\apiconnect\Enums;

/**
 * MarketCapEnum
 */
class MarketCapEnum extends BaseEnum
{
    const LARGE = "Large";
    const MEDIUM = "Medium";
    const SMALL = "Small";

    /**
     * getMarketCapAllowableValues
     *
     * @return array
     */
    public static function getMarketCapAllowableValues()
    {
        return [
            self::LARGE,
            self::MEDIUM,
            self::SMALL,
        ];
    }
}
