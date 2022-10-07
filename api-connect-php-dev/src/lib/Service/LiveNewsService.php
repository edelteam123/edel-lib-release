<?php

namespace com\apiconnect\Service;

use com\apiconnect\apiconnect\api\EquityHoldingsNewsApi;
use com\apiconnect\apiconnect\api\LiveNewsCommonBaseApi;
use com\apiconnect\Exceptions\ValidationException;
use com\apiconnect\Helper;
use com\apiconnect\Resources\LiveNewsCategoriesResponseFormatter;
use stdClass;
use com\apiconnect\apiconnect\api\EventsResourceApi;
use com\apiconnect\ApiException;

class LiveNewsService
{
    private $loginData;
    private $fileName;
    private $newsCategories;
    private $config;
    private $apiConfig;

    const NG_UI_TYPE = "NG";

    public function __construct($loginData, $fileName, $config, $apiConfig)
    {
        $this->loginData = $loginData;
        $this->fileName = $fileName;
        $this->config = $config;
        $this->apiConfig = $apiConfig;
    }

    /**
     * getNewsCategoriesResult
     *
     * @return array
     */
    private function getNewsCategoriesResult(): array
    {
        $newsCategories = [];
        if (file_exists($this->fileName)) {
            $obj = $this->loginData;
            if (isset($obj['newsCategories'])) {
                $newsCategories = (array) $obj['newsCategories'];
            } else {
                $newsCategories = (new LiveNewsCommonBaseApi(null, $this->config, $this->apiConfig->liveNewsAPIConfig()))->getAllCategoriesData();
                $obj['newsCategories'] = $newsCategories;
                file_put_contents($this->fileName, json_encode($obj));
                $newsCategories = json_decode(json_encode($newsCategories));
            }
        }

        return is_object($newsCategories) ? (array) $newsCategories : $newsCategories;
    }

    /**
     * filterCategories
     *
     * @return string
     */
    private function filterNewsCategories(): string
    {
        $excludeCat = ['Results', 'Stocks in News', 'My Holdings'];
        $decodedNewsCat = json_decode($this->newsCategories);
        $decodedNewsCat->data =
            array_values(
                array_filter(
                    $decodedNewsCat->data,
                    function ($key) use ($excludeCat) {
                        return !in_array($key, $excludeCat);
                    }
                )
            );

        return json_encode($decodedNewsCat);
    }

    /**
     * filterNewsCategoriesForSpecificData
     *
     * @param  mixed $cat
     * @return void
     */
    private function filterNewsCategoriesForSpecificData($cat)
    {
        $decodedNewsCat = json_decode($this->newsCategories);
        $categoriesLst = [];
        foreach ($decodedNewsCat->data as $val) {
            if (is_array($val)) {
                foreach ($val as $v) {
                    if (property_exists($v, 'dpNm') && in_array($v->dpNm, $cat)) {
                        array_push($categoriesLst, $v);
                    }
                }
            }
        }
        return reset($categoriesLst);
    }

    /**
     * getRequestBodyForNewsGeneralAPI
     *
     * @param  mixed $data
     * @param  mixed $pgNum
     * @return void
     */
    private function getReqBodyForHoldingsAndGeneralNewsAPI($data, $searchText, $pgNum, $isSpecialCat = false): stdClass
    {
        if (empty($data)) {
            throw new ApiException('Data not found for given category', 500);
        }

        $body = new stdClass;
        $body->exclCategory = $isSpecialCat ? [] : $data->exc;
        $body->validRequest = $isSpecialCat ? false : $data->lgrq;
        $body->inclCategory = $isSpecialCat ? [$data->cat] : $data->inc;
        $body->page = $pgNum;
        $body->group = $isSpecialCat ? self::NG_UI_TYPE : $data->uiTyp;
        $body->searchText = $searchText;

        return $body;
    }

