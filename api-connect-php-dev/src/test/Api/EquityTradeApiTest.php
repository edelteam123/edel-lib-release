<?php

/**
 * EquityTradeApiTest
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

use \com\apiconnect\Configuration;
use \com\apiconnect\ApiException;
use \com\apiconnect\ObjectSerializer;
use PHPUnit\Framework\TestCase;
use com\apiconnect\ApiConnect;
use com\apiconnect\Feed;

/**
 * EquityTradeApiTest Class Doc Comment
 *
 * @category Class
 * @package  com\apiconnect
 * @author   Edelweiss
 * @link     https://www.edelweiss.in
 */
class EquityTradeApiTest extends TestCase
{
    /**
     * Test case for convertPositionValVndr
     *
     * Convert a position for a client.
     *
     */
    public function testConvertPositionValVndr()
    {
        $this->apiInstance = new ApiConnect('60000072', 'abc123', '353564b3209fccdb', true, 'Settings.ini');
        $orderId = '210826000000108';
        $fillId = '50065343';
        $newProductCode = 'MIS';
        $oldProductCode = 'CNC';
        $exchange = 'NSE';
        $orderType = 'MARKET';

        $result = $this->apiInstance->ConvertPosition($orderId, $fillId, $newProductCode, $oldProductCode, $exchange, $orderType);
        $this->assertEquals('PositionConversion Successful', $result['eq']['data']['msg']);
    }

