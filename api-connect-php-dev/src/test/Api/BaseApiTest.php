<?php

namespace com\apiconnect\Test\Api;

use com\apiconnect\ApiConnect;
use PHPUnit\Framework\TestCase;

class BaseApiTest extends TestCase
{
    protected static $iniConfig;
    protected $requestId;
    protected $apiKey;
    protected $password;
    protected $dContract;
    protected $settingsFilePathl;
    protected $apiConnect;
    
    /**
     * setUpBeforeClass
     *
     * @return void
     */
    public static function setUpBeforeClass(): void
    {
        self::$iniConfig = parse_ini_file("C:\\xampp\\htdocs\\api-connect-php\\src\\test\\CsvTestSuite\\config.ini");
    }

    /**
     * Setup before running any test cases
     */
    public function setUp(): void
    {
        $this->requestId = self::$iniConfig['RequestId'];
        $this->apiKey = self::$iniConfig['ApiKey'];
        $this->password = self::$iniConfig['Password'];
        $this->dContract = self::$iniConfig['Contract'];
        $this->settingsFilePath = self::$iniConfig['SettingsFilePath'];
        $this->apiConnect = new ApiConnect($this->apiKey, $this->password, $this->requestId, $this->dContract, $this->settingsFilePath);
    }
}
