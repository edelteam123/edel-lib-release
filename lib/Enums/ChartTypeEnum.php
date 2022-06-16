<?php

namespace com\edel\Enums;

/**
 * ChartTypeEnum
 */
class ChartTypeEnum
{
    const CH_TYP_INTERVAL = 'Interval';
    const CH_TYP_HA = 'HA';
    const CH_TYP_RENKO = 'Renko';
    const CH_TYP_PAF = 'PAF';
    const CH_TYP_KAGI = 'Kagi';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public static function getChTypAllowableValues()
    {
        return [
            self::CH_TYP_INTERVAL,
            self::CH_TYP_HA,
            self::CH_TYP_RENKO,
            self::CH_TYP_PAF,
            self::CH_TYP_KAGI,
        ];
    }
}
