<?php

namespace com\apiconnect\Validators;

use com\apiconnect\Enums\ActionEnum;
use com\apiconnect\Enums\MarketCapEnum;
use com\apiconnect\Enums\SegmentEnum;
use com\apiconnect\Enums\TermEnum;
use com\apiconnect\Exceptions\ValidationException;
use Rakit\Validation\Validation;
use Rakit\Validation\Validator;

class ResearchCallsReqValidator extends Validator
{
    private $data;
    private $segments;
    private $terms;
    private $marketCap;
    private $actions;

    public function __construct($data)
    {
        $this->data = $data;
        $this->registerBaseValidators();
        $this->prepareEnumsForValidation();
    }

    public function validateData()
    {
        $validate = $this->researchCallsReqValidate();
        if ($validate->fails())
            throw new ValidationException(json_encode($validate->errors()->firstOfAll()));
    }

    private function prepareEnumsForValidation()
    {
        $this->segments = implode(',', SegmentEnum::getSegmentAllowableValues());
        $this->terms = implode(',', TermEnum::getTermAllowableValues());
        $this->marketCap = implode(',', MarketCapEnum::getMarketCapAllowableValues());
        $this->actions = implode(',', ActionEnum::getActionAllowableValues());
    }

    /**
     * researchCallsReqValidate
     *
     * @return Validation
     */
    private function researchCallsReqValidate(): Validation
    {
        return $this->validate($this->data, [
            'segment' => "required|in:$this->segments",
            'term' => "required|in:$this->terms",
            'marketCap' => "in:$this->marketCap",
            'action' => "in:$this->actions",
            'fromDate' => "date:Y-m-d",
            'toDate' => "date:Y-m-d",
        ]);
    }
}
