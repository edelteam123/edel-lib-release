<?php

/**
 * CommodityTradeApiTest
 * PHP version 7.2
 *
 * @category Class
 * @package  com\apiconnect
 * @author   Edelweiss
 * @link     https://www.edelweiss.in
 */

/**
 * Swagger spec for our Equity REST Project - Uat Version
 *
 * This page has details of all the resources related to equity that are a part of the REST API project. You can find request and response of all our APIs. You can try to generate a sample response by using the 'Try now' option as well. All APIs under the REST project have to be called by passing certain Authentication credentials as part of the request header. AppId and AppIdKey are the Authentication credentials that we expect for non logged in APIs whereas the logged in section will continue to accept JSESSIONID as a part of the cookie. We are working on it. Watch this space for any updates on the same.
 *
 * The version of the document: v1
 */

/**
 * Please update the test case below to test the endpoint.
 */

namespace com\apiconnect\Test\Api;

use PHPUnit\Framework\TestCase;
use com\apiconnect\ApiConnect;

/**
 * CommodityTradeApiTest Class Doc Comment
 *
 * @category Class
 * @package  com\apiconnect
 * @author   Edelweiss
 * @link     https://www.edelweiss.in
 */
class CommodityTradeApiTest extends TestCase
{
    /**
     * Test case for cancelAMOTradeCommodity
     *
     * Cancel a trade for a client.
     *
     */
    public function testCancelAMOTradeCommodity()
    {
        $this->apiInstance = new ApiConnect('testAPI124', 'abc123', '663966ae063083da', true, 'Settings.ini');

        $orderId = '210826000000002';
        $exchange = 'MCX';
        $orderType = 'LIMIT';
        $productCode = 'NRML';
        $result = $this->apiInstance->CancelAMOTrade($orderId, $exchange, $orderType, $productCode);
        $this->assertEquals('Your AMO order has been cancelled succesfully!.', $result['co']['data']['msg']);
    }

    /**
     * Test case for cancelTradeValVndr
     *
     * Cancel a trade for a client.
     *
     */
    public function testCancelTradeValVndr()
    {
        $this->apiInstance = new ApiConnect('testAPI124', 'abc123', '663966ae063083da', true, 'Settings.ini');

        $orderId = '210826000000002';
        $exchange = 'MCX';
        $orderType = 'LIMIT';
        $productCode = 'NRML';
        $result = $this->apiInstance->CancelTrade($orderId, $exchange, $orderType, $productCode);
        $this->assertEquals('Your order has been cancelled succesfully!.', $result['eq']['data']['msg']);
    }

    /**
     * Test case for convertPositionCommodity
     *
     * Convert a position for a client.
     *
     */
    public function testConvertPositionCommodity()
    {

        $this->apiInstance = new ApiConnect('testAPI124', 'abc123', '663966ae063083da', true, 'Settings.ini');
        $Order_Id = '210826000000004';
        $trdID = '4';
        $New_Product_Code = 'MIS';
        $Old_Product_Code = 'NRML';
        $Exchange = 'MCX';
        $orderType = 'LIMIT';

        $result = $this->apiInstance->ConvertPosition($Order_Id, $trdID, $New_Product_Code, $Old_Product_Code, $Exchange, $orderType);
        $this->assertEquals('PositionConversion Successful', $result['co']['data']['msg']);
    }

    /**
     * Test case for getAMOFlagCommodity
     *
     * Get AMO Flag.
     *
     */
    public function testGetAMOFlagCommodity()
    {
        $this->apiInstance = new ApiConnect('testAPI124', 'abc123', '396235b25a67160d', true, 'Settings.ini');
        $result = $this->apiInstance->GetAMOStxatus();
        $this->assertEquals('true', $result['eq']['data']['sts']);
    }

    /**
     * Test case for modifyAMOTradeCommodity
     *
     * Modify a Trade for a client.
     *
     */
    public function testModifyAMOTradeCommodity()
    {
        $this->apiInstance = new ApiConnect('testAPI124', 'abc123', '663966ae063083da', true, 'Settings.ini');


        $tradingSymbol = 'GOLDM21SEPFUT';
        $exchange = 'MCX';
        $action = 'BUY';
        $duration = 'DAY';
        $orderType = 'LIMIT';
        $quantity = '2';
        $streamingSymbol = '229650_MCX';
        $limitPrice = '45999.00';
        $disclosedQuantity = '';
        $triggerPrice = '';
        $productCode = "NRML";
        $orderID = '210826000000001';

        $result = $this->apiInstance->ModifyAMOTrade(
            $tradingSymbol,
            $exchange,
            $action,
            $duration,
            $orderType,
            $quantity,
            $streamingSymbol,
            $limitPrice,
            $orderID,
            $disclosedQuantity,
            $triggerPrice,
            $productCode
        );
        $this->assertEquals('Your AMO order has been modified succesfully!.', $result['co']['data']['msg']);
    }

