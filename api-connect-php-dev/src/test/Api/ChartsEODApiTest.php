<?php


namespace com\apiconnect\Test\Api;

use PHPUnit\Framework\TestCase;
use com\apiconnect\ApiConnect;
use com\apiconnect\Exceptions\ValidationException;

/**
 * ChartsApiTest Class Doc Comment
 *
 * @category Class
 * @package  com\apiconnect
 * @author   Edelweiss
 * @link     https://www.edelweiss.in
 */
class ChartsEODApiTest extends TestCase
{
    private static $apiInstance;

    /**
     * Setup before running any test cases
     */
    public static function setUpBeforeClass(): void
    {
        static::$apiInstance = new ApiConnect('60000072', 'abc123', '333138b1804c91c6', true, 'Settings.ini');
    }

    /**
     * Test case for getRMSLimits
     *
     * To get RMSLimits for a particular client.
     */
    public function testChartEOD()
    {
        $exc = "NSE";
        $aTyp = "EQUITY";
        $symbol = "-23";
        $interval = "D1";
        $includeContinuousFuture = false;
        $tillDate = "2015-02-02";

        $result = json_decode(static::$apiInstance->getEODChart($interval, $aTyp, $symbol, $exc, $tillDate, $includeContinuousFuture), true);
        $this->assertNotEmpty($result['data']);
        $this->assertIsArray($result['data']);
        print_r(json_encode($result));
    }

    public function testEODIfExchangeIsNull(): void
    {
        $this->checkForExceptionAndMessage(ValidationException::class, "/\The Exc is required\b/");

        $exc = null;
        $aTyp = "EQUITY";
        $symbol = "11423_NSE";
        $interval = "M1";

        static::$apiInstance->getEODChart($interval, $aTyp, $symbol, $exc);
    }

    public function testEODIfAssetTypeIsNull(): void
    {
        $this->checkForExceptionAndMessage(ValidationException::class, "/\The ATyp is required\b/");

        $exc = "NSE";
        $aTyp = null;
        $symbol = "11423_NSE";
        $interval = "M1";

        static::$apiInstance->getEODChart($interval, $aTyp, $symbol, $exc);
    }

    public function testEODIfStreamingSymbolIsNull(): void
    {
        $this->checkForExceptionAndMessage(ValidationException::class, "/\The Symbol is required\b/");

        $exc = "NSE";
        $aTyp = "EQUITY";
        $symbol = null;
        $interval = "M1";

        static::$apiInstance->getEODChart($interval, $aTyp, $symbol, $exc);
    }

    public function testEODIfIntervalIsNull(): void
    {
        $this->checkForExceptionAndMessage(ValidationException::class, "/\The Interval is required\b/");

        $exc = "NSE";
        $aTyp = "EQUITY";
        $symbol = "11423_NSE";
        $interval = null;

        static::$apiInstance->getEODChart($interval, $aTyp, $symbol, $exc);
    }

    public function testEODIfExchangeIsWrong()
    {
        $this->checkForExceptionAndMessage(ValidationException::class, "*\\ballows\\b*");

        $exc = "NSES";
        $aTyp = "EQUITY";
        $symbol = "11423_NSE";
        $interval = "M1";

        static::$apiInstance->getEODChart($interval, $aTyp, $symbol, $exc);
    }

    public function testEODIfAssetTypeIsWrong()
    {
        $this->checkForExceptionAndMessage(ValidationException::class, "*\\ballows\\b*");

        $exc = "NSE";
        $aTyp = "EQUITYS";
        $symbol = "11423_NSE";
        $interval = "M1";

        static::$apiInstance->getEODChart($interval, $aTyp, $symbol, $exc);
    }

    public function testEODIfIntervalTypeIsWrong()
    {
        $this->checkForExceptionAndMessage(ValidationException::class, "*\\ballows\\b*");
        $exc = "NSE";
        $aTyp = "EQUITY";
        $symbol = "11423_NSE";
        $interval = "M12";

        static::$apiInstance->getEODChart($interval, $aTyp, $symbol, $exc);
    }

    public function testEODIfFromDateFormatIsWrong()
    {
        $this->checkForExceptionAndMessage(ValidationException::class, "/\The FromDate is not valid date format\b/");

        $exc = "NSE";
        $aTyp = "EQUITY";
        $symbol = "11423_NSE";
        $interval = "M1";
        $tillDate = "2015-02-02";

        static::$apiInstance->getEODChart($interval, $aTyp, $symbol, $exc, $tillDate);
    }

    public function testEODIfToDateFormatIsWrong()
    {
        $this->checkForExceptionAndMessage(ValidationException::class, "/\The ToDate is not valid date format\b/");

        $exc = "NSE";
        $aTyp = "EQUITY";
        $symbol = "11423_NSE";
        $interval = "M1";
        $tillDate = "2015-02-02";

        static::$apiInstance->getEODChart($interval, $aTyp, $symbol, $exc, $tillDate);
    }

    private function checkForExceptionAndMessage($exceptionClass, $message)
    {
        $this->expectException($exceptionClass);
        $this->expectExceptionMessageMatches($message);
    }
}
