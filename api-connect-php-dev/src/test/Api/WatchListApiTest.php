<?php


namespace com\apiconnect\Test\Api;

use PHPUnit\Framework\TestCase;
use com\apiconnect\ApiConnect;
use com\apiconnect\Exceptions\ValidationException;

/**
 * WatchListApiTest Class Doc Comment
 *
 * @category Class
 * @package  com\apiconnect
 * @author   Edelweiss
 * @link     https://www.edelweiss.in
 */
class WatchListApiTest extends BaseApiTest
{
    /**
     * testWatchListGroups
     *
     * @return void
     */
    public function testWatchListGroups()
    {
        $result = json_decode($this->apiConnect->getWatchlistGroups(), true);
        $this->assertNotEmpty($result['data']);
        $this->assertIsArray($result['data']);
        print_r(json_encode($result));
    }

    public function testWatchListScrips()
    {
        $groupName = "WedGroup2";
        $result = json_decode($this->apiConnect->getWatchlistScrips($groupName), true);
        $this->assertNotEmpty($result['data']);
        $this->assertIsArray($result['data']);
        print_r(json_encode($result));
    }

    public function testCreateGroup()
    {
        $groupName = "ThursdayGroup7";
        $symbols = [
            "11872_NSE",
            "1902_CDS"
        ];
        $result = json_decode($this->apiConnect->createWatchlistGroup($groupName, $symbols), true);
        $this->assertNotEmpty($result['data']);
        $this->assertIsArray($result['data']);
        print_r(json_encode($result));
    }

    public function testAddSymbols()
    {
        $groupName = "ThursdayGroup7";
        $symbols = [
            "11872_NSE",
            "1902_CDS"
        ];
        $result = json_decode($this->apiConnect->addSymbolsWatchlist($groupName, $symbols), true);
        $this->assertNotEmpty($result['data']);
        $this->assertIsArray($result['data']);
        print_r(json_encode($result));
    }

    public function testDeleteSymbols()
    {
        $groupName = "ThursdayGroup7";
        $symbols = [
            "11872_NSE",
            "1902_CDS"
        ];
        $result = json_decode($this->apiConnect->deleteSymbolsWatchlist($groupName, $symbols), true);
        $this->assertNotEmpty($result['data']);
        $this->assertIsArray($result['data']);
        print_r(json_encode($result));
    }

    public function testDeleteGroups()
    {
        $groupName = ["ThursdayGroup7"];
        $result = json_decode($this->apiConnect->deleteWatchlistGroups($groupName), true);
        $this->assertNotEmpty($result['data']);
        $this->assertIsArray($result['data']);
        print_r(json_encode($result));
    }

    public function testRenameGroup()
    {
        $groupName = "MarketWatch";
        $newGroupName = "MarketWatchTest";

        $result = json_decode($this->apiConnect->renameWatchlistGroup($groupName, $newGroupName), true);
        $this->assertNotEmpty($result['data']);
        $this->assertIsArray($result['data']);
        print_r(json_encode($result));
    }
}
