<?php

namespace com\apiconnect\Resources;

use com\apiconnect\Helper;
use JsonSerializable;
use stdClass;

/**
 * LiveNewsResponse
 */
class LiveNewsResponse implements JsonSerializable
{
    private $response;
    private $category;
    private $responseType;
    private $isHoldings;
    private $isResultAndStock;
    private $errorMsg;
    private $reqBody;
    private $userSpecificStock;

    public function __construct($response, $body, $isHoldings = false, $isResultAndStock = false, $userSpecificStock)
    {
        $this->response = json_decode($response, true);
        $this->category = $isResultAndStock ? '' : $body->inclCategory;
        $this->isHoldings = $isHoldings;
        $this->isResultAndStock = $isResultAndStock;
        $this->reqBody = $body;
        $this->userSpecificStock = $userSpecificStock;
        $this->responseType = $isResultAndStock  ? 'groupResponse' : 'listResponse';
        if ($isResultAndStock && $isHoldings)
            $this->responseType = 'listResponse';
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function toArray(): array
    {
        $data = new stdClass;
        $data->content = $this->formatLiveNewsResponse($this->response);
        $data->first = $this->response['data'][$this->responseType]['first'];
        $data->last =  $this->response['data'][$this->responseType]['last'];
        $data->number =  $this->response['data'][$this->responseType]['number'];
        $data->size = $this->response['data'][$this->responseType]['size'];
        $data->totalElements = $this->response['data'][$this->responseType]['totalElements'];
        $data->totalPages = $this->response['data'][$this->responseType]['totalPages'];

        if (!empty($this->errorMsg))
            $data->msg = $this->errorMsg;

        $finalResponseData =  [
            'msgID' => $this->response['msgID'],
            'srvTm' => $this->response['srvTm'],
            'data' => $data,
        ];

        return $finalResponseData;
    }

    private function formatLiveNewsResponse()
    {
        if (!empty($this->category) && !$this->isResultAndStock && $this->isHoldings) {
            if (isset($this->userSpecificStock) && !empty($this->userSpecificStock) && $this->userSpecificStock->dpNm != 'All') {
                $this->category = $this->userSpecificStock->inc;
                $filteredData = Helper::filterDataBasedOnSpecificKeyValue($this->response['data'][$this->responseType]['content'], 'category', $this->category, true);
                if (count($filteredData) == 0) {
                    $cat = is_array($this->category) ? implode(", ", $this->category) : $this->category;
                    $this->errorMsg = "There are no news available for $cat for page " . $this->reqBody->page . " Please try in other pages.";
                    return [];
                }
                return $filteredData;
            }
        }

        if ($this->isResultAndStock && $this->isHoldings) {
            $filteredData = Helper::filterDataBasedOnSpecificKeyValue($this->response['data']['listResponse']['content'], 'category', ['Result', 'STOCK_IN_NEWS'], true);
            if (count($filteredData) == 0) {
                $cat = is_array($this->category) ? implode(", ", $this->category) : $this->category;
                $this->errorMsg = "There are no news available for $cat for page " . $this->reqBody->page . " Please try in other pages.";
                return [];
            }
            return $filteredData;
        }

        return $this->response['data'][$this->responseType]['content'];
    }
}