    /**
     * Test case for coverTrade
     *
     * Place  trade for a client in equity.
     *
     */
    public function testCoverTrade()
    {
        $this->apiInstance = new ApiConnect('testAPI027', 'abc123', '313267e13df21490', true, 'Settings.ini');
        $tradingSymbol = "ACCITD";
        $exchange = "NSE";
        $action = "BUY";
        $duration = "DAY";
        $orderType = "MARKET";
        $quantity = "1";
        $streamingSymbol = "7053_NSE";
        $limitPrice = "1220.50";
        $disclosedQuantity = "0";
        $triggerPrice = "1220.50";
        $productCode = "CNC";

        $result = $this->apiInstance->placeCoverTrade(
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
        $this->assertEquals('Your Cover order has been placed successfully!.', $result['eq']['data']['msg']);
    }

    /**
     * Test case for exitCoverTrade
     *
     * Exits from cover trade for a client in equity.
     *
     */
    public function testExitCoverTrade()
    {
        $this->apiInstance = new ApiConnect('testAPI025', 'abc123', '333467b0ddcbc9f2', true, 'Settings.ini');
        $orderId = '210826000000079';

        $result = $this->apiInstance->ExitCoverTrade($orderId);
        $this->assertEquals('Your order has been exit succesfully!.', $result['eq']['data']['msg']);
    }

    /**
     * Test case for getAMOFlag
     *
     * Get AMO Flag.
     *
     */
    public function testGetAMOFlag()
    {
        $this->apiInstance = new ApiConnect('testAPI027', 'abc123', '353338e045ae7b50', true, 'Settings.ini');
        $result = $this->apiInstance->GetAMOStxatus();
        $this->assertEquals(true, $result['eq']['data']['sts']);
    }



    /**
     * Test case for modifyCoverTrade
     *
     * Modify a Cover Trade for a client.
     *
     */
    public function testModifyCoverTrade()
    {
        $this->apiInstance = new ApiConnect('testAPI025', 'abc123', '333467b0ddcbc9f2', true, 'Settings.ini');
        $tradingSymbol = 'SWEENE';
        $exchange = 'NSE';
        $action = 'SELL';
        $duration = 'DAY';
        $orderType = "MARKET";
        $quantity = '1';
        $streamingSymbol = "11909_NSE";
        $limitPrice = "200.0";
        $disclosedQuantity = "0";
        $triggerPrice = "0";
        $productCode = "CNC";
        $orderId = '210826000000102';


        $result = $this->apiInstance->ModifyCoverTrade(
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
            $productCode,
            $orderId
        );
        $this->assertEquals('Your order has been modify succesfully!.', $result['eq']['data']['msg']);
    }


    /**
     * Test case for placeAMOTrade
     *
     * Place AMO trade for a client in equity.
     *
     */
    public function testPlaceAMOTrade()
    {
        $this->apiInstance = new ApiConnect('testAPI027', 'abc123', '313762b34689cc0a', true, 'Settings.ini');
        $tradingSymbol = 'VRLLOG';
        $exchange = 'NSE';
        $action = 'BUY';
        $duration = 'DAY';
        $orderType = 'LIMIT';
        $quantity = '1';
        $streamingSymbol = '8696_NSE';
        $limitPrice = '167.70';
        $disclosedQuantity = '';
        $triggerPrice = '';
        $productCode = "CNC";

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
        $this->assertEquals('Your AMO order has been placed succesfully!.', $result['eq']['data']['msg']);
    }
    /**
     * Test case for modifyAMOTrade
     *
     * Modify amo Trade for a client.
     * 
     */
    public function testModifyAMOTrade()
    {
        $this->apiInstance = new ApiConnect('testAPI025', 'abc123', '333467b0ddcbc9f2', true, 'Settings.ini');

        $TradingSymbol = 'KOLPAT';
        $Exchange = 'NSE';
        $Action = 'SELL';
        $Duration = 'DAY';
        $OrderType = 'MARKET';
        $Quantity = '1';
        $StreamingSymbol = '15124_NSE';
        $LimitPrice = '';
        $DisclosedQuantity = '';
        $TriggerPrice = '';
        $ProductCode = "CNC";
        $OrderID = '210826000000080';

        $result = $this->apiInstance->ModifyAMOTrade(
            $TradingSymbol,
            $Exchange,
            $Action,
            $Duration,
            $OrderType,
            $Quantity,
            $StreamingSymbol,
            $LimitPrice,
            $OrderID,
            $DisclosedQuantity,
            $TriggerPrice,
            $ProductCode
        );
        $this->assertEquals('Your order has been modify succesfully!.', $result['eq']['data']['msg']);
    }

    /**
     * Test case for cancelAMOTrade
     *
     * Cancel AMO trade for a client in equity.
     *
     */
    public function testCancelAMOTrade()
    {
        $this->apiInstance = new ApiConnect('testAPI025', 'abc123', '333467b0ddcbc9f2', true, 'Settings.ini');
        $orderId = '210826000000080';
        $exchange = 'NSE';
        $orderType = 'MARKET';
        $productCode = 'CNC';
        $result = $this->apiInstance->CancelAMOTrade($orderId, $exchange, $orderType, $productCode);
        $this->assertEquals('Your order has been cancel succesfully!.', $result['eq']['data']['msg']);
    }

    /**
     * Test case for placeBasketOrder
     *
     * Place Basket Order.
     *
     */
    public function testPlaceBasketOrder()
    {
        $this->apiInstance = new ApiConnect('testAPI025', 'abc123', '333467b0ddcbc9f2', true, 'Settings.ini');

        $body['ordLst'] = array(
            array(
                "exc" => "NSE",
                "trdSym" => "TATCHE",
                "action" => "BUY",
                "prdCode" => "CNC",
                "ordTyp" => "LIMIT",
                "dur" => "DAY",
                "price" => "306",
                "trgPrc" => "306",
                "qty" => "2",
                "dscQty" => "1",
                "gtdDt" => "NA",
                "rmk" => "UserRemarksTesting"
            ),
            array(
                "exc" => "NSE",
                "trdSym" => "ACCITD",
                "action" => "BUY",
                "prdCode" => "CNC",
                "ordTyp" => "LIMIT",
                "dur" => "DAY",
                "price" => "1220.50",
                "trgPrc" => "1220.50",
                "qty" => "2",
                "dscQty" => "1",
                "gtdDt" => "NA",
                "rmk" => ""
            )
        );
        $body['vnCode'] = '118';
        $body['ordSrc'] = 'EMT3';
        $result = $this->apiInstance->PlaceBasketTrade($body);
        $this->assertEquals('Your order has been placed succesfully!.', $result['eq']['data']['msg']);
    }

    /**
     * Test case for placeBracketOrder
     *
     * Bracket Place  trade for a client in equity.
     *
     */
    public function testPlaceBracketOrder()
    {
        $this->apiInstance = new ApiConnect('testAPI025', 'abc123', '333467b0ddcbc9f2', true, 'Settings.ini');
        $Exchange = 'BSE';
        $StreamingSymbol = 'TRICOMFRU';
        $TransactionType = 'BUY';
        $Quantity = '10';
        $Duration = 'DAY';
        $DisclosedQuantity = '0';
        $LimitPrice = '100';
        $Target = '5';
        $StopLoss = '1';
        $TrailingStopLoss = "Y";
        $TrailingStopLossValue = "1";

        $result = $this->apiInstance->PlaceBracketTrade(
            $Exchange,
            $StreamingSymbol,
            $TransactionType,
            $Quantity,
            $Duration,
            $DisclosedQuantity,
            $LimitPrice,
            $Target,
            $StopLoss,
            $TrailingStopLoss,
            $TrailingStopLossValue
        );
        $this->assertEquals('Your order has been placed succesfully!.', $result['eq']['data']['msg']);
    }

    /**
     * Test case for placeGtcGtdTrade
     *
     * Place gtd/gtc  trade for a client in equity.
     *
     */
    public function testPlaceGtcGtdTrade()
    {
        $this->apiInstance = new ApiConnect('testAPI025', 'abc123', '333467b0ddcbc9f2', true, 'Settings.ini');
        $tradingSymbol = 'ACCITD';
        $exchange = 'NSE';
        $action = 'BUY';
        $duration = 'GTC';
        $orderType = 'LIMIT';
        $quantity = "1";
        $limitPrice = '1220.50';
        $productCode = 'NRML';
        $streamingSymbol = "";

        $result = $this->apiInstance->placeGtcGtdTrade(
            $tradingSymbol,
            $exchange,
            $action,
            $duration,
            $orderType,
            $quantity,
            $limitPrice,
            $productCode,
            $streamingSymbol
        );
        $this->assertEquals('Your order has been placed succesfully!.', $result['eq']['data']['msg']);
    }

    /**
     * Test case for placeTrade
     *
     * Place  trade for a client in equity.
     *
     */
    public function testPlaceTrade()
    {
        $this->apiInstance = new ApiConnect('60000072', 'abc123', '323731e4f3245c24', true, 'Settings.ini');

        $tradingSymbol = "ICIBAN";
        $exchange = "NSE";
        $action = "BUY";
        $duration = "DAY";
        $orderType = "MARKET";
        $quantity = '1';
        $streamingSymbol = "ICICIBANK";
        $limitPrice = "0";
        $disclosedQuantity = "0";
        $triggerPrice = "0";
        $productCode = "CNC";

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
        $this->assertEquals('Your order has been placed succesfully!.', $result['eq']['data']['msg']);
    }

    /**
     * Test case for modifyTrade
     *
     * Modify a Trade for a client.
     *
     */
    public function testModifyTrade()
    {
        $this->apiInstance = new ApiConnect('60000072', 'abc123', '366238b3101e6002', true, 'Settings.ini');
        $tradingSymbol = 'SWEENE';
        $exchange = 'NSE';
        $action = 'SELL';
        $duration = 'DAY';
        $orderType = 'MARKET';
        $quantity = '1';
        $limitPrice = '200.00';
        $disclosedQuantity = "0";
        $triggerPrice = "0";
        $productCode = "CNC";
        $orderId = '210826000000085';

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
     * Test case for cancelTradeV1
     *
     * Cancel  trade for a client in equity.
     *
     */
    public function testCancelTradeV1()
    {
        $this->apiInstance = new ApiConnect('testAPI025', 'abc123', '333467b0ddcbc9f2', true, 'Settings.ini');

        $orderId = '210826000000085';
        $exchange = 'NSE';
        $orderType = 'LIMIT';
        $productCode = 'MIS';
        $result = $this->apiInstance->CancelTrade($orderId, $exchange, $orderType, $productCode);
        $this->assertEquals('Your order has been cancelled succesfully!.', $result['eq']['data']['msg']);
    }

    /**
     * Test case for positionSquareOff
     *
     * Position squareOff API For Equity/Commodity.
     *
     */
    public function testPositionSquareOff()
    {
        $this->apiInstance = new ApiConnect('testAPI027', 'abc123', '643237b52afdff39', true, 'Settings.ini');
        $body = array(array(
            "trdSym" => "APOTYR",
            "exc" => "NSE",
            "action" => "SELL",
            "dur" => "DAY",
            "flQty" => "0",
            "ordTyp" => "MARKET",
            "qty" => "1",
            "dscQty" => "0",
            "sym" => "163_NSE",
            "mktPro" => "",
            "lmPrc" => "0",
            "trgPrc" => "0",
            "prdCode" => "CNC",
            "dtDays" => null,
            "posSqr" => "",
            "minQty" => "0",
            "ordSrc" => "TX3",
            "vnCode" => "",
            "rmk" => ""
        ));

        $result = $this->apiInstance->PositionSquareOff($body);
        $this->assertEquals('Your order has been placed succesfully!.', $result['eq']['data']['posSqrOffs'][0]['msg']);
    }
    /**
     * Test case for exitBracketTrade
     *
     * To Exit a Bracket trade for a client in equity.
     *
     */
    public function testExitBracketTrade()
    {
        $this->apiInstance = new ApiConnect('testAPI025', 'abc123', '333467b0ddcbc9f2', true, 'Settings.ini');

        $orderId = '210826000000083';
        $syomId = '68767';
        $status = 'PENDING';

        $result = $this->apiInstance->ExitBracketTrade($orderId, $syomId, $status);
        $this->assertEquals('Your order has been cancelled succesfully!.', $result['eq']['data']['msg']);
    }
}
