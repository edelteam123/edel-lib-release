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
class ChartsIntradayApiTest extends TestCase
{
    private static $apiInstance;

    /**
     * Setup before running any test cases
     */
    public static function setUpBeforeClass(): void
    {
        static::$apiInstance = new ApiConnect('60000072', 'abc123', '366234b1a87fb53d', true, 'Settings.ini');
    }

    /**
     * Test case for getRMSLimits
     *
     * To get RMSLimits for a particular client.
     */
    public function testChartIntraday()
    {
        $exc = "NSE";
        $aTyp = "EQUITY";
        $symbol = "11423_NSE";
        $interval = "M1";
        $includeContinuousFuture = false;
        $tillDate = "2021-12-29";

        $result = json_decode(static::$apiInstance->getIntradayChart($interval, $aTyp, $symbol, $exc, $tillDate, $includeContinuousFuture), true);
        $this->assertNotEmpty($result['data']);
        $this->assertIsArray($result['data']);

        print_r(json_encode($result));
    }

    public function testIntradayIfExchangeIsNull(): void
    {
        $this->checkForExceptionAndMessage(ValidationException::class, "/\The Exc is required\b/");

        $exc = null;
        $aTyp = "EQUITY";
        $symbol = "11423_NSE";
        $interval = "M1";

        static::$apiInstance->getIntradayChart($interval, $aTyp, $symbol, $exc);
    }

    public function testIntradayIfAssetTypeIsNull(): void
    {
        $this->checkForExceptionAndMessage(ValidationException::class, "/\The ATyp is required\b/");

        $exc = "NSE";
        $aTyp = null;
        $symbol = "11423_NSE";
        $interval = "M1";

        static::$apiInstance->getIntradayChart($interval, $aTyp, $symbol, $exc);
    }

    public function testIntradayIfStreamingSymbolIsNull(): void
    {
        $this->checkForExceptionAndMessage(ValidationException::class, "/\The Symbol is required\b/");

        $exc = "NSE";
        $aTyp = "EQUITY";
        $symbol = null;
        $interval = "M1";

        static::$apiInstance->getIntradayChart($interval, $aTyp, $symbol, $exc);
    }

    public function testIntradayIfIntervalIsNull(): void
    {
        $this->checkForExceptionAndMessage(ValidationException::class, "/\The Interval is required\b/");

        $exc = "NSE";
        $aTyp = "EQUITY";
        $symbol = "11423_NSE";
        $interval = null;

        static::$apiInstance->getIntradayChart($interval, $aTyp, $symbol, $exc);
    }

    public function testIntradayIfExchangeIsWrong()
    {
        $this->checkForExceptionAndMessage(ValidationException::class, "*\\ballows\\b*");

        $exc = "NSES";
        $aTyp = "EQUITY";
        $symbol = "11423_NSE";
        $interval = "M1";

        static::$apiInstance->getIntradayChart($interval, $aTyp, $symbol, $exc);
    }

    public function testIntradayIfAssetTypeIsWrong()
    {
        $this->checkForExceptionAndMessage(ValidationException::class, "*\\ballows\\b*");

        $exc = "NSE";
        $aTyp = "EQUITYS";
        $symbol = "11423_NSE";
        $interval = "M1";

        static::$apiInstance->getIntradayChart($interval, $aTyp, $symbol, $exc);
    }

    public function testIntradayIfIntervalTypeIsWrong()
    {
        $this->checkForExceptionAndMessage(ValidationException::class, "*\\ballows\\b*");
        $exc = "NSE";
        $aTyp = "EQUITY";
        $symbol = "11423_NSE";
        $interval = "M12";

        static::$apiInstance->getIntradayChart($interval, $aTyp, $symbol, $exc);
    }

    public function testIntradayIfFromDateFormatIsWrong()
    {
        $this->checkForExceptionAndMessage(ValidationException::class, "/\The FromDate is not valid date format\b/");

        $exc = "NSE";
        $aTyp = "EQUITY";
        $symbol = "11423_NSE";
        $interval = "M1";
        $tillDate = "2021-12-29";
        static::$apiInstance->getIntradayChart($interval, $aTyp, $symbol, $exc, $tillDate);
    }

    public function testIntradayIftoDateFormatIsWrong()
    {
        $this->checkForExceptionAndMessage(ValidationException::class, "/\The ToDate is not valid date format\b/");

        $exc = "NSE";
        $aTyp = "EQUITY";
        $symbol = "11423_NSE";
        $interval = "M1";
        $tillDate = "2021-12-29";
        static::$apiInstance->getIntradayChart($interval, $aTyp, $symbol, $exc, $tillDate);
    }

    private function checkForExceptionAndMessage($exceptionClass, $message)
    {
        $this->expectException($exceptionClass);
        $this->expectExceptionMessageMatches($message);
    }
}
