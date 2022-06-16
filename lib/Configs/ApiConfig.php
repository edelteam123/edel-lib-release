<?php

namespace com\edel\Configs;

class ApiConfig
{
    private $iniFilePath;
    private $iniConfig;
    private $basePathContent;
    private $constants;

    const AUTHORIZATION = "Authorization";
    const APPIDKEY = "AppIdKey";

    public function __construct($iniFilePath, $constants)
    {
        $this->iniConfig = parse_ini_file($iniFilePath);
        $this->iniFilePath = $iniFilePath;
        $this->basePathContent = $this->iniConfig['BasePathContent'];
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
                'val' => $this->constants->getJSessionId()
            ]
        ];
    }
}
