<?php

namespace com\apiconnect\Enums;

/**
 * ActionEnum
 */
class ActionEnum extends BaseEnum
{
    const BUY = "BUY";
    const SELL = "SELL";

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public static function getActionAllowableValues()
    {
        return [
            self::BUY,
            self::SELL
        ];
    }
}
