<?php

namespace com\edel\Validators;

use com\edel\Enums\AssetTypeEnum;
use com\edel\Enums\ChartExchangeEnum;
use com\edel\Enums\EODIntTypeEnum;
use com\edel\Exceptions\ValidationException;
use Rakit\Validation\Validation;
use Rakit\Validation\Validator;

class EODRequestValidator extends Validator
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
        $validate = $this->eodReqValidate();
        if ($validate->fails())
            throw new ValidationException(json_encode($validate->errors()->firstOfAll()));
    }

    private function prepareEnumsForValidation()
    {
        $this->exchangeTypes = implode(',', ChartExchangeEnum::getChartExchangeAllowableValues());
        $this->assetTypes = implode(',', AssetTypeEnum::getAssetTypeAllowableValues());
        $this->intervalTypes = implode(',', EODIntTypeEnum::getEODTypAllowableValues());
    }


    private function eodReqValidate(): Validation
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
