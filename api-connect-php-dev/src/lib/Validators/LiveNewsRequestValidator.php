<?php

namespace com\apiconnect\Validators;

use com\apiconnect\Exceptions\ValidationException;
use Rakit\Validation\Validation;
use Rakit\Validation\Validator;

class LiveNewsRequestValidator extends Validator
{
    const ALLOWED_CATEGORIES_FOR_GENERAL_NEWS = ['All', 'Block Deals', 'Equity', 'Commentary', 'Global', 'Fixed Income', 'Commodities', 'Special Coverage', 'My Holdings', 'Budget'];

    private $data;

    private $isResOrStocks;

    public function __construct($data, $isResOrStocks = false)
    {
        $this->data = $data;
        $this->isResOrStocks = $isResOrStocks;
        $this->registerBaseValidators();
    }

    public function validateData()
    {
        $validate = $this->isResOrStocks ? $this->resultAndStocksNewsReqValidate() : $this->liveNewsReqValidate();
        if ($validate->fails())
            throw new ValidationException(json_encode($validate->errors()->firstOfAll()));
    }

    /**
     * liveNewsReqValidate
     *
     * @return Validation
     */
    private function liveNewsReqValidate(): Validation
    {
        $cat =  implode(',', self::ALLOWED_CATEGORIES_FOR_GENERAL_NEWS);

        return $this->validate($this->data, [
            'cat' => "nullable|in:${cat}",
            'holdings' => "boolean",
            'page' => "integer",
            'frmDt' => "date:Y-m-d\TH:i:s",
        ]);
    }

    /**
     * resultAndStocksNewsReqValidate
     *
     * @return Validation
     */
    private function resultAndStocksNewsReqValidate(): Validation
    {
        return $this->validate($this->data, [
            'holdings' => "boolean",
            'page' => "integer",
            'frmDt' => "date:Y-m-d\TH:i:s",
        ]);
    }
}
