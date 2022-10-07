<?php

namespace com\apiconnect\Configs;

class ApiConfig
{
    private $iniFilePath;
    private $iniConfig;
    private $basePathContent;
    private $basePathEq;
    private $constants;

    const AUTHORIZATION = "Authorization";
    const APPIDKEY = "AppIdKey";

    public function __construct($iniFilePath, $constants)
    {
        $this->iniConfig = parse_ini_file($iniFilePath);
        $this->iniFilePath = $iniFilePath;
        $this->basePathContent = $this->iniConfig['BasePathContent'];
        $this->basePathEq = $this->iniConfig['BasePathEq'];
        $this->constants = $constants;
    }

    /**
     * chartsAPIConfig
     *
     * @return array
     */
    public function chartsAPIConfig(): array
    {
        return [
            'host' => $this->basePathContent,
            'iniFilePath' => $this->iniFilePath,
            'apikey' => [
                'key' => self::APPIDKEY,
                'val' => $this->constants->getAppIdKey()
            ]
        ];
    }

    /**
     * liveNewsAPIConfig
     *
     * @return array
     */
    public function liveNewsAPIConfig(): array
    {
        return [
            'host' => $this->basePathContent,
            'iniFilePath' => $this->iniFilePath,
            'apikey' => [
                'key' => self::APPIDKEY,
                'val' => $this->constants->getAppIdKey()
            ]
        ];
    }

    /**
     * equityHoldingsAPIConfig
     *
     * @return array
     */
    public function equityHoldingsAPIConfig(): array
    {
        return [
            'host' => $this->basePathEq,
            'iniFilePath' => $this->iniFilePath,
            'apikey' => [
                'key' => self::AUTHORIZATION,
                'val' => $this->constants->getJSessionId()
            ]
        ];
    }

    /**
     * researchCallsAPIConfig
     *
     * @return array
     */
    public function researchCallsAPIConfig(): array
    {
        return [
            'host' => $this->basePathContent,
            'iniFilePath' => $this->iniFilePath,
            'apikey' => [
                'key' => self::APPIDKEY,
                'val' => $this->constants->getAppIdKey(),
            ]
        ];
    }

    /**
     * watchListApiConfig
     *
     * @return array
     */
    public function watchListApiConfig(): array
    {
        return [
            'host' => $this->basePathContent,
            'iniFilePath' => $this->iniFilePath,
            'apikey' => [
                'key' => self::APPIDKEY,
                'val' => $this->constants->getAppIdKey()
            ]
        ];
    }
}
