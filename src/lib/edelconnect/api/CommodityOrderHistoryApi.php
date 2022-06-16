<?php

/**
 * CommodityOrderHistoryApi
 * PHP version 7.2
 *
 * @category Class
 * @package  com\edel
 * @author   Edelweiss
 * @link     https://www.edelweiss.in
 */

namespace com\edel\edelconnect\api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use com\edel\ApiException;
use com\edel\Configuration;
use com\edel\HeaderSelector;
use com\edel\ObjectSerializer;
use Logger;
use com\edel\LogConfig;

/**
 * CommodityOrderHistoryApi Class Doc Comment
 *
 * @category Class
 * @package  com\edel
 * @author   Edelweiss
 * @link     https://www.edelweiss.in
 */
class CommodityOrderHistoryApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /**
     * @var log 
     */
    protected $log;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
        $logConfig = new LogConfig;
        $iniConfig = parse_ini_file($this->config->getIniFilePath());
        Logger::configure($logConfig->getLogConfig($iniConfig['LogLevel'], $iniConfig['LogFilePath']));
        $this->log = Logger::getRootLogger();
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation getOrderHistory
     *
     * To get Order History in a given time interval for a particular client
     *
     * This oepration contains host(s) defined in the OpenAP spec. Use 'hostIndex' to select the host.
     * URL: https://emtuat.edelweiss.in/edelmw-comm-uat
     *
     * @param  string $userID UserId of the client (required)
     * @param  string $sDt From Date(MM/DD/YYYY) (optional)
     * @param  string $eDt To Date((MM/DD/YYYY) (optional)
     *
     * @throws \com\edel\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \com\edel\edelconnect\models\ComOrderHistoryDao|\com\edel\edelconnect\models\SessionExpired|\com\edel\edelconnect\models\CommonErrorResponse
     */
    public function getOrderHistory($userID, $sDt = null, $eDt = null)
    {
        list($response) = $this->getOrderHistoryWithHttpInfo($userID, $sDt, $eDt);
        return $response;
    }

    /**
     * Operation getOrderHistoryWithHttpInfo
     *
     * To get Order History in a given time interval for a particular client
     *
     * This oepration contains host(s) defined in the OpenAP spec. Use 'hostIndex' to select the host.
     * URL: https://emtuat.edelweiss.in/edelmw-comm-uat
     *
     * @param  string $userID UserId of the client (required)
     * @param  string $sDt From Date(MM/DD/YYYY) (optional)
     * @param  string $eDt To Date((MM/DD/YYYY) (optional)
     *
     * @throws \com\edel\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \com\edel\edelconnect\models\ComOrderHistoryDao|\com\edel\edelconnect\models\SessionExpired|\com\edel\edelconnect\models\CommonErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getOrderHistoryWithHttpInfo($userID, $sDt = null, $eDt = null)
    {
        $request = $this->getOrderHistoryRequest($userID, $sDt, $eDt);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch ($statusCode) {
                case 200:
                    if ('\com\edel\edelconnect\models\ComOrderHistoryDao' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\com\edel\edelconnect\models\ComOrderHistoryDao', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\com\edel\edelconnect\models\SessionExpired' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\com\edel\edelconnect\models\SessionExpired', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                default:
                    if ('\com\edel\edelconnect\models\CommonErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\com\edel\edelconnect\models\CommonErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\com\edel\edelconnect\models\ComOrderHistoryDao';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\com\edel\edelconnect\models\ComOrderHistoryDao',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\com\edel\edelconnect\models\SessionExpired',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\com\edel\edelconnect\models\CommonErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Create request for operation 'getOrderHistory'
     *
     * This oepration contains host(s) defined in the OpenAP spec. Use 'hostIndex' to select the host.
     * URL: https://emtuat.edelweiss.in/edelmw-comm-uat
     *
     * @param  string $userID UserId of the client (required)
     * @param  string $sDt From Date(MM/DD/YYYY) (optional)
     * @param  string $eDt To Date((MM/DD/YYYY) (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getOrderHistoryRequest($userID, $sDt = null, $eDt = null)
    {
        // verify the required parameter 'userID' is set
        if ($userID === null || (is_array($userID) && count($userID) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $userID when calling getOrderHistory'
            );
        }

        $resourcePath = '/comm/orderhistory/{userID}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($sDt !== null) {
            if ('form' === 'form' && is_array($sDt)) {
                foreach ($sDt as $key => $value) {
                    $queryParams[$key] = $value;
                }
            } else {
                $queryParams['sDt'] = $sDt;
            }
        }
        // query params
        if ($eDt !== null) {
            if ('form' === 'form' && is_array($eDt)) {
                foreach ($eDt as $key => $value) {
                    $queryParams[$key] = $value;
                }
            } else {
                $queryParams['eDt'] = $eDt;
            }
        }


        // path params
        if ($userID !== null) {
            $resourcePath = str_replace(
                '{' . 'userID' . '}',
                ObjectSerializer::toPathValue($userID),
                $resourcePath
            );
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers,
            $this->config->getApiKeys()
        );

        $operationHosts = ["https://emtuat.edelweiss.in/edelmw-comm-uat"];
        if ($this->hostIndex < 0 || $this->hostIndex >= sizeof($operationHosts)) {
            throw new \InvalidArgumentException("Invalid index {$this->hostIndex} when selecting the host. Must be less than " . sizeof($operationHosts));
        }
        $operationHost = $operationHosts[$this->hostIndex];

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
