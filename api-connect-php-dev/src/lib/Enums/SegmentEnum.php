<?php

namespace com\apiconnect\Enums;

/**
 * SegmentEnum
 */
class SegmentEnum extends BaseEnum
{
    const EQ = "EQ";
    const FNO = "FNO";
    const CUR = "CUR";

    /**
     * getSegmentAllowableValues
     *
     * @return array
     */
    public static function getSegmentAllowableValues()
    {
        return [
            self::EQ,
            self::FNO,
            self::CUR,
        ];
    }
}
