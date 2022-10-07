<?php

namespace com\apiconnect\Validators;

use com\apiconnect\Exceptions\ValidationException;
use Rakit\Validation\Validation;
use Rakit\Validation\Validator;

class LatestCorpActReqValidator extends Validator
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
        $this->registerBaseValidators();
    }

    public function validateData()
    {
        $validate = $this->corpActReqValidate();
        if ($validate->fails())
            throw new ValidationException(json_encode($validate->errors()->firstOfAll()));
    }

    /**
     * corpActReqValidate
     *
     * @return Validation
     */
    private function corpActReqValidate(): Validation
    {
        return $this->validate($this->data, [
            'symbol' => "required",
        ]);
    }
}
