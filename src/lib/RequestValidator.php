<?php

namespace com\edel;

use Rakit\Validation\Validator;

class RequestValidator extends Validator
{
    public function placeTradeReqValidate($data)
    {
        return $this->validate($data, [
            'trdSym' => 'required',
            'qty' => 'required|integer',
            'sym' => 'required',
            'lmPrc' => 'required',
            'trgPrc' => 'required',
            'ordSrc' => 'required',
        ]);
    }

    public function placeCoverTradeReqValidate($data)
    {
        return $this->validate($data, [
            'trdSym' => 'required',
            'qty' => 'required|integer',
            'sym' => 'required',
            'lmPrc' => 'required',
            'trgPrc' => 'required',
            'ordSrc' => 'required',
        ]);
    }

    public function placeGtcGtdTradeReqValidate($data)
    {
        return $this->validate($data, [
            'exc' => 'required',
            'action' => 'required',
            'dur' => 'required',
            'ordTyp' => 'required',
            'trdSym' => 'required',
            'qty' => 'required|integer',
            'lmPrc' => 'required',
        ]);
    }

    public function modifyTradeReqValidate($data)
    {
        return $this->validate($data, [
            'trdSym' => 'required',
            'qty' => 'required|integer',
            'exc' => 'required',
            'action' => 'required',
            'dur' => 'required',
            'flQty' => 'required',
            'ordTyp' => 'required',
            'lmPrc' => 'required',
            'trgPrc' => 'required',
            'nstOID' => 'required'
        ]);
    }

    public function modifyCoverTradeReqValidate($data)
    {
        return $this->validate($data, [
            'trdSym' => 'required',
            'qty' => 'required|integer',
            'exc' => 'required',
            'action' => 'required',
            'dur' => 'required',
            'flQty' => 'required',
            'qty' => 'required|integer',
            'sym' => 'required',
            'lmPrc' => 'required',
            'trgPrc' => 'required',
            'nstOID' => 'required'
        ]);
    }

    public function cancelTradeReqValidate($data)
    {
        return $this->validate($data, [
            'nstOID' => 'required'
        ]);
    }

    public function exitCoverTradeReqValidate($data)
    {
        return $this->validate($data, [
            'nstOID' => 'required'
        ]);
    }

    public function exitBracketTradeReqValidate($data)
    {
        return $this->validate($data, [
            'nstOrdNo' => 'required',
            'syomID' => 'required',
            'sts' => 'required'
        ]);
    }

    public function placeBracketTradeReqValidate($data)
    {
        return $this->validate($data, [
            'qty' => 'required|integer',
            'sym' => 'required',
            'prc' => 'required',
            'trnsTyp' => 'required',
            'sqOffBsdOn' => 'required',
            'sqOffVal' => 'required',
            'slBsdOn' => 'required',
            'slVal' => 'required',
            'trlSl' => 'required',
            'trlSlVal' => 'required',
            'ordSrc' => 'required'
        ]);
    }

    public function placeAmoTradeReqValidate($data)
    {
        return $this->validate($data, [
            'trdSym' => 'required',
            'qty' => 'required|integer',
            'sym' => 'required',
            'lmPrc' => 'required',
            'trgPrc' => 'required',
            'ordSrc' => 'required',
        ]);
    }

    public function modifyAmoTradeReqValidate($data)
    {
        return $this->validate($data, [
            'trdSym' => 'required',
            'qty' => 'required|integer',
            'sym' => 'required',
            'lmPrc' => 'required',
            'trgPrc' => 'required',
            'nstOID' => 'required'
        ]);
    }

    public function cancelAmoTradeReqValidate($data)
    {
        return $this->validate($data, [
            'nstOID' => 'required'
        ]);
    }

    public function convertPositionReqValidate($data)
    {
        return $this->validate($data, [
            'nstOID' => 'required',
            'flID' => 'required'
        ]);
    }

    public function orderHistoryReqValidate($data)
    {
        return $this->validate($data, [
            'startDate' => "date:m/d/Y",
            'endDate' => "date:m/d/Y"
        ]);
    }
}
