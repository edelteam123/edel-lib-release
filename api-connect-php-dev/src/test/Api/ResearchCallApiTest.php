<?php


namespace com\apiconnect\Test\Api;

use PHPUnit\Framework\TestCase;
use com\apiconnect\ApiConnect;

/**
 * ResearchCallApiTest Class Doc Comment
 *
 * @category Class
 * @package  com\apiconnect
 * @author   Edelweiss
 * @link     https://www.edelweiss.in
 */
class ResearchCallApiTest extends TestCase
{
    private static $apiInstance;

    /**
     * Setup before running any test cases
     */
    public static function setUpBeforeClass(): void
    {
        static::$apiInstance = new ApiConnect('GREEN23', 'abc123', '343263e631ad6bb3', true, 'Settings.ini');
    }


    public function testActiveResearchCall()
    {
        $seg = "EQ";
        $term = "LONGTERM";
        $marketCap = "SMALL";
        $result = json_decode(static::$apiInstance->getActiveResearchCalls($seg, $term, $marketCap));

        $this->assertIsObject($result->data);
        $this->assertNotEmpty($result->data);
        print_r(json_encode($result));
    }

    public function testClosedResearchCall()
    {
        $seg = "EQ";
        $term = "LONGTERM";
        $action = "BUY";
        $fromDate = "";
        $toDate = "";
        $recommendationType = "";
        $marketCap = "SMALL";

        $result = json_decode(static::$apiInstance->getClosedResearchCalls($seg, $term, $action, $fromDate, $toDate, $recommendationType, $marketCap), true);
        $this->assertNotEmpty($result['data']);
        $this->assertIsArray($result['data']);
        print_r(json_encode($result));
    }
}
