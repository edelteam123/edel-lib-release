<?php

namespace com\edel\Enums;

/**
 * ExchangeEnum
 */
class ExchangeEnum extends BaseEnum
{
    const BSE = "BSE";
    const NSE = "NSE";
    const MCX = "MCX";
    const NCDEX = "NCDEX";
    const NFO = "NFO";
    const CDS = "CDS";

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public static function getExchangeAllowableValues()
    {
        return [
            self::BSE,
            self::NSE,
            self::MCX,
            self::NCDEX,
            self::NFO,
            self::CDS
        ];
    }
}
