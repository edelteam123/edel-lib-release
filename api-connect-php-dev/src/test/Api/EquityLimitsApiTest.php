<?php

/**
 * EquityLimitsApiTest
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
 * EquityLimitsApiTest Class Doc Comment
 *
 * @category Class
 * @package  com\apiconnect
 * @author   Edelweiss
 * @link     https://www.edelweiss.in
 */
class EquityLimitsApiTest extends TestCase
{
    /**
     * Test case for getSubLimits
     *
     * Retrieving RMSSubLimits for a particular client.
     *
     */
    public function testGetSubLimits()
    {
        $this->apiInstance = new ApiConnect('testAPI024', 'abc123', '663966ae063083da', true, 'Settings.ini');
        $result = $this->apiInstance->Limits();
        $this->assertNotEmpty($result['eq']['data']);
    }
}
