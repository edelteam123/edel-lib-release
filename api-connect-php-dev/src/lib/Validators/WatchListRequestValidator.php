<?php

namespace com\apiconnect\Validators;

use com\apiconnect\Exceptions\ValidationException;
use Rakit\Validation\Validation;
use Rakit\Validation\Validator;

class WatchListRequestValidator extends Validator
{
    private $data;
    private $isSymbol;
    private $isGroupRename;

    public function __construct($data, $isSymbol = false, $isGroupRename = false)
    {
        $this->data = $data;
        $this->isSymbol = $isSymbol;
        $this->isGroupRename = $isGroupRename;
        $this->registerBaseValidators();
    }

    public function validateData()
    {
        $validate = $this->watchListReqValidate();
        if ($validate->fails())
            throw new ValidationException(json_encode($validate->errors()->firstOfAll()));
    }

    /**
     * watchListReqValidate
     *
     * @return Validation
     */
    private function watchListReqValidate(): Validation
    {
        $rules = ['groupName' => "required"];

        if ($this->isSymbol) {
            $rules = ['groupName' => "required", 'symbols' => "required"];
        }

        if ($this->isGroupRename) {
            $rules = ['groupName' => "required", 'newGroupName' => "required"];
        }

        return $this->validate($this->data, $rules);
    }
}
