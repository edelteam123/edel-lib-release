<?php

namespace com\apiconnect\Validators;

use com\apiconnect\Enums\AssetTypeEnum;
use com\apiconnect\Enums\ChartExchangeEnum;
use com\apiconnect\Enums\IntradayIntTypeEnum;
use com\apiconnect\Exceptions\ValidationException;
use Rakit\Validation\Validation;
use Rakit\Validation\Validator;

class IntradayRequestValidator extends Validator
{
    private $data;
    private $exchangeTypes;
    private $assetTypes;
    private $intervalTypes;

    public function __construct($data)
    {
        $this->data = $data;
        $this->registerBaseValidators();
        $this->prepareEnumsForValidation();
    }

    public function validateData()
    {
        $validate = $this->intradayReqValidate();
        if ($validate->fails())
            throw new ValidationException(json_encode($validate->errors()->firstOfAll()));
    }

    private function prepareEnumsForValidation()
    {
        $this->exchangeTypes = implode(',', ChartExchangeEnum::getChartExchangeAllowableValues());
        $this->assetTypes = implode(',', AssetTypeEnum::getAssetTypeAllowableValues());
        $this->intervalTypes = implode(',', IntradayIntTypeEnum::getIntTypAllowableValues());
    }

    /**
     * placeTradeReqValidate
     *
     * @return Validation
     */
    private function intradayReqValidate(): Validation
    {
        return $this->validate($this->data, [
            'exc' => "required|in:$this->exchangeTypes",
            'aTyp' => "required|in:$this->assetTypes",
            'symbol' => "required",
            'interval' => "required|in:$this->intervalTypes",
            'ltt' => "date:Y-m-d",
            'includeContinuousFuture' => "boolean"
        ]);
    }
}
