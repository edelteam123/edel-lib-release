<?php

namespace com\apiconnect\Service;

use com\apiconnect\apiconnect\api\ResearchCallsApi;

class ResearchCallsService
{
    private $config;
    private $apiConfig;


    public function __construct($config, $apiConfig)
    {
        $this->config = $config;
        $this->apiConfig = $apiConfig;
    }

    public function getActiveResearchCalls($segment, $term, $marketCap)
    {
        $response = (new ResearchCallsApi(null, $this->config, $this->apiConfig->researchCallsAPIConfig()))->getAllActiveCalls($segment, $term);
        if (!empty($marketCap)) {
            return $this->sortCallsByMarketCap($response, $marketCap);
        }
        return $response;
    }

    public function getClosedResearchCalls($segment, $term, $action, $fromDate, $toDate, $recommendationType, $marketCap)
    {
        $response =  (new ResearchCallsApi(null, $this->config, $this->apiConfig->researchCallsAPIConfig()))->getClosedCalls($segment, $term, $action, $fromDate, $toDate, $recommendationType);
        if (!empty($marketCap)) {
            return $this->sortCallsByMarketCap($response, $marketCap);
        }
        return $response;
    }

    private function sortCallsByMarketCap($response, $marketCap)
    {
        $filteredCallList = [];
        foreach ($response['data']['lst'] as $callList) {
            if (strtolower($callList['cap']) == strtolower($marketCap)) {
                $filteredCallList[] = $callList;
            }
        }
        $response['data']['lst'] = $filteredCallList;
        return $response;
    }
}
