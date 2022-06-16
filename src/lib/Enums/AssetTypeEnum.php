<?php

namespace com\edel\Enums;

/**
 * ActionEnum
 */
class AssetTypeEnum
{
    const A_TYP_FUTIDX = "FUTIDX";
    const A_TYP_FUTSTK = "FUTSTK";
    const A_TYP_FUTCUR = "FUTCUR";
    const A_TYP_FUTCOM = "FUTCOM";
    const A_TYP_OPTIDX = "OPTIDX";
    const A_TYP_OPTSTK = "OPTSTK";
    const A_TYP_OPTCUR = "OPTCUR";
    const A_TYP_OPTFUT = "OPTFUT";
    const A_TYP_EQUITY = "EQUITY";
    const A_TYP_INDEX = "INDEX";

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public static function getAssetTypeAllowableValues()
    {
        return [
            self::A_TYP_FUTIDX,
            self::A_TYP_FUTSTK,
            self::A_TYP_FUTCUR,
            self::A_TYP_FUTCOM,
            self::A_TYP_OPTIDX,
            self::A_TYP_OPTSTK,
            self::A_TYP_OPTCUR,
            self::A_TYP_OPTFUT,
            self::A_TYP_EQUITY,
            self::A_TYP_INDEX,
        ];
    }
}