    /**
     * Test case for modifyTradeCommodity
     *
     * Modify a Trade for a client.
     *
     */
    public function testModifyTradeCommodity()
    {

        $this->apiInstance = new ApiConnect('testAPI124', 'abc123', '663966ae063083da', true, 'Settings.ini');
        $tradingSymbol = 'ALUMINIUM21AUGFUT';
        $exchange = 'MCX';
        $action = 'BUY';
        $duration = 'DAY';
        $orderType = 'LIMIT';
        $quantity = '15';
        $limitPrice = '205.20';
        $disclosedQuantity = "0";
        $triggerPrice = "0";
        $productCode = "NRML";
        $orderId = '210826000000002';

        $result = $this->apiInstance->ModifyTrade(
            $tradingSymbol,
            $exchange,
            $action,
            $duration,
            $orderType,
            $quantity,
            $limitPrice,
            $disclosedQuantity,
            $triggerPrice,
            $productCode,
            $orderId
        );
        $this->assertEquals('Your order has been modified succesfully!.', $result['eq']['data']['msg']);
    }

    /**
     * Test case for placeAMOTradeCommodity
     *
     * Place a Trade for a client.
     *
     */
    public function testPlaceAMOTradeCommodity()
    {
        $this->apiInstance = new ApiConnect('testAPI124', 'abc123', '663966ae063083da', true, 'Settings.ini');

        $tradingSymbol = 'GOLDM21SEPFUT';
        $exchange = 'MCX';
        $action = 'BUY';
        $duration = 'DAY';
        $orderType = 'LIMIT';
        $quantity = '1';
        $streamingSymbol = '229650_MCX';
        $limitPrice = '45999.00';
        $disclosedQuantity = '';
        $triggerPrice = '';
        $productCode = "NRML";

        $result = $this->apiInstance->PlaceAMOTrade(
            $tradingSymbol,
            $exchange,
            $action,
            $duration,
            $orderType,
            $quantity,
            $streamingSymbol,
            $limitPrice,
            $disclosedQuantity,
            $triggerPrice,
            $productCode
        );
        $this->assertEquals('Your order has been placed succesfully!.', $result['co']['data']['msg']);
    }

    /**
     * Test case for placeTradeCommodity
     *
     * Place a Trade for a client.
     *
     */
    public function testPlaceTradeCommodity()
    {
        $this->apiInstance = new ApiConnect('testAPI124', 'abc123', '643967afab18772a', true, 'Settings.ini');

        $tradingSymbol = "ALUMINIUM21AUGFUT";
        $exchange = "MCX";
        $action = "SELL";
        $duration = "DAY";
        $orderType = "LIMIT";
        $quantity = '10';
        $streamingSymbol = "228848_MCX";
        $limitPrice = "205.10";
        $disclosedQuantity = "0";
        $triggerPrice = "0";
        $productCode = "NRML";

        $result = $this->apiInstance->PlaceTrade(
            $tradingSymbol,
            $exchange,
            $action,
            $duration,
            $orderType,
            $quantity,
            $streamingSymbol,
            $limitPrice,
            $disclosedQuantity,
            $triggerPrice,
            $productCode
        );
        $this->assertEquals('Your order has been placed succesfully!.', $result['co']['data']['msg']);
    }
    /**
     * Test case for testPlaceGtcGtdTradeCommodity
     *
     * Place a GtcGtd Trade for a client.
     *
     */
    public function testPlaceGtcGtdTradeCommodity()
    {
        $this->apiInstance = new ApiConnect('testAPI124', 'abc123', '396235b25a67160d', true, 'Settings.ini');

        $TradingSymbol = "ALUMINIUM21AUGFUT";
        $Exchange = "MCX";
        $Action = "BUY";
        $Duration = "GTC";
        $OrderType = "LIMIT";
        $Quantity = '1';
        $StreamingSymbol = "228848_MCX";
        $LimitPrice = "205.80";
        $DisclosedQuantity = "0";
        $TriggerPrice = "0";
        $ProductCode = "MIS";

        $result = $this->apiInstance->PlaceGtcGtdTrade(
            $TradingSymbol,
            $$Exchange,
            $Action,
            $Duration,
            $OrderType,
            $Quantity,
            $LimitPrice,
            $ProductCode,
            $StreamingSymbol
        );
        $this->assertEquals('Your order has been placed succesfully!.', $result['co']['data']['msg']);
    }
}
