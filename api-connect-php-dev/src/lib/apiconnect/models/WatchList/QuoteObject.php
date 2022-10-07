<?php
namespace com\apiconnect\apiconnect\models\WatchList;

use \ArrayAccess;
use \com\apiconnect\ObjectSerializer;
use com\apiconnect\apiconnect\models\ModelInterface;

class QuoteObject implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'QuoteObject';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'trd_sym' => 'string',
        'sym' => 'string',
        'as_typ' => 'string',
        'yr_lw' => 'string',
        'yr_lw_dt' => 'string',
        'yr_h' => 'string',
        'yr_hdt' => 'string',
        'o' => 'string',
        'h' => 'string',
        'l' => 'string',
        'c' => 'string',
        'ltp' => 'string',
        'ltt' => 'string',
        'altt' => 'string',
        'lut' => 'string',
        'atp' => 'string',
        'bid_pr' => 'string',
        'ask_pr' => 'string',
        'vol' => 'string',
        'lo_ct' => 'string',
        'hi_ct' => 'string',
        'chg' => 'string',
        'chg_p' => 'string',
        'lt_sz' => 'string',
        'tk_sz' => 'string',
        'dp_nm' => 'string',
        'stk_prc' => 'string',
        'op_typ' => 'string',
        'exp' => 'string',
        'desc' => 'string',
        'exc' => 'string',
        'brd_lot_qty' => 'string',
        'qty_units' => 'string',
        'prc_units' => 'string',
        'prc_qtn' => 'string',
        'dp_ins_typ' => 'string',
        'bd_sz' => 'string',
        'ak_sz' => 'string',
        'dp_exp_dt' => 'string',
        'exp_flg' => 'bool',
        'op_int' => 'string',
        'op_int_chg' => 'string',
        'op_int_chg_p' => 'string',
        'spot_sym' => 'string',
        'spot' => 'string',
        'spot_chg' => 'string',
        'spot_chg_p' => 'string',
        'rl_ovr_p' => 'string',
        'rl_c_abs' => 'string',
        'lt_t_qty' => 'string',
        'tdr_st_dt' => 'string',
        'tdr_end_dt' => 'string',
        'srp_st_dt' => 'string',
        'mx_lt_sz' => 'string',
        'trd_info_id' => 'string[]',
        'nt_by_qty' => 'string',
        'nt_sl_qty' => 'string',
        'onewkhi' => 'string',
        'onewklo' => 'string',
        'onemnhi' => 'string',
        'onemnlo' => 'string',
        'thrmnhi' => 'string',
        'thrmnlo' => 'string',
        'alltmhi' => 'string',
        'alltmhidt' => 'string',
        'alltmlo' => 'string',
        'alltmlodt' => 'string',
        'askivfut' => 'string',
        'askivspt' => 'string',
        'bidivfut' => 'string',
        'bidivspt' => 'string',
        'ltpivfut' => 'string',
        'ltpivspt' => 'string',
        'nt_trd_val' => 'string',
        'mns' => 'string',
        'is_mtf_enabled' => 'bool',
        'rch_flg' => 'string',
        'nws_flg' => 'string',
        'rl_ovr_cst' => 'string',
        'rl_ovr_cst_prc' => 'string',
        'rl_ovr_prc' => 'string',
        'bta' => 'string',
        'pe' => 'string',
        'mkt_cap' => 'string',
        'delta' => 'string',
        'gamma' => 'string',
        'theta' => 'string',
        'vega' => 'string',
        'idx_fut_trd_sym' => 'string',
        'dp_val' => 'string',
        'pcr' => 'string',
        'pd_val' => 'string',
        'bas' => 'string',
        'isin' => 'string',
        'as_sym' => 'string',
        'as_exc' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'trd_sym' => null,
        'sym' => null,
        'as_typ' => null,
        'yr_lw' => null,
        'yr_lw_dt' => null,
        'yr_h' => null,
        'yr_hdt' => null,
        'o' => null,
        'h' => null,
        'l' => null,
        'c' => null,
        'ltp' => null,
        'ltt' => null,
        'altt' => null,
        'lut' => null,
        'atp' => null,
        'bid_pr' => null,
        'ask_pr' => null,
        'vol' => null,
        'lo_ct' => null,
        'hi_ct' => null,
        'chg' => null,
        'chg_p' => null,
        'lt_sz' => null,
        'tk_sz' => null,
        'dp_nm' => null,
        'stk_prc' => null,
        'op_typ' => null,
        'exp' => null,
        'desc' => null,
        'exc' => null,
        'brd_lot_qty' => null,
        'qty_units' => null,
        'prc_units' => null,
        'prc_qtn' => null,
        'dp_ins_typ' => null,
        'bd_sz' => null,
        'ak_sz' => null,
        'dp_exp_dt' => null,
        'exp_flg' => null,
        'op_int' => null,
        'op_int_chg' => null,
        'op_int_chg_p' => null,
        'spot_sym' => null,
        'spot' => null,
        'spot_chg' => null,
        'spot_chg_p' => null,
        'rl_ovr_p' => null,
        'rl_c_abs' => null,
        'lt_t_qty' => null,
        'tdr_st_dt' => null,
        'tdr_end_dt' => null,
        'srp_st_dt' => null,
        'mx_lt_sz' => null,
        'trd_info_id' => null,
        'nt_by_qty' => null,
        'nt_sl_qty' => null,
        'onewkhi' => null,
        'onewklo' => null,
        'onemnhi' => null,
        'onemnlo' => null,
        'thrmnhi' => null,
        'thrmnlo' => null,
        'alltmhi' => null,
        'alltmhidt' => null,
        'alltmlo' => null,
        'alltmlodt' => null,
        'askivfut' => null,
        'askivspt' => null,
        'bidivfut' => null,
        'bidivspt' => null,
        'ltpivfut' => null,
        'ltpivspt' => null,
        'nt_trd_val' => null,
        'mns' => null,
        'is_mtf_enabled' => null,
        'rch_flg' => null,
        'nws_flg' => null,
        'rl_ovr_cst' => null,
        'rl_ovr_cst_prc' => null,
        'rl_ovr_prc' => null,
        'bta' => null,
        'pe' => null,
        'mkt_cap' => null,
        'delta' => null,
        'gamma' => null,
        'theta' => null,
        'vega' => null,
        'idx_fut_trd_sym' => null,
        'dp_val' => null,
        'pcr' => null,
        'pd_val' => null,
        'bas' => null,
        'isin' => null,
        'as_sym' => null,
        'as_exc' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'trd_sym' => 'trdSym',
        'sym' => 'sym',
        'as_typ' => 'asTyp',
        'yr_lw' => 'yrLw',
        'yr_lw_dt' => 'yrLwDt',
        'yr_h' => 'yrH',
        'yr_hdt' => 'yrHDt',
        'o' => 'o',
        'h' => 'h',
        'l' => 'l',
        'c' => 'c',
        'ltp' => 'ltp',
        'ltt' => 'ltt',
        'altt' => 'altt',
        'lut' => 'lut',
        'atp' => 'atp',
        'bid_pr' => 'bidPr',
        'ask_pr' => 'askPr',
        'vol' => 'vol',
        'lo_ct' => 'loCt',
        'hi_ct' => 'hiCt',
        'chg' => 'chg',
        'chg_p' => 'chgP',
        'lt_sz' => 'ltSz',
        'tk_sz' => 'tkSz',
        'dp_nm' => 'dpNm',
        'stk_prc' => 'stkPrc',
        'op_typ' => 'opTyp',
        'exp' => 'exp',
        'desc' => 'desc',
        'exc' => 'exc',
        'brd_lot_qty' => 'brdLotQty',
        'qty_units' => 'qtyUnits',
        'prc_units' => 'prcUnits',
        'prc_qtn' => 'prcQtn',
        'dp_ins_typ' => 'dpInsTyp',
        'bd_sz' => 'bdSz',
        'ak_sz' => 'akSz',
        'dp_exp_dt' => 'dpExpDt',
        'exp_flg' => 'expFlg',
        'op_int' => 'opInt',
        'op_int_chg' => 'opIntChg',
        'op_int_chg_p' => 'opIntChgP',
        'spot_sym' => 'spotSym',
        'spot' => 'spot',
        'spot_chg' => 'spotChg',
        'spot_chg_p' => 'spotChgP',
        'rl_ovr_p' => 'rlOvrP',
        'rl_c_abs' => 'rlCAbs',
        'lt_t_qty' => 'ltTQty',
        'tdr_st_dt' => 'tdrStDt',
        'tdr_end_dt' => 'tdrEndDt',
        'srp_st_dt' => 'srpStDt',
        'mx_lt_sz' => 'mxLtSz',
        'trd_info_id' => 'trdInfoId',
        'nt_by_qty' => 'ntByQty',
        'nt_sl_qty' => 'ntSlQty',
        'onewkhi' => 'onewkhi',
        'onewklo' => 'onewklo',
        'onemnhi' => 'onemnhi',
        'onemnlo' => 'onemnlo',
        'thrmnhi' => 'thrmnhi',
        'thrmnlo' => 'thrmnlo',
        'alltmhi' => 'alltmhi',
        'alltmhidt' => 'alltmhidt',
        'alltmlo' => 'alltmlo',
        'alltmlodt' => 'alltmlodt',
        'askivfut' => 'askivfut',
        'askivspt' => 'askivspt',
        'bidivfut' => 'bidivfut',
        'bidivspt' => 'bidivspt',
        'ltpivfut' => 'ltpivfut',
        'ltpivspt' => 'ltpivspt',
        'nt_trd_val' => 'ntTrdVal',
        'mns' => 'mns',
        'is_mtf_enabled' => 'isMTFEnabled',
        'rch_flg' => 'rchFlg',
        'nws_flg' => 'nwsFlg',
        'rl_ovr_cst' => 'rlOvrCst',
        'rl_ovr_cst_prc' => 'rlOvrCstPrc',
        'rl_ovr_prc' => 'rlOvrPrc',
        'bta' => 'bta',
        'pe' => 'pe',
        'mkt_cap' => 'mktCap',
        'delta' => 'delta',
        'gamma' => 'gamma',
        'theta' => 'theta',
        'vega' => 'vega',
        'idx_fut_trd_sym' => 'idxFutTrdSym',
        'dp_val' => 'dpVal',
        'pcr' => 'pcr',
        'pd_val' => 'pdVal',
        'bas' => 'bas',
        'isin' => 'isin',
        'as_sym' => 'asSym',
        'as_exc' => 'asExc'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'trd_sym' => 'setTrdSym',
        'sym' => 'setSym',
        'as_typ' => 'setAsTyp',
        'yr_lw' => 'setYrLw',
        'yr_lw_dt' => 'setYrLwDt',
        'yr_h' => 'setYrH',
        'yr_hdt' => 'setYrHdt',
        'o' => 'setO',
        'h' => 'setH',
        'l' => 'setL',
        'c' => 'setC',
        'ltp' => 'setLtp',
        'ltt' => 'setLtt',
        'altt' => 'setAltt',
        'lut' => 'setLut',
        'atp' => 'setAtp',
        'bid_pr' => 'setBidPr',
        'ask_pr' => 'setAskPr',
        'vol' => 'setVol',
        'lo_ct' => 'setLoCt',
        'hi_ct' => 'setHiCt',
        'chg' => 'setChg',
        'chg_p' => 'setChgP',
        'lt_sz' => 'setLtSz',
        'tk_sz' => 'setTkSz',
        'dp_nm' => 'setDpNm',
        'stk_prc' => 'setStkPrc',
        'op_typ' => 'setOpTyp',
        'exp' => 'setExp',
        'desc' => 'setDesc',
        'exc' => 'setExc',
        'brd_lot_qty' => 'setBrdLotQty',
        'qty_units' => 'setQtyUnits',
        'prc_units' => 'setPrcUnits',
        'prc_qtn' => 'setPrcQtn',
        'dp_ins_typ' => 'setDpInsTyp',
        'bd_sz' => 'setBdSz',
        'ak_sz' => 'setAkSz',
        'dp_exp_dt' => 'setDpExpDt',
        'exp_flg' => 'setExpFlg',
        'op_int' => 'setOpInt',
        'op_int_chg' => 'setOpIntChg',
        'op_int_chg_p' => 'setOpIntChgP',
        'spot_sym' => 'setSpotSym',
        'spot' => 'setSpot',
        'spot_chg' => 'setSpotChg',
        'spot_chg_p' => 'setSpotChgP',
        'rl_ovr_p' => 'setRlOvrP',
        'rl_c_abs' => 'setRlCAbs',
        'lt_t_qty' => 'setLtTQty',
        'tdr_st_dt' => 'setTdrStDt',
        'tdr_end_dt' => 'setTdrEndDt',
        'srp_st_dt' => 'setSrpStDt',
        'mx_lt_sz' => 'setMxLtSz',
        'trd_info_id' => 'setTrdInfoId',
        'nt_by_qty' => 'setNtByQty',
        'nt_sl_qty' => 'setNtSlQty',
        'onewkhi' => 'setOnewkhi',
        'onewklo' => 'setOnewklo',
        'onemnhi' => 'setOnemnhi',
        'onemnlo' => 'setOnemnlo',
        'thrmnhi' => 'setThrmnhi',
        'thrmnlo' => 'setThrmnlo',
        'alltmhi' => 'setAlltmhi',
        'alltmhidt' => 'setAlltmhidt',
        'alltmlo' => 'setAlltmlo',
        'alltmlodt' => 'setAlltmlodt',
        'askivfut' => 'setAskivfut',
        'askivspt' => 'setAskivspt',
        'bidivfut' => 'setBidivfut',
        'bidivspt' => 'setBidivspt',
        'ltpivfut' => 'setLtpivfut',
        'ltpivspt' => 'setLtpivspt',
        'nt_trd_val' => 'setNtTrdVal',
        'mns' => 'setMns',
        'is_mtf_enabled' => 'setIsMtfEnabled',
        'rch_flg' => 'setRchFlg',
        'nws_flg' => 'setNwsFlg',
        'rl_ovr_cst' => 'setRlOvrCst',
        'rl_ovr_cst_prc' => 'setRlOvrCstPrc',
        'rl_ovr_prc' => 'setRlOvrPrc',
        'bta' => 'setBta',
        'pe' => 'setPe',
        'mkt_cap' => 'setMktCap',
        'delta' => 'setDelta',
        'gamma' => 'setGamma',
        'theta' => 'setTheta',
        'vega' => 'setVega',
        'idx_fut_trd_sym' => 'setIdxFutTrdSym',
        'dp_val' => 'setDpVal',
        'pcr' => 'setPcr',
        'pd_val' => 'setPdVal',
        'bas' => 'setBas',
        'isin' => 'setIsin',
        'as_sym' => 'setAsSym',
        'as_exc' => 'setAsExc'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'trd_sym' => 'getTrdSym',
        'sym' => 'getSym',
        'as_typ' => 'getAsTyp',
        'yr_lw' => 'getYrLw',
        'yr_lw_dt' => 'getYrLwDt',
        'yr_h' => 'getYrH',
        'yr_hdt' => 'getYrHdt',
        'o' => 'getO',
        'h' => 'getH',
        'l' => 'getL',
        'c' => 'getC',
        'ltp' => 'getLtp',
        'ltt' => 'getLtt',
        'altt' => 'getAltt',
        'lut' => 'getLut',
        'atp' => 'getAtp',
        'bid_pr' => 'getBidPr',
        'ask_pr' => 'getAskPr',
        'vol' => 'getVol',
        'lo_ct' => 'getLoCt',
        'hi_ct' => 'getHiCt',
        'chg' => 'getChg',
        'chg_p' => 'getChgP',
        'lt_sz' => 'getLtSz',
        'tk_sz' => 'getTkSz',
        'dp_nm' => 'getDpNm',
        'stk_prc' => 'getStkPrc',
        'op_typ' => 'getOpTyp',
        'exp' => 'getExp',
        'desc' => 'getDesc',
        'exc' => 'getExc',
        'brd_lot_qty' => 'getBrdLotQty',
        'qty_units' => 'getQtyUnits',
        'prc_units' => 'getPrcUnits',
        'prc_qtn' => 'getPrcQtn',
        'dp_ins_typ' => 'getDpInsTyp',
        'bd_sz' => 'getBdSz',
        'ak_sz' => 'getAkSz',
        'dp_exp_dt' => 'getDpExpDt',
        'exp_flg' => 'getExpFlg',
        'op_int' => 'getOpInt',
        'op_int_chg' => 'getOpIntChg',
        'op_int_chg_p' => 'getOpIntChgP',
        'spot_sym' => 'getSpotSym',
        'spot' => 'getSpot',
        'spot_chg' => 'getSpotChg',
        'spot_chg_p' => 'getSpotChgP',
        'rl_ovr_p' => 'getRlOvrP',
        'rl_c_abs' => 'getRlCAbs',
        'lt_t_qty' => 'getLtTQty',
        'tdr_st_dt' => 'getTdrStDt',
        'tdr_end_dt' => 'getTdrEndDt',
        'srp_st_dt' => 'getSrpStDt',
        'mx_lt_sz' => 'getMxLtSz',
        'trd_info_id' => 'getTrdInfoId',
        'nt_by_qty' => 'getNtByQty',
        'nt_sl_qty' => 'getNtSlQty',
        'onewkhi' => 'getOnewkhi',
        'onewklo' => 'getOnewklo',
        'onemnhi' => 'getOnemnhi',
        'onemnlo' => 'getOnemnlo',
        'thrmnhi' => 'getThrmnhi',
        'thrmnlo' => 'getThrmnlo',
        'alltmhi' => 'getAlltmhi',
        'alltmhidt' => 'getAlltmhidt',
        'alltmlo' => 'getAlltmlo',
        'alltmlodt' => 'getAlltmlodt',
        'askivfut' => 'getAskivfut',
        'askivspt' => 'getAskivspt',
        'bidivfut' => 'getBidivfut',
        'bidivspt' => 'getBidivspt',
        'ltpivfut' => 'getLtpivfut',
        'ltpivspt' => 'getLtpivspt',
        'nt_trd_val' => 'getNtTrdVal',
        'mns' => 'getMns',
        'is_mtf_enabled' => 'getIsMtfEnabled',
        'rch_flg' => 'getRchFlg',
        'nws_flg' => 'getNwsFlg',
        'rl_ovr_cst' => 'getRlOvrCst',
        'rl_ovr_cst_prc' => 'getRlOvrCstPrc',
        'rl_ovr_prc' => 'getRlOvrPrc',
        'bta' => 'getBta',
        'pe' => 'getPe',
        'mkt_cap' => 'getMktCap',
        'delta' => 'getDelta',
        'gamma' => 'getGamma',
        'theta' => 'getTheta',
        'vega' => 'getVega',
        'idx_fut_trd_sym' => 'getIdxFutTrdSym',
        'dp_val' => 'getDpVal',
        'pcr' => 'getPcr',
        'pd_val' => 'getPdVal',
        'bas' => 'getBas',
        'isin' => 'getIsin',
        'as_sym' => 'getAsSym',
        'as_exc' => 'getAsExc'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }


    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['trd_sym'] = $data['trd_sym'] ?? null;
        $this->container['sym'] = $data['sym'] ?? null;
        $this->container['as_typ'] = $data['as_typ'] ?? null;
        $this->container['yr_lw'] = $data['yr_lw'] ?? null;
        $this->container['yr_lw_dt'] = $data['yr_lw_dt'] ?? null;
        $this->container['yr_h'] = $data['yr_h'] ?? null;
        $this->container['yr_hdt'] = $data['yr_hdt'] ?? null;
        $this->container['o'] = $data['o'] ?? null;
        $this->container['h'] = $data['h'] ?? null;
        $this->container['l'] = $data['l'] ?? null;
        $this->container['c'] = $data['c'] ?? null;
        $this->container['ltp'] = $data['ltp'] ?? null;
        $this->container['ltt'] = $data['ltt'] ?? null;
        $this->container['altt'] = $data['altt'] ?? null;
        $this->container['lut'] = $data['lut'] ?? null;
        $this->container['atp'] = $data['atp'] ?? null;
        $this->container['bid_pr'] = $data['bid_pr'] ?? null;
        $this->container['ask_pr'] = $data['ask_pr'] ?? null;
        $this->container['vol'] = $data['vol'] ?? null;
        $this->container['lo_ct'] = $data['lo_ct'] ?? null;
        $this->container['hi_ct'] = $data['hi_ct'] ?? null;
        $this->container['chg'] = $data['chg'] ?? null;
        $this->container['chg_p'] = $data['chg_p'] ?? null;
        $this->container['lt_sz'] = $data['lt_sz'] ?? null;
        $this->container['tk_sz'] = $data['tk_sz'] ?? null;
        $this->container['dp_nm'] = $data['dp_nm'] ?? null;
        $this->container['stk_prc'] = $data['stk_prc'] ?? null;
        $this->container['op_typ'] = $data['op_typ'] ?? null;
        $this->container['exp'] = $data['exp'] ?? null;
        $this->container['desc'] = $data['desc'] ?? null;
        $this->container['exc'] = $data['exc'] ?? null;
        $this->container['brd_lot_qty'] = $data['brd_lot_qty'] ?? null;
        $this->container['qty_units'] = $data['qty_units'] ?? null;
        $this->container['prc_units'] = $data['prc_units'] ?? null;
        $this->container['prc_qtn'] = $data['prc_qtn'] ?? null;
        $this->container['dp_ins_typ'] = $data['dp_ins_typ'] ?? null;
        $this->container['bd_sz'] = $data['bd_sz'] ?? null;
        $this->container['ak_sz'] = $data['ak_sz'] ?? null;
        $this->container['dp_exp_dt'] = $data['dp_exp_dt'] ?? null;
        $this->container['exp_flg'] = $data['exp_flg'] ?? false;
        $this->container['op_int'] = $data['op_int'] ?? null;
        $this->container['op_int_chg'] = $data['op_int_chg'] ?? null;
        $this->container['op_int_chg_p'] = $data['op_int_chg_p'] ?? null;
        $this->container['spot_sym'] = $data['spot_sym'] ?? null;
        $this->container['spot'] = $data['spot'] ?? null;
        $this->container['spot_chg'] = $data['spot_chg'] ?? null;
        $this->container['spot_chg_p'] = $data['spot_chg_p'] ?? null;
        $this->container['rl_ovr_p'] = $data['rl_ovr_p'] ?? null;
        $this->container['rl_c_abs'] = $data['rl_c_abs'] ?? null;
        $this->container['lt_t_qty'] = $data['lt_t_qty'] ?? null;
        $this->container['tdr_st_dt'] = $data['tdr_st_dt'] ?? null;
        $this->container['tdr_end_dt'] = $data['tdr_end_dt'] ?? null;
        $this->container['srp_st_dt'] = $data['srp_st_dt'] ?? null;
        $this->container['mx_lt_sz'] = $data['mx_lt_sz'] ?? null;
        $this->container['trd_info_id'] = $data['trd_info_id'] ?? null;
        $this->container['nt_by_qty'] = $data['nt_by_qty'] ?? null;
        $this->container['nt_sl_qty'] = $data['nt_sl_qty'] ?? null;
        $this->container['onewkhi'] = $data['onewkhi'] ?? null;
        $this->container['onewklo'] = $data['onewklo'] ?? null;
        $this->container['onemnhi'] = $data['onemnhi'] ?? null;
        $this->container['onemnlo'] = $data['onemnlo'] ?? null;
        $this->container['thrmnhi'] = $data['thrmnhi'] ?? null;
        $this->container['thrmnlo'] = $data['thrmnlo'] ?? null;
        $this->container['alltmhi'] = $data['alltmhi'] ?? null;
        $this->container['alltmhidt'] = $data['alltmhidt'] ?? null;
        $this->container['alltmlo'] = $data['alltmlo'] ?? null;
        $this->container['alltmlodt'] = $data['alltmlodt'] ?? null;
        $this->container['askivfut'] = $data['askivfut'] ?? null;
        $this->container['askivspt'] = $data['askivspt'] ?? null;
        $this->container['bidivfut'] = $data['bidivfut'] ?? null;
        $this->container['bidivspt'] = $data['bidivspt'] ?? null;
        $this->container['ltpivfut'] = $data['ltpivfut'] ?? null;
        $this->container['ltpivspt'] = $data['ltpivspt'] ?? null;
        $this->container['nt_trd_val'] = $data['nt_trd_val'] ?? null;
        $this->container['mns'] = $data['mns'] ?? null;
        $this->container['is_mtf_enabled'] = $data['is_mtf_enabled'] ?? false;
        $this->container['rch_flg'] = $data['rch_flg'] ?? null;
        $this->container['nws_flg'] = $data['nws_flg'] ?? null;
        $this->container['rl_ovr_cst'] = $data['rl_ovr_cst'] ?? null;
        $this->container['rl_ovr_cst_prc'] = $data['rl_ovr_cst_prc'] ?? null;
        $this->container['rl_ovr_prc'] = $data['rl_ovr_prc'] ?? null;
        $this->container['bta'] = $data['bta'] ?? null;
        $this->container['pe'] = $data['pe'] ?? null;
        $this->container['mkt_cap'] = $data['mkt_cap'] ?? null;
        $this->container['delta'] = $data['delta'] ?? null;
        $this->container['gamma'] = $data['gamma'] ?? null;
        $this->container['theta'] = $data['theta'] ?? null;
        $this->container['vega'] = $data['vega'] ?? null;
        $this->container['idx_fut_trd_sym'] = $data['idx_fut_trd_sym'] ?? null;
        $this->container['dp_val'] = $data['dp_val'] ?? null;
        $this->container['pcr'] = $data['pcr'] ?? null;
        $this->container['pd_val'] = $data['pd_val'] ?? null;
        $this->container['bas'] = $data['bas'] ?? null;
        $this->container['isin'] = $data['isin'] ?? null;
        $this->container['as_sym'] = $data['as_sym'] ?? null;
        $this->container['as_exc'] = $data['as_exc'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets trd_sym
     *
     * @return string|null
     */
    public function getTrdSym()
    {
        return $this->container['trd_sym'];
    }

    /**
     * Sets trd_sym
     *
     * @param string|null $trd_sym Trading Symbol / Edelcode
     *
     * @return self
     */
    public function setTrdSym($trd_sym)
    {
        $this->container['trd_sym'] = $trd_sym;

        return $this;
    }

    /**
     * Gets sym
     *
     * @return string|null
     */
    public function getSym()
    {
        return $this->container['sym'];
    }

    /**
     * Sets sym
     *
     * @param string|null $sym Streaming Symbol : unique identifier for MW
     *
     * @return self
     */
    public function setSym($sym)
    {
        $this->container['sym'] = $sym;

        return $this;
    }

    /**
     * Gets as_typ
     *
     * @return string|null
     */
    public function getAsTyp()
    {
        return $this->container['as_typ'];
    }

    /**
     * Sets as_typ
     *
     * @param string|null $as_typ Asset type
     *
     * @return self
     */
    public function setAsTyp($as_typ)
    {
        $this->container['as_typ'] = $as_typ;

        return $this;
    }

    /**
     * Gets yr_lw
     *
     * @return string|null
     */
    public function getYrLw()
    {
        return $this->container['yr_lw'];
    }

    /**
     * Sets yr_lw
     *
     * @param string|null $yr_lw Year low
     *
     * @return self
     */
    public function setYrLw($yr_lw)
    {
        $this->container['yr_lw'] = $yr_lw;

        return $this;
    }

    /**
     * Gets yr_lw_dt
     *
     * @return string|null
     */
    public function getYrLwDt()
    {
        return $this->container['yr_lw_dt'];
    }

    /**
     * Sets yr_lw_dt
     *
     * @param string|null $yr_lw_dt Year low Date, empty if date is not available
     *
     * @return self
     */
    public function setYrLwDt($yr_lw_dt)
    {
        $this->container['yr_lw_dt'] = $yr_lw_dt;

        return $this;
    }

    /**
     * Gets yr_h
     *
     * @return string|null
     */
    public function getYrH()
    {
        return $this->container['yr_h'];
    }

    /**
     * Sets yr_h
     *
     * @param string|null $yr_h Year high
     *
     * @return self
     */
    public function setYrH($yr_h)
    {
        $this->container['yr_h'] = $yr_h;

        return $this;
    }

    /**
     * Gets yr_hdt
     *
     * @return string|null
     */
    public function getYrHdt()
    {
        return $this->container['yr_hdt'];
    }

    /**
     * Sets yr_hdt
     *
     * @param string|null $yr_hdt Year high Date, empty if date is not available
     *
     * @return self
     */
    public function setYrHdt($yr_hdt)
    {
        $this->container['yr_hdt'] = $yr_hdt;

        return $this;
    }

    /**
     * Gets o
     *
     * @return string|null
     */
    public function getO()
    {
        return $this->container['o'];
    }

    /**
     * Sets o
     *
     * @param string|null $o Open price
     *
     * @return self
     */
    public function setO($o)
    {
        $this->container['o'] = $o;

        return $this;
    }

    /**
     * Gets h
     *
     * @return string|null
     */
    public function getH()
    {
        return $this->container['h'];
    }

    /**
     * Sets h
     *
     * @param string|null $h Day high
     *
     * @return self
     */
    public function setH($h)
    {
        $this->container['h'] = $h;

        return $this;
    }

    /**
     * Gets l
     *
     * @return string|null
     */
    public function getL()
    {
        return $this->container['l'];
    }

    /**
     * Sets l
     *
     * @param string|null $l Day low
     *
     * @return self
     */
    public function setL($l)
    {
        $this->container['l'] = $l;

        return $this;
    }

    /**
     * Gets c
     *
     * @return string|null
     */
    public function getC()
    {
        return $this->container['c'];
    }

    /**
     * Sets c
     *
     * @param string|null $c Day close
     *
     * @return self
     */
    public function setC($c)
    {
        $this->container['c'] = $c;

        return $this;
    }

    /**
     * Gets ltp
     *
     * @return string|null
     */
    public function getLtp()
    {
        return $this->container['ltp'];
    }

    /**
     * Sets ltp
     *
     * @param string|null $ltp Last traded price
     *
     * @return self
     */
    public function setLtp($ltp)
    {
        $this->container['ltp'] = $ltp;

        return $this;
    }

    /**
     * Gets ltt
     *
     * @return string|null
     */
    public function getLtt()
    {
        return $this->container['ltt'];
    }

    /**
     * Sets ltt
     *
     * @param string|null $ltt Last traded time
     *
     * @return self
     */
    public function setLtt($ltt)
    {
        $this->container['ltt'] = $ltt;

        return $this;
    }

    /**
     * Gets altt
     *
     * @return string|null
     */
    public function getAltt()
    {
        return $this->container['altt'];
    }

    /**
     * Sets altt
     *
     * @param string|null $altt Actual Last traded time
     *
     * @return self
     */
    public function setAltt($altt)
    {
        $this->container['altt'] = $altt;

        return $this;
    }

    /**
     * Gets lut
     *
     * @return string|null
     */
    public function getLut()
    {
        return $this->container['lut'];
    }

    /**
     * Sets lut
     *
     * @param string|null $lut Last updated time in Date Format
     *
     * @return self
     */
    public function setLut($lut)
    {
        $this->container['lut'] = $lut;

        return $this;
    }

    /**
     * Gets atp
     *
     * @return string|null
     */
    public function getAtp()
    {
        return $this->container['atp'];
    }

    /**
     * Sets atp
     *
     * @param string|null $atp average traded price
     *
     * @return self
     */
    public function setAtp($atp)
    {
        $this->container['atp'] = $atp;

        return $this;
    }

    /**
     * Gets bid_pr
     *
     * @return string|null
     */
    public function getBidPr()
    {
        return $this->container['bid_pr'];
    }

    /**
     * Sets bid_pr
     *
     * @param string|null $bid_pr Bid price
     *
     * @return self
     */
    public function setBidPr($bid_pr)
    {
        $this->container['bid_pr'] = $bid_pr;

        return $this;
    }

    /**
     * Gets ask_pr
     *
     * @return string|null
     */
    public function getAskPr()
    {
        return $this->container['ask_pr'];
    }

    /**
     * Sets ask_pr
     *
     * @param string|null $ask_pr Ask price
     *
     * @return self
     */
    public function setAskPr($ask_pr)
    {
        $this->container['ask_pr'] = $ask_pr;

        return $this;
    }

    /**
     * Gets vol
     *
     * @return string|null
     */
    public function getVol()
    {
        return $this->container['vol'];
    }

    /**
     * Sets vol
     *
     * @param string|null $vol Vol
     *
     * @return self
     */
    public function setVol($vol)
    {
        $this->container['vol'] = $vol;

        return $this;
    }

    /**
     * Gets lo_ct
     *
     * @return string|null
     */
    public function getLoCt()
    {
        return $this->container['lo_ct'];
    }

    /**
     * Sets lo_ct
     *
     * @param string|null $lo_ct Lower circuit price
     *
     * @return self
     */
    public function setLoCt($lo_ct)
    {
        $this->container['lo_ct'] = $lo_ct;

        return $this;
    }

    /**
     * Gets hi_ct
     *
     * @return string|null
     */
    public function getHiCt()
    {
        return $this->container['hi_ct'];
    }

    /**
     * Sets hi_ct
     *
     * @param string|null $hi_ct Higher circuit price
     *
     * @return self
     */
    public function setHiCt($hi_ct)
    {
        $this->container['hi_ct'] = $hi_ct;

        return $this;
    }

    /**
     * Gets chg
     *
     * @return string|null
     */
    public function getChg()
    {
        return $this->container['chg'];
    }

    /**
     * Sets chg
     *
     * @param string|null $chg change from previous close
     *
     * @return self
     */
    public function setChg($chg)
    {
        $this->container['chg'] = $chg;

        return $this;
    }

    /**
     * Gets chg_p
     *
     * @return string|null
     */
    public function getChgP()
    {
        return $this->container['chg_p'];
    }

    /**
     * Sets chg_p
     *
     * @param string|null $chg_p change percent from previous close
     *
     * @return self
     */
    public function setChgP($chg_p)
    {
        $this->container['chg_p'] = $chg_p;

        return $this;
    }

    /**
     * Gets lt_sz
     *
     * @return string|null
     */
    public function getLtSz()
    {
        return $this->container['lt_sz'];
    }

    /**
     * Sets lt_sz
     *
     * @param string|null $lt_sz Lot size
     *
     * @return self
     */
    public function setLtSz($lt_sz)
    {
        $this->container['lt_sz'] = $lt_sz;

        return $this;
    }

    /**
     * Gets tk_sz
     *
     * @return string|null
     */
    public function getTkSz()
    {
        return $this->container['tk_sz'];
    }

    /**
     * Sets tk_sz
     *
     * @param string|null $tk_sz Tick size
     *
     * @return self
     */
    public function setTkSz($tk_sz)
    {
        $this->container['tk_sz'] = $tk_sz;

        return $this;
    }

    /**
     * Gets dp_nm
     *
     * @return string|null
     */
    public function getDpNm()
    {
        return $this->container['dp_nm'];
    }

    /**
     * Sets dp_nm
     *
     * @param string|null $dp_nm Display name
     *
     * @return self
     */
    public function setDpNm($dp_nm)
    {
        $this->container['dp_nm'] = $dp_nm;

        return $this;
    }

    /**
     * Gets stk_prc
     *
     * @return string|null
     */
    public function getStkPrc()
    {
        return $this->container['stk_prc'];
    }

    /**
     * Sets stk_prc
     *
     * @param string|null $stk_prc Strike price
     *
     * @return self
     */
    public function setStkPrc($stk_prc)
    {
        $this->container['stk_prc'] = $stk_prc;

        return $this;
    }

    /**
     * Gets op_typ
     *
     * @return string|null
     */
    public function getOpTyp()
    {
        return $this->container['op_typ'];
    }

    /**
     * Sets op_typ
     *
     * @param string|null $op_typ Option type
     *
     * @return self
     */
    public function setOpTyp($op_typ)
    {
        $this->container['op_typ'] = $op_typ;

        return $this;
    }

    /**
     * Gets exp
     *
     * @return string|null
     */
    public function getExp()
    {
        return $this->container['exp'];
    }

    /**
     * Sets exp
     *
     * @param string|null $exp Expiry date of contract in milliseconds
     *
     * @return self
     */
    public function setExp($exp)
    {
        $this->container['exp'] = $exp;

        return $this;
    }

    /**
     * Gets desc
     *
     * @return string|null
     */
    public function getDesc()
    {
        return $this->container['desc'];
    }

    /**
     * Sets desc
     *
     * @param string|null $desc Description for the scrip / contract
     *
     * @return self
     */
    public function setDesc($desc)
    {
        $this->container['desc'] = $desc;

        return $this;
    }

    /**
     * Gets exc
     *
     * @return string|null
     */
    public function getExc()
    {
        return $this->container['exc'];
    }

    /**
     * Sets exc
     *
     * @param string|null $exc Exchange of the scrip / contract
     *
     * @return self
     */
    public function setExc($exc)
    {
        $this->container['exc'] = $exc;

        return $this;
    }

    /**
     * Gets brd_lot_qty
     *
     * @return string|null
     */
    public function getBrdLotQty()
    {
        return $this->container['brd_lot_qty'];
    }

    /**
     * Sets brd_lot_qty
     *
     * @param string|null $brd_lot_qty Board lot quantity
     *
     * @return self
     */
    public function setBrdLotQty($brd_lot_qty)
    {
        $this->container['brd_lot_qty'] = $brd_lot_qty;

        return $this;
    }

    /**
     * Gets qty_units
     *
     * @return string|null
     */
    public function getQtyUnits()
    {
        return $this->container['qty_units'];
    }

    /**
     * Sets qty_units
     *
     * @param string|null $qty_units Quantity units / deliver units
     *
     * @return self
     */
    public function setQtyUnits($qty_units)
    {
        $this->container['qty_units'] = $qty_units;

        return $this;
    }

    /**
     * Gets prc_units
     *
     * @return string|null
     */
    public function getPrcUnits()
    {
        return $this->container['prc_units'];
    }

    /**
     * Sets prc_units
     *
     * @param string|null $prc_units prc units
     *
     * @return self
     */
    public function setPrcUnits($prc_units)
    {
        $this->container['prc_units'] = $prc_units;

        return $this;
    }

    /**
     * Gets prc_qtn
     *
     * @return string|null
     */
    public function getPrcQtn()
    {
        return $this->container['prc_qtn'];
    }

    /**
     * Sets prc_qtn
     *
     * @param string|null $prc_qtn prc units
     *
     * @return self
     */
    public function setPrcQtn($prc_qtn)
    {
        $this->container['prc_qtn'] = $prc_qtn;

        return $this;
    }

    /**
     * Gets dp_ins_typ
     *
     * @return string|null
     */
    public function getDpInsTyp()
    {
        return $this->container['dp_ins_typ'];
    }

    /**
     * Sets dp_ins_typ
     *
     * @param string|null $dp_ins_typ Display instrument type
     *
     * @return self
     */
    public function setDpInsTyp($dp_ins_typ)
    {
        $this->container['dp_ins_typ'] = $dp_ins_typ;

        return $this;
    }

    /**
     * Gets bd_sz
     *
     * @return string|null
     */
    public function getBdSz()
    {
        return $this->container['bd_sz'];
    }

    /**
     * Sets bd_sz
     *
     * @param string|null $bd_sz Bid size
     *
     * @return self
     */
    public function setBdSz($bd_sz)
    {
        $this->container['bd_sz'] = $bd_sz;

        return $this;
    }

    /**
     * Gets ak_sz
     *
     * @return string|null
     */
    public function getAkSz()
    {
        return $this->container['ak_sz'];
    }

    /**
     * Sets ak_sz
     *
     * @param string|null $ak_sz Ask size
     *
     * @return self
     */
    public function setAkSz($ak_sz)
    {
        $this->container['ak_sz'] = $ak_sz;

        return $this;
    }

    /**
     * Gets dp_exp_dt
     *
     * @return string|null
     */
    public function getDpExpDt()
    {
        return $this->container['dp_exp_dt'];
    }

    /**
     * Sets dp_exp_dt
     *
     * @param string|null $dp_exp_dt Display expiry date
     *
     * @return self
     */
    public function setDpExpDt($dp_exp_dt)
    {
        $this->container['dp_exp_dt'] = $dp_exp_dt;

        return $this;
    }

    /**
     * Gets exp_flg
     *
     * @return bool|null
     */
    public function getExpFlg()
    {
        return $this->container['exp_flg'];
    }

    /**
     * Sets exp_flg
     *
     * @param bool|null $exp_flg Expiry Flag
     *
     * @return self
     */
    public function setExpFlg($exp_flg)
    {
        $this->container['exp_flg'] = $exp_flg;

        return $this;
    }

    /**
     * Gets op_int
     *
     * @return string|null
     */
    public function getOpInt()
    {
        return $this->container['op_int'];
    }

    /**
     * Sets op_int
     *
     * @param string|null $op_int Open interest
     *
     * @return self
     */
    public function setOpInt($op_int)
    {
        $this->container['op_int'] = $op_int;

        return $this;
    }

    /**
     * Gets op_int_chg
     *
     * @return string|null
     */
    public function getOpIntChg()
    {
        return $this->container['op_int_chg'];
    }

    /**
     * Sets op_int_chg
     *
     * @param string|null $op_int_chg Change in Open interest
     *
     * @return self
     */
    public function setOpIntChg($op_int_chg)
    {
        $this->container['op_int_chg'] = $op_int_chg;

        return $this;
    }

    /**
     * Gets op_int_chg_p
     *
     * @return string|null
     */
    public function getOpIntChgP()
    {
        return $this->container['op_int_chg_p'];
    }

    /**
     * Sets op_int_chg_p
     *
     * @param string|null $op_int_chg_p Percentage Change in Open interest
     *
     * @return self
     */
    public function setOpIntChgP($op_int_chg_p)
    {
        $this->container['op_int_chg_p'] = $op_int_chg_p;

        return $this;
    }

    /**
     * Gets spot_sym
     *
     * @return string|null
     */
    public function getSpotSym()
    {
        return $this->container['spot_sym'];
    }

    /**
     * Sets spot_sym
     *
     * @param string|null $spot_sym Spot price of underlying
     *
     * @return self
     */
    public function setSpotSym($spot_sym)
    {
        $this->container['spot_sym'] = $spot_sym;

        return $this;
    }

    /**
     * Gets spot
     *
     * @return string|null
     */
    public function getSpot()
    {
        return $this->container['spot'];
    }

    /**
     * Sets spot
     *
     * @param string|null $spot Spot price of underlying
     *
     * @return self
     */
    public function setSpot($spot)
    {
        $this->container['spot'] = $spot;

        return $this;
    }

    /**
     * Gets spot_chg
     *
     * @return string|null
     */
    public function getSpotChg()
    {
        return $this->container['spot_chg'];
    }

    /**
     * Sets spot_chg
     *
     * @param string|null $spot_chg Spot Change of underlying
     *
     * @return self
     */
    public function setSpotChg($spot_chg)
    {
        $this->container['spot_chg'] = $spot_chg;

        return $this;
    }

    /**
     * Gets spot_chg_p
     *
     * @return string|null
     */
    public function getSpotChgP()
    {
        return $this->container['spot_chg_p'];
    }

    /**
     * Sets spot_chg_p
     *
     * @param string|null $spot_chg_p Spot Change Percent of underlying
     *
     * @return self
     */
    public function setSpotChgP($spot_chg_p)
    {
        $this->container['spot_chg_p'] = $spot_chg_p;

        return $this;
    }

    /**
     * Gets rl_ovr_p
     *
     * @return string|null
     */
    public function getRlOvrP()
    {
        return $this->container['rl_ovr_p'];
    }

    /**
     * Sets rl_ovr_p
     *
     * @param string|null $rl_ovr_p Rollover percentage
     *
     * @return self
     */
    public function setRlOvrP($rl_ovr_p)
    {
        $this->container['rl_ovr_p'] = $rl_ovr_p;

        return $this;
    }

    /**
     * Gets rl_c_abs
     *
     * @return string|null
     */
    public function getRlCAbs()
    {
        return $this->container['rl_c_abs'];
    }

    /**
     * Sets rl_c_abs
     *
     * @param string|null $rl_c_abs Absolute Cost for Rollover
     *
     * @return self
     */
    public function setRlCAbs($rl_c_abs)
    {
        $this->container['rl_c_abs'] = $rl_c_abs;

        return $this;
    }

    /**
     * Gets lt_t_qty
     *
     * @return string|null
     */
    public function getLtTQty()
    {
        return $this->container['lt_t_qty'];
    }

    /**
     * Sets lt_t_qty
     *
     * @param string|null $lt_t_qty Last traded quantity
     *
     * @return self
     */
    public function setLtTQty($lt_t_qty)
    {
        $this->container['lt_t_qty'] = $lt_t_qty;

        return $this;
    }

    /**
     * Gets tdr_st_dt
     *
     * @return string|null
     */
    public function getTdrStDt()
    {
        return $this->container['tdr_st_dt'];
    }

    /**
     * Sets tdr_st_dt
     *
     * @param string|null $tdr_st_dt Tender start date in epoch (milliseconds)
     *
     * @return self
     */
    public function setTdrStDt($tdr_st_dt)
    {
        $this->container['tdr_st_dt'] = $tdr_st_dt;

        return $this;
    }

    /**
     * Gets tdr_end_dt
     *
     * @return string|null
     */
    public function getTdrEndDt()
    {
        return $this->container['tdr_end_dt'];
    }

    /**
     * Sets tdr_end_dt
     *
     * @param string|null $tdr_end_dt Tender end date in epoch (milliseconds)
     *
     * @return self
     */
    public function setTdrEndDt($tdr_end_dt)
    {
        $this->container['tdr_end_dt'] = $tdr_end_dt;

        return $this;
    }

    /**
     * Gets srp_st_dt
     *
     * @return string|null
     */
    public function getSrpStDt()
    {
        return $this->container['srp_st_dt'];
    }

    /**
     * Sets srp_st_dt
     *
     * @param string|null $srp_st_dt Scrip start date in epoch (milliseconds)
     *
     * @return self
     */
    public function setSrpStDt($srp_st_dt)
    {
        $this->container['srp_st_dt'] = $srp_st_dt;

        return $this;
    }

    /**
     * Gets mx_lt_sz
     *
     * @return string|null
     */
    public function getMxLtSz()
    {
        return $this->container['mx_lt_sz'];
    }

    /**
     * Sets mx_lt_sz
     *
     * @param string|null $mx_lt_sz Max Lot size
     *
     * @return self
     */
    public function setMxLtSz($mx_lt_sz)
    {
        $this->container['mx_lt_sz'] = $mx_lt_sz;

        return $this;
    }

    /**
     * Gets trd_info_id
     *
     * @return string[]|null
     */
    public function getTrdInfoId()
    {
        return $this->container['trd_info_id'];
    }

    /**
     * Sets trd_info_id
     *
     * @param string[]|null $trd_info_id t2t text info
     *
     * @return self
     */
    public function setTrdInfoId($trd_info_id)
    {
        $this->container['trd_info_id'] = $trd_info_id;

        return $this;
    }

    /**
     * Gets nt_by_qty
     *
     * @return string|null
     */
    public function getNtByQty()
    {
        return $this->container['nt_by_qty'];
    }

    /**
     * Sets nt_by_qty
     *
     * @param string|null $nt_by_qty Total Buy Quantity
     *
     * @return self
     */
    public function setNtByQty($nt_by_qty)
    {
        $this->container['nt_by_qty'] = $nt_by_qty;

        return $this;
    }

    /**
     * Gets nt_sl_qty
     *
     * @return string|null
     */
    public function getNtSlQty()
    {
        return $this->container['nt_sl_qty'];
    }

    /**
     * Sets nt_sl_qty
     *
     * @param string|null $nt_sl_qty Total Sell Quantity
     *
     * @return self
     */
    public function setNtSlQty($nt_sl_qty)
    {
        $this->container['nt_sl_qty'] = $nt_sl_qty;

        return $this;
    }

    /**
     * Gets onewkhi
     *
     * @return string|null
     */
    public function getOnewkhi()
    {
        return $this->container['onewkhi'];
    }

    /**
     * Sets onewkhi
     *
     * @param string|null $onewkhi One Week High
     *
     * @return self
     */
    public function setOnewkhi($onewkhi)
    {
        $this->container['onewkhi'] = $onewkhi;

        return $this;
    }

    /**
     * Gets onewklo
     *
     * @return string|null
     */
    public function getOnewklo()
    {
        return $this->container['onewklo'];
    }

    /**
     * Sets onewklo
     *
     * @param string|null $onewklo One Week Low
     *
     * @return self
     */
    public function setOnewklo($onewklo)
    {
        $this->container['onewklo'] = $onewklo;

        return $this;
    }

    /**
     * Gets onemnhi
     *
     * @return string|null
     */
    public function getOnemnhi()
    {
        return $this->container['onemnhi'];
    }

    /**
     * Sets onemnhi
     *
     * @param string|null $onemnhi One month high
     *
     * @return self
     */
    public function setOnemnhi($onemnhi)
    {
        $this->container['onemnhi'] = $onemnhi;

        return $this;
    }

    /**
     * Gets onemnlo
     *
     * @return string|null
     */
    public function getOnemnlo()
    {
        return $this->container['onemnlo'];
    }

    /**
     * Sets onemnlo
     *
     * @param string|null $onemnlo one month low
     *
     * @return self
     */
    public function setOnemnlo($onemnlo)
    {
        $this->container['onemnlo'] = $onemnlo;

        return $this;
    }

    /**
     * Gets thrmnhi
     *
     * @return string|null
     */
    public function getThrmnhi()
    {
        return $this->container['thrmnhi'];
    }

    /**
     * Sets thrmnhi
     *
     * @param string|null $thrmnhi Three months high
     *
     * @return self
     */
    public function setThrmnhi($thrmnhi)
    {
        $this->container['thrmnhi'] = $thrmnhi;

        return $this;
    }

    /**
     * Gets thrmnlo
     *
     * @return string|null
     */
    public function getThrmnlo()
    {
        return $this->container['thrmnlo'];
    }

    /**
     * Sets thrmnlo
     *
     * @param string|null $thrmnlo Three months low
     *
     * @return self
     */
    public function setThrmnlo($thrmnlo)
    {
        $this->container['thrmnlo'] = $thrmnlo;

        return $this;
    }

    /**
     * Gets alltmhi
     *
     * @return string|null
     */
    public function getAlltmhi()
    {
        return $this->container['alltmhi'];
    }

    /**
     * Sets alltmhi
     *
     * @param string|null $alltmhi All time high
     *
     * @return self
     */
    public function setAlltmhi($alltmhi)
    {
        $this->container['alltmhi'] = $alltmhi;

        return $this;
    }

    /**
     * Gets alltmhidt
     *
     * @return string|null
     */
    public function getAlltmhidt()
    {
        return $this->container['alltmhidt'];
    }

    /**
     * Sets alltmhidt
     *
     * @param string|null $alltmhidt All time high date, empty if date is not available
     *
     * @return self
     */
    public function setAlltmhidt($alltmhidt)
    {
        $this->container['alltmhidt'] = $alltmhidt;

        return $this;
    }

    /**
     * Gets alltmlo
     *
     * @return string|null
     */
    public function getAlltmlo()
    {
        return $this->container['alltmlo'];
    }

    /**
     * Sets alltmlo
     *
     * @param string|null $alltmlo All time low
     *
     * @return self
     */
    public function setAlltmlo($alltmlo)
    {
        $this->container['alltmlo'] = $alltmlo;

        return $this;
    }

    /**
     * Gets alltmlodt
     *
     * @return string|null
     */
    public function getAlltmlodt()
    {
        return $this->container['alltmlodt'];
    }

    /**
     * Sets alltmlodt
     *
     * @param string|null $alltmlodt All time low date, empty if date is not available
     *
     * @return self
     */
    public function setAlltmlodt($alltmlodt)
    {
        $this->container['alltmlodt'] = $alltmlodt;

        return $this;
    }

    /**
     * Gets askivfut
     *
     * @return string|null
     */
    public function getAskivfut()
    {
        return $this->container['askivfut'];
    }

    /**
     * Sets askivfut
     *
     * @param string|null $askivfut Ask IV for future
     *
     * @return self
     */
    public function setAskivfut($askivfut)
    {
        $this->container['askivfut'] = $askivfut;

        return $this;
    }

    /**
     * Gets askivspt
     *
     * @return string|null
     */
    public function getAskivspt()
    {
        return $this->container['askivspt'];
    }

    /**
     * Sets askivspt
     *
     * @param string|null $askivspt Ask IV for spot
     *
     * @return self
     */
    public function setAskivspt($askivspt)
    {
        $this->container['askivspt'] = $askivspt;

        return $this;
    }

    /**
     * Gets bidivfut
     *
     * @return string|null
     */
    public function getBidivfut()
    {
        return $this->container['bidivfut'];
    }

    /**
     * Sets bidivfut
     *
     * @param string|null $bidivfut Bid IV for future
     *
     * @return self
     */
    public function setBidivfut($bidivfut)
    {
        $this->container['bidivfut'] = $bidivfut;

        return $this;
    }

    /**
     * Gets bidivspt
     *
     * @return string|null
     */
    public function getBidivspt()
    {
        return $this->container['bidivspt'];
    }

    /**
     * Sets bidivspt
     *
     * @param string|null $bidivspt Bid IV for spot
     *
     * @return self
     */
    public function setBidivspt($bidivspt)
    {
        $this->container['bidivspt'] = $bidivspt;

        return $this;
    }

    /**
     * Gets ltpivfut
     *
     * @return string|null
     */
    public function getLtpivfut()
    {
        return $this->container['ltpivfut'];
    }

    /**
     * Sets ltpivfut
     *
     * @param string|null $ltpivfut Bid IV for future
     *
     * @return self
     */
    public function setLtpivfut($ltpivfut)
    {
        $this->container['ltpivfut'] = $ltpivfut;

        return $this;
    }

    /**
     * Gets ltpivspt
     *
     * @return string|null
     */
    public function getLtpivspt()
    {
        return $this->container['ltpivspt'];
    }

    /**
     * Sets ltpivspt
     *
     * @param string|null $ltpivspt Bid IV for spot
     *
     * @return self
     */
    public function setLtpivspt($ltpivspt)
    {
        $this->container['ltpivspt'] = $ltpivspt;

        return $this;
    }

    /**
     * Gets nt_trd_val
     *
     * @return string|null
     */
    public function getNtTrdVal()
    {
        return $this->container['nt_trd_val'];
    }

    /**
     * Sets nt_trd_val
     *
     * @param string|null $nt_trd_val Total traded value
     *
     * @return self
     */
    public function setNtTrdVal($nt_trd_val)
    {
        $this->container['nt_trd_val'] = $nt_trd_val;

        return $this;
    }

    /**
     * Gets mns
     *
     * @return string|null
     */
    public function getMns()
    {
        return $this->container['mns'];
    }

    /**
     * Sets mns
     *
     * @param string|null $mns Moneyness Type, note:this field might be null as well i.e the key may not come in the response
     *
     * @return self
     */
    public function setMns($mns)
    {
        $this->container['mns'] = $mns;

        return $this;
    }

    /**
     * Gets is_mtf_enabled
     *
     * @return bool|null
     */
    public function getIsMtfEnabled()
    {
        return $this->container['is_mtf_enabled'];
    }

    /**
     * Sets is_mtf_enabled
     *
     * @param bool|null $is_mtf_enabled MTF flag
     *
     * @return self
     */
    public function setIsMtfEnabled($is_mtf_enabled)
    {
        $this->container['is_mtf_enabled'] = $is_mtf_enabled;

        return $this;
    }

    /**
     * Gets rch_flg
     *
     * @return string|null
     */
    public function getRchFlg()
    {
        return $this->container['rch_flg'];
    }

    /**
     * Sets rch_flg
     *
     * @param string|null $rch_flg Research Flag
     *
     * @return self
     */
    public function setRchFlg($rch_flg)
    {
        $this->container['rch_flg'] = $rch_flg;

        return $this;
    }

    /**
     * Gets nws_flg
     *
     * @return string|null
     */
    public function getNwsFlg()
    {
        return $this->container['nws_flg'];
    }

    /**
     * Sets nws_flg
     *
     * @param string|null $nws_flg News Flag
     *
     * @return self
     */
    public function setNwsFlg($nws_flg)
    {
        $this->container['nws_flg'] = $nws_flg;

        return $this;
    }

    /**
     * Gets rl_ovr_cst
     *
     * @return string|null
     */
    public function getRlOvrCst()
    {
        return $this->container['rl_ovr_cst'];
    }

    /**
     * Sets rl_ovr_cst
     *
     * @param string|null $rl_ovr_cst Roll Over Cost , can be null
     *
     * @return self
     */
    public function setRlOvrCst($rl_ovr_cst)
    {
        $this->container['rl_ovr_cst'] = $rl_ovr_cst;

        return $this;
    }

    /**
     * Gets rl_ovr_cst_prc
     *
     * @return string|null
     */
    public function getRlOvrCstPrc()
    {
        return $this->container['rl_ovr_cst_prc'];
    }

    /**
     * Sets rl_ovr_cst_prc
     *
     * @param string|null $rl_ovr_cst_prc Roll Over Cost Percentage, can be null
     *
     * @return self
     */
    public function setRlOvrCstPrc($rl_ovr_cst_prc)
    {
        $this->container['rl_ovr_cst_prc'] = $rl_ovr_cst_prc;

        return $this;
    }

    /**
     * Gets rl_ovr_prc
     *
     * @return string|null
     */
    public function getRlOvrPrc()
    {
        return $this->container['rl_ovr_prc'];
    }

    /**
     * Sets rl_ovr_prc
     *
     * @param string|null $rl_ovr_prc Roll Over Percentage, can be null
     *
     * @return self
     */
    public function setRlOvrPrc($rl_ovr_prc)
    {
        $this->container['rl_ovr_prc'] = $rl_ovr_prc;

        return $this;
    }

    /**
     * Gets bta
     *
     * @return string|null
     */
    public function getBta()
    {
        return $this->container['bta'];
    }

    /**
     * Sets bta
     *
     * @param string|null $bta Beta Value, can be null
     *
     * @return self
     */
    public function setBta($bta)
    {
        $this->container['bta'] = $bta;

        return $this;
    }

    /**
     * Gets pe
     *
     * @return string|null
     */
    public function getPe()
    {
        return $this->container['pe'];
    }

    /**
     * Sets pe
     *
     * @param string|null $pe PE value for for Equity, can be null
     *
     * @return self
     */
    public function setPe($pe)
    {
        $this->container['pe'] = $pe;

        return $this;
    }

    /**
     * Gets mkt_cap
     *
     * @return string|null
     */
    public function getMktCap()
    {
        return $this->container['mkt_cap'];
    }

    /**
     * Sets mkt_cap
     *
     * @param string|null $mkt_cap Market Cap value for Equity, can be null
     *
     * @return self
     */
    public function setMktCap($mkt_cap)
    {
        $this->container['mkt_cap'] = $mkt_cap;

        return $this;
    }

    /**
     * Gets delta
     *
     * @return string|null
     */
    public function getDelta()
    {
        return $this->container['delta'];
    }

    /**
     * Sets delta
     *
     * @param string|null $delta delta
     *
     * @return self
     */
    public function setDelta($delta)
    {
        $this->container['delta'] = $delta;

        return $this;
    }

    /**
     * Gets gamma
     *
     * @return string|null
     */
    public function getGamma()
    {
        return $this->container['gamma'];
    }

    /**
     * Sets gamma
     *
     * @param string|null $gamma gamma
     *
     * @return self
     */
    public function setGamma($gamma)
    {
        $this->container['gamma'] = $gamma;

        return $this;
    }

    /**
     * Gets theta
     *
     * @return string|null
     */
    public function getTheta()
    {
        return $this->container['theta'];
    }

    /**
     * Sets theta
     *
     * @param string|null $theta theta
     *
     * @return self
     */
    public function setTheta($theta)
    {
        $this->container['theta'] = $theta;

        return $this;
    }

    /**
     * Gets vega
     *
     * @return string|null
     */
    public function getVega()
    {
        return $this->container['vega'];
    }

    /**
     * Sets vega
     *
     * @param string|null $vega vega
     *
     * @return self
     */
    public function setVega($vega)
    {
        $this->container['vega'] = $vega;

        return $this;
    }

    /**
     * Gets idx_fut_trd_sym
     *
     * @return string|null
     */
    public function getIdxFutTrdSym()
    {
        return $this->container['idx_fut_trd_sym'];
    }

    /**
     * Sets idx_fut_trd_sym
     *
     * @param string|null $idx_fut_trd_sym Nifty future's nearest expiry trading symbol
     *
     * @return self
     */
    public function setIdxFutTrdSym($idx_fut_trd_sym)
    {
        $this->container['idx_fut_trd_sym'] = $idx_fut_trd_sym;

        return $this;
    }

    /**
     * Gets dp_val
     *
     * @return string|null
     */
    public function getDpVal()
    {
        return $this->container['dp_val'];
    }

    /**
     * Sets dp_val
     *
     * @param string|null $dp_val DP Value --> Original symbol-name
     *
     * @return self
     */
    public function setDpVal($dp_val)
    {
        $this->container['dp_val'] = $dp_val;

        return $this;
    }

    /**
     * Gets pcr
     *
     * @return string|null
     */
    public function getPcr()
    {
        return $this->container['pcr'];
    }

    /**
     * Sets pcr
     *
     * @param string|null $pcr PC Ratio
     *
     * @return self
     */
    public function setPcr($pcr)
    {
        $this->container['pcr'] = $pcr;

        return $this;
    }

    /**
     * Gets pd_val
     *
     * @return string|null
     */
    public function getPdVal()
    {
        return $this->container['pd_val'];
    }

    /**
     * Sets pd_val
     *
     * @param string|null $pd_val Prem/Disc Value
     *
     * @return self
     */
    public function setPdVal($pd_val)
    {
        $this->container['pd_val'] = $pd_val;

        return $this;
    }

    /**
     * Gets bas
     *
     * @return string|null
     */
    public function getBas()
    {
        return $this->container['bas'];
    }

    /**
     * Sets bas
     *
     * @param string|null $bas Prem/Disc
     *
     * @return self
     */
    public function setBas($bas)
    {
        $this->container['bas'] = $bas;

        return $this;
    }

    /**
     * Gets isin
     *
     * @return string|null
     */
    public function getIsin()
    {
        return $this->container['isin'];
    }

    /**
     * Sets isin
     *
     * @param string|null $isin ISIN
     *
     * @return self
     */
    public function setIsin($isin)
    {
        $this->container['isin'] = $isin;

        return $this;
    }

    /**
     * Gets as_sym
     *
     * @return string|null
     */
    public function getAsSym()
    {
        return $this->container['as_sym'];
    }

    /**
     * Sets as_sym
     *
     * @param string|null $as_sym Assosiative Symbol
     *
     * @return self
     */
    public function setAsSym($as_sym)
    {
        $this->container['as_sym'] = $as_sym;

        return $this;
    }

    /**
     * Gets as_exc
     *
     * @return string|null
     */
    public function getAsExc()
    {
        return $this->container['as_exc'];
    }

    /**
     * Sets as_exc
     *
     * @param string|null $as_exc Assosiative Exchange
     *
     * @return self
     */
    public function setAsExc($as_exc)
    {
        $this->container['as_exc'] = $as_exc;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


