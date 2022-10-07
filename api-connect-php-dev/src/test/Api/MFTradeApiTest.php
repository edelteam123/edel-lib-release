<?php

/**
 * MFTradeApiTest
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
 * MFTradeApiTest Class Doc Comment
 *
 * @category Class
 * @package  com\apiconnect
 * @author   Edelweiss
 * @link     https://www.edelweiss.in
 */
class MFTradeApiTest extends TestCase
{

  /**
   * Setup before running any test cases
   */
  public static function setUpBeforeClass(): void
  {
  }

  /**
   * Setup before running each test case
   */
  public function setUp(): void
  {
  }

  /**
   * Clean up after running each test case
   */
  public function tearDown(): void
  {
  }

  /**
   * Clean up after running all test cases
   */
  public static function tearDownAfterClass(): void
  {
  }

  /**
   * Test case for modifyTradeMF
   *
   * Modify/Cancel order Method.
   *
   */
  public function testModifyTradeMF()
  {
    $apiInstance = new ApiConnect('testAPI028', 'abc123', '353866de7a5e5575', true, 'Settings.ini');
    $token = "16378";
    $ISINCode = "INF084M01AB8";
    $transactionType = "FP";
    $clientCode = "";
    $quantity = 0;
    $amount = "100";
    $reInvFlag = "Z";
    $folioNumber = '';
    $schemeName = "ADITYA BIRLA SUN LIFE BALANCED ADVANTAGE FUND - GROWTH OPTION";
    $startDate = "";
    $endDate = "";
    $SIPFrequency = "";
    $generateFirstOrderToday = "";
    $schemePlan = "";
    $schemeCode = "";
    $transactionId = "755759";
    $mandateId = "";

    $result = $apiInstance->ModifyMF($token, $ISINCode, $transactionType, $clientCode, $quantity, $amount, $reInvFlag, $folioNumber, $schemeName, $startDate, $endDate, $SIPFrequency, $generateFirstOrderToday, $schemePlan, $schemeCode, $transactionId, $mandateId);

    print_r($result);
  }
  public function testCancelTradeMF()
  {
    $apiInstance = new ApiConnect('testAPI028', 'abc123', '353866de7a5e5575', true, 'Settings.ini');
    $token = "16378";
    $ISINCode = "INF084M01AB8";
    $transactionType = "FP";
    $clientCode = "";
    $quantity = 0;
    $amount = "100";
    $reInvFlag = "Z";
    $folioNumber = '';
    $schemeName = "ADITYA BIRLA SUN LIFE BALANCED ADVANTAGE FUND - GROWTH OPTION";
    $startDate = "";
    $endDate = "";
    $SIPFrequency = "";
    $generateFirstOrderToday = "";
    $schemePlan = "";
    $schemeCode = "";
    $transactionId = "755759";

    $result = $apiInstance->CancelMF($token, $ISINCode, $transactionType, $clientCode, $quantity, $amount, $reInvFlag, $folioNumber, $schemeName, $startDate, $endDate, $SIPFrequency, $generateFirstOrderToday, $schemePlan, $schemeCode, $transactionId);

    print_r($result);
  }
  /**
   * Test case for placeTradeMF
   *
   * Place trade Method.
   *
   */
  public function testPlaceTradeMF()
  {
    $token = "16378";
    $ISINCode = "INF084M01AB8";
    $transactionType = "FP";
    $clientCode = "";
    $quantity = 0;
    $amount = "100";
    $reInvFlag = "Z";
    $folioNumber = '';
    $schemeName = "ADITYA BIRLA SUN LIFE BALANCED ADVANTAGE FUND - GROWTH OPTION";
    $startDate = "";
    $endDate = "";
    $SIPFrequency = "";
    $generateFirstOrderToday = "";
    $schemePlan = "";
    $schemeCode = "";
    $mandateId = "";
    $apiInstance = new ApiConnect('60000072', 'abc123', '633232e41a5cccd5', true, 'Settings.ini');
    $result = $apiInstance->PlaceMF($token, $ISINCode, $transactionType, $clientCode, $quantity, $amount, $reInvFlag, $folioNumber, $schemeName, $startDate, $endDate, $SIPFrequency, $generateFirstOrderToday, $schemePlan, $schemeCode, $mandateId);
    $this->assertNotEmpty($result['data']['ordNo']);
  }
}
