<?php

namespace com\edel\Enums;

class EODIntTypeEnum
{
    const EOD_D1 = "D1";
    const EOD_W1 = "W1";
    const EOD_MN1 = "MN1";

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public static function getEODTypAllowableValues()
    {
        return [
            self::EOD_D1,
            self::EOD_W1,
            self::EOD_MN1,
        ];
    }
}