    /**
     * getNewsCategories
     *
     * @return string
     */
    public function getNewsCategories(): string
    {
        $this->newsCategories = json_encode(new LiveNewsCategoriesResponseFormatter($this->getNewsCategoriesResult()));
        return $this->filterNewsCategories();
    }

    /**
     * getNewsGeneralData
     *
     * @param  mixed $category
     * @param  mixed $searchText
     * @param  mixed $pgNum
     * @return string
     */
    public function getNewsGeneralData($category, $searchText, $pgNum): array
    {
        if (empty($category)) {
            throw new ValidationException("Category Is Required");
        }
        $this->newsCategories = json_encode($this->getNewsCategoriesResult());

        if ($this->checkForCategoryAndGetReqBodyData([$category])) {
            $body = $this->getReqBodyForHoldingsAndGeneralNewsAPI($this->filterNewsCategoriesForSpecificData([$category]), $searchText, $pgNum, true);
        } else {
            $body = $this->getReqBodyForHoldingsAndGeneralNewsAPI($this->filterNewsCategoriesForSpecificData([$category]), $searchText, $pgNum);
        }
        $result = (new LiveNewsCommonBaseApi(null, $this->config, $this->apiConfig->liveNewsAPIConfig()))->getNews($body);
        return array(json_encode($result), $body);
    }

    /**
     * getEqHoldings
     *
     * @param  mixed $body
     * @param  mixed $pgNum
     * @return array
     */
    public function getEqHoldings($searchText, $pgNum, $category = ''): array
    {
        $this->newsCategories = json_encode($this->getNewsCategoriesResult());
        $body = $this->getReqBodyForHoldingsAndGeneralNewsAPI($this->filterNewsCategoriesForSpecificData(["My Holdings"]), $searchText, $pgNum);
        $userSpecifiedCategory = !empty($category) ? $this->filterNewsCategoriesForSpecificData([$category]) : [];
        $result = (new EquityHoldingsNewsApi(null, $this->config, $this->apiConfig->equityHoldingsAPIConfig()))->getEqHoldingNews($body);
        return array(json_encode($result), $body, $userSpecifiedCategory);
    }

    /**
     * getLatestCorporateActions
     *
     * @param  mixed $symbol
     * @return void
     */
    public function getLatestCorporateActions($symbol)
    {
        $result = (new EventsResourceApi(null, $this->config, $this->apiConfig->liveNewsAPIConfig()))->getLatestCorpAct($symbol);
        return json_encode($result);
    }

    /**
     * checkForCategoryAndGetReqBodyData
     *
     * @param  mixed $category
     * @return bool
     */
    private function checkForCategoryAndGetReqBodyData($category): bool
    {
        $decodedNewsCat = json_decode($this->newsCategories);
        if (array_key_exists('ctLst', $decodedNewsCat->data)) {
            foreach ($decodedNewsCat->data->ctLst as $v) {
                if (property_exists($v, 'cat') && in_array($v->dpNm, $category)) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * getNewsForResultsAndStocks
     *
     * @param  mixed $searchText
     * @param  mixed $pgNum
     * @return array
     */
    public function getNewsForResultsAndStocks($searchText, $pgNum): array
    {
        $this->newsCategories = json_encode($this->getNewsCategoriesResult());
        $body = $this->getReqBodyForResultsAndStocks($searchText, $pgNum);
        $result = (new LiveNewsCommonBaseApi(null, $this->config, $this->apiConfig->liveNewsAPIConfig()))->getNews($body);
        return array(json_encode($result), $body);
    }

    /**
     * getReqBodyForResultsAndStocks
     *
     * @param  mixed $searchText
     * @param  mixed $pgNum
     * @return void
     */
    private function getReqBodyForResultsAndStocks($searchText, $pgNum)
    {
        $body = new stdClass;
        $body->exclCategory = [];
        $body->validRequest = false;
        $body->inclCategory = ["Result", "STOCK_IN_NEWS"];
        $body->page = $pgNum;
        $body->group = 'G';
        $body->searchText = $searchText;

        return $body;
    }
}
