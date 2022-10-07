<?php

namespace com\apiconnect\Service;

use com\apiconnect\ApiException;
use com\apiconnect\apiconnect\api\WatchListContentApi;

class WatchListService
{
    private $config;
    private $apiConfig;
    private $accountId;
    private $accountType;
    private $profileId;

    public function __construct($config, $apiConfig, $constants)
    {
        $this->config = $config;
        $this->apiConfig = $apiConfig;
        $this->accountType = $constants->getAccTyp();
        $this->accountId = $constants->getEqAccId();
        $this->profileId = $constants->getProfileId();
        if ($this->accountType == 'CO')
            $this->accountId = $this->constants->getCoAccId();
    }

    /**
     * getWatchlistGroups
     *
     * @return void
     */
    public function getWatchlistGroups()
    {
        return (new WatchListContentApi(null, $this->config, $this->apiConfig->watchListApiConfig()))
            ->getGroups($this->accountId, $this->accountType, $this->profileId);
    }

    /**
     * getWatchlistScrips
     *
     * @param  mixed $groupName
     * @return void
     */
    public function getWatchlistScrips($groupName)
    {
        return (new WatchListContentApi(null, $this->config, $this->apiConfig->watchListApiConfig()))
            ->getSymbols($this->accountId, $this->accountType, $this->profileId, $groupName);
    }

    /**
     * createGroup
     *
     * @param  mixed $groupName
     * @param  mixed $symbols
     * @return void
     */
    public function createGroup($groupName, $symbols)
    {
        $requestBody = [
            "accId" => $this->accountId,
            "accTyp" => $this->accountType,
            "prfId" => $this->profileId,
            "grpNm" => $groupName,
            "symLst" => $symbols
        ];
        return (new WatchListContentApi(null, $this->config, $this->apiConfig->watchListApiConfig()))
            ->createGroup($groupName, $requestBody);
    }

    /**
     * addSymbols
     *
     * @param  mixed $groupName
     * @param  mixed $symbols
     * @return void
     */
    public function addSymbols($groupName, $symbols)
    {
        $dateTime = date('Y-m-d H:i:s');
        $currentUnixTimeStamp  = strtotime($dateTime);
        $requestBody = [
            "accId" => $this->accountId,
            "accTyp" => $this->accountType,
            "act" => "add",
            "grpNm" => $groupName,
            "symLst" => $symbols,
            "updatedOn" => $currentUnixTimeStamp
        ];
        return (new WatchListContentApi(null, $this->config, $this->apiConfig->watchListApiConfig()))
            ->updateGroup($groupName, $requestBody);
    }

    /**
     * deleteSymbols
     *
     * @param  mixed $groupName
     * @param  mixed $symbols
     * @return void
     */
    public function deleteSymbols($groupName, $symbols)
    {
        $dateTime = date('Y-m-d H:i:s');
        $currentUnixTimeStamp  = strtotime($dateTime);
        $requestBody = [
            "accId" => $this->accountId,
            "accTyp" => $this->accountType,
            "act" => "del",
            "grpNm" => $groupName,
            "symLst" => $symbols,
            "updatedOn" => $currentUnixTimeStamp
        ];
        return (new WatchListContentApi(null, $this->config, $this->apiConfig->watchListApiConfig()))
            ->deleteGroup($groupName, $requestBody);
    }

    /**
     * deleteGroups
     *
     * @param  mixed $groupNames
     * @return void
     */
    public function deleteGroups($groupNames)
    {
        $requestBody = [
            "accId" => $this->accountId,
            "accTyp" => $this->accountType,
            "prfId" => $this->profileId,
            "delGrp" => $groupNames
        ];

        return (new WatchListContentApi(null, $this->config, $this->apiConfig->watchListApiConfig()))
            ->deleteGroups($requestBody);
    }

    /**
     * renameGroup
     *
     * @param  mixed $groupName
     * @param  mixed $newGroupName
     * @return void
     */
    public function renameGroup($groupName, $newGroupName)
    {
        $oldSymbols = [];
        $oldSymbolsGroupRes = $this->getWatchlistScrips($groupName);

        if (empty($oldSymbolsGroupRes['data']['sy_lst'])) {
            throw new ApiException('Unable to fetch any scrips for the given group');
        }

        $symbolsList = $oldSymbolsGroupRes['data']['sy_lst'];
        foreach ($symbolsList as $symbols) {
            array_push($oldSymbols, $symbols['sym']);
        }

        $dateTime = date('Y-m-d H:i:s');
        $currentUnixTimeStamp  = strtotime($dateTime);
        $requestBody = [
            "accId" => $this->accountId,
            "accTyp" => $this->accountType,
            "act" => "modify",
            "grpNm" => $groupName,
            "newGrpNm" => $newGroupName,
            "symLst" => $oldSymbols,
            "updatedOn" => $currentUnixTimeStamp
        ];
        return (new WatchListContentApi(null, $this->config, $this->apiConfig->watchListApiConfig()))
            ->renameGroup($groupName, $requestBody);
    }
}
