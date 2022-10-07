<?php


namespace com\apiconnect\Test\Api;

use PHPUnit\Framework\TestCase;
use com\apiconnect\ApiConnect;

/**
 * LiveNewsApiTest Class Doc Comment
 *
 * @category Class
 * @package  com\apiconnect
 * @author   Edelweiss
 * @link     https://www.edelweiss.in
 */
class LiveNewsApiTest extends TestCase
{
    private static $apiInstance;

    /**
     * Setup before running any test cases
     */
    public static function setUpBeforeClass(): void
    {
        static::$apiInstance = new ApiConnect('GREEN23', 'abc123', '663136e1988162b2', true, 'Settings.ini');
    }

    public function testNewsCategories()
    {
        $result = json_decode(static::$apiInstance->getNewsCategories());
        $this->assertNotEmpty($result->data);
        $this->assertIsArray($result->data);
        print_r($result);
    }

    public function testLiveNews()
    {
        $category = "Equity";
        $holdings = true;
        $searchText = '';
        $fromDate = '';
        $pgNum = 0;
        $result = json_decode(static::$apiInstance->getLiveNews($category, $holdings, $searchText, $fromDate, $pgNum));
        $this->assertNotEmpty($result->data);
        $this->assertIsObject($result->data);
        print_r($result);
    }

    public function testLatestCorporateActions()
    {
        $symbol = "14977_NSE";
        $result = json_decode(static::$apiInstance->getLatestCorporateActions($symbol));
        $this->assertNotEmpty($result->data);
        $this->assertIsObject($result->data);
        print_r($result);
    }

    public function testResultAndStocks()
    {
        $holdings = false;
        $pgNum = 0;
        $result = json_decode(static::$apiInstance->getNewsForResultsAndStocks($holdings,'','',$pgNum));
        $this->assertNotEmpty($result->data);
        $this->assertIsObject($result->data);
        print_r($result);
    }
}
