<?php

namespace com\apiconnect\Enums;

/**
 * TermEnum
 */
class TermEnum extends BaseEnum
{
    const LONGTERM = "LONGTERM";
    const MIDTERM = "MIDTERM";
    const SHORTTERM = "SHORTTERM";

    /**
     * getTermAllowableValues
     *
     * @return array
     */
    public static function getTermAllowableValues()
    {
        return [
            self::LONGTERM,
            self::MIDTERM,
            self::SHORTTERM,
        ];
    }
}
