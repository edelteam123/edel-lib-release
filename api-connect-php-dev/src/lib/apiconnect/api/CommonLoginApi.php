<?php

/**
 * CommonLoginApi
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



namespace com\apiconnect\apiconnect\api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use com\apiconnect\ApiException;
use com\apiconnect\Configuration;
use com\apiconnect\HeaderSelector;
use com\apiconnect\ObjectSerializer;
use Logger;
use com\apiconnect\LogConfig;

/**
 * CommonLoginApi Class Doc Comment
 *
 * @category Class
 * @package  com\apiconnect
 * @author   Edelweiss
 * @link     https://www.edelweiss.in
 */
class CommonLoginApi
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
     * @var log 
     */
    protected $log;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $logConfig = new LogConfig;
        $iniConfig = parse_ini_file($this->config->getIniFilePath());
        Logger::configure($logConfig->getLogConfig($iniConfig['LogLevel'], $iniConfig['LogFilePath']));
        $this->log = Logger::getRootLogger();
    }

    /**
     * Operation endSession
     *
     * logs out user
     *
     * This oepration contains host(s) defined in the OpenAP spec. Use 'hostIndex' to select the host.
     * 
     *
     * @param  string $userID userID (required)
     *
     * @throws \com\apiconnect\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \com\apiconnect\apiconnect\models\LogOutDao|\com\apiconnect\apiconnect\models\CommonErrorResponse
     */
    public function endSession($userID)
    {
        list($response) = $this->endSessionWithHttpInfo($userID);
        return $response;
    }

    /**
     * Operation endSessionWithHttpInfo
     *
     * logs out user
     *
     * This oepration contains host(s) defined in the OpenAP spec. Use 'hostIndex' to select the host.
     * 
     *
     * @param  string $userID (required)
     *
     * @throws \com\apiconnect\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \com\apiconnect\apiconnect\models\LogOutDao|\com\apiconnect\apiconnect\models\CommonErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function endSessionWithHttpInfo($userID)
    {
        $request = $this->endSessionRequest($userID);

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
                    if ('\com\apiconnect\apiconnect\models\LogOutDao' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\com\apiconnect\apiconnect\models\LogOutDao', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                default:
                    if ('\com\apiconnect\apiconnect\models\CommonErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\com\apiconnect\apiconnect\models\CommonErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\com\apiconnect\apiconnect\models\LogOutDao';
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
                        '\com\apiconnect\apiconnect\models\LogOutDao',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\com\apiconnect\apiconnect\models\CommonErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Create request for operation 'endSession'
     *
     * This oepration contains host(s) defined in the OpenAP spec. Use 'hostIndex' to select the host.
     * 
     *
     * @param  string $userID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function endSessionRequest($userID)
    {
        // verify the required parameter 'userID' is set
        if ($userID === null || (is_array($userID) && count($userID) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $userID when calling endSession'
            );
        }

        $resourcePath = '/accounts/{userID}/logout';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

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


        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PUT',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation loginData
     *
     * Returns login data for requested request id
     *
     * This oepration contains host(s) defined in the OpenAP spec. Use 'hostIndex' to select the host.
     * 
     *
     * @param  string $sourceToken key obtained from the generate sesion. (required)
     * @param  string $appIdKey key obtained from the generate sesion. (required)
     * @param  \com\apiconnect\apiconnect\models\LoginAuthDataRequestDto $body body (optional)
     *
     * @throws \com\apiconnect\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \com\apiconnect\apiconnect\models\LoginAuthDataResponse|\com\apiconnect\apiconnect\models\CommonErrorResponse|\com\apiconnect\apiconnect\models\CommonErrorResponse
     */
    public function loginData($sourceToken, $appIdKey, $body = null)
    {
        list($response) = $this->loginDataWithHttpInfo($sourceToken, $appIdKey, $body);
        return $response;
    }

    /**
     * Operation loginDataWithHttpInfo
     *
     * Returns login data for requested request id
     *
     * This oepration contains host(s) defined in the OpenAP spec. Use 'hostIndex' to select the host.
     * 
     *
     * @param  string $sourceToken key obtained from the generate sesion. (required)
     * @param  string $appIdKey key obtained from the generate sesion. (required)
     * @param  \com\apiconnect\apiconnect\models\LoginAuthDataRequestDto $body (optional)
     *
     * @throws \com\apiconnect\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \com\apiconnect\apiconnect\models\LoginAuthDataResponse|\com\apiconnect\apiconnect\models\CommonErrorResponse|\com\apiconnect\apiconnect\models\CommonErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function loginDataWithHttpInfo($sourceToken, $appIdKey, $body = null)
    {
        $request = $this->loginDataRequest($sourceToken, $appIdKey, $body);

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
                    if ('\com\apiconnect\apiconnect\models\LoginAuthDataResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\com\apiconnect\apiconnect\models\LoginAuthDataResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 222:
                    if ('\com\apiconnect\apiconnect\models\CommonErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\com\apiconnect\apiconnect\models\CommonErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                default:
                    if ('\com\apiconnect\apiconnect\models\CommonErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\com\apiconnect\apiconnect\models\CommonErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\com\apiconnect\apiconnect\models\LoginAuthDataResponse';
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
                        '\com\apiconnect\apiconnect\models\LoginAuthDataResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 222:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\com\apiconnect\apiconnect\models\CommonErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\com\apiconnect\apiconnect\models\CommonErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Create request for operation 'loginData'
     *
     * This oepration contains host(s) defined in the OpenAP spec. Use 'hostIndex' to select the host.
     * 
     *
     * @param  string $sourceToken key obtained from the generate sesion. (required)
     * @param  string $appIdKey key obtained from the generate sesion. (required)
     * @param  \com\apiconnect\apiconnect\models\LoginAuthDataRequestDto $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function loginDataRequest($sourceToken, $appIdKey, $body = null)
    {
        // verify the required parameter 'sourceToken' is set
        if ($sourceToken === null || (is_array($sourceToken) && count($sourceToken) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $sourceToken when calling loginData'
            );
        }
        // verify the required parameter 'appIdKey' is set
        if ($appIdKey === null || (is_array($appIdKey) && count($appIdKey) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $appIdKey when calling loginData'
            );
        }

        $resourcePath = '/accounts/logindata';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($sourceToken !== null) {
            $headerParams['SourceToken'] = ObjectSerializer::toHeaderValue($sourceToken);
        }
        // header params
        if ($appIdKey !== null) {
            $headerParams['AppIdKey'] = ObjectSerializer::toHeaderValue($appIdKey);
        }



        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($body)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($body));
            } else {
                $httpBody = $body;
            }
        } elseif (count($formParams) > 0) {
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


        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation validateVendorCrdntials
     *
     * To validate vendor id and password &amp; generate session
     *
     * This oepration contains host(s) defined in the OpenAP spec. Use 'hostIndex' to select the host.
     * 
     *
     * @param  string $vendorID vendor id of the client (api Key) (required)
     * @param  string $source source (required)
     * @param  \com\apiconnect\apiconnect\models\ValidateUidPwdRequest $body body (required)
     *
     * @throws \com\apiconnect\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \com\apiconnect\apiconnect\models\GnrResDao|\com\apiconnect\apiconnect\models\CommonErrorResponse
     */
    public function validateVendorCrdntials($vendorID, $source, $body)
    {
        list($response) = $this->validateVendorCrdntialsWithHttpInfo($vendorID, $source, $body);
        return $response;
    }

    /**
     * Operation validateVendorCrdntialsWithHttpInfo
     *
     * To validate vendor id and password &amp; generate session
     *
     * This oepration contains host(s) defined in the OpenAP spec. Use 'hostIndex' to select the host.
     * 
     *
     * @param  string $vendorID vendor id of the client (api Key) (required)
     * @param  string $source (required)
     * @param  \com\apiconnect\apiconnect\models\ValidateUidPwdRequest $body (required)
     *
     * @throws \com\apiconnect\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \com\apiconnect\apiconnect\models\GnrResDao|\com\apiconnect\apiconnect\models\CommonErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function validateVendorCrdntialsWithHttpInfo($vendorID, $source, $body)
    {
        $request = $this->validateVendorCrdntialsRequest($vendorID, $source, $body);

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
                    if ('\com\apiconnect\apiconnect\models\GnrResDao' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\com\apiconnect\apiconnect\models\GnrResDao', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                default:
                    if ('\com\apiconnect\apiconnect\models\CommonErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\com\apiconnect\apiconnect\models\CommonErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\com\apiconnect\apiconnect\models\GnrResDao';
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
                        '\com\apiconnect\apiconnect\models\GnrResDao',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\com\apiconnect\apiconnect\models\CommonErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Create request for operation 'validateVendorCrdntials'
     *
     * This oepration contains host(s) defined in the OpenAP spec. Use 'hostIndex' to select the host.
     * 
     *
     * @param  string $vendorID vendor id of the client (api Key) (required)
     * @param  string $source (required)
     * @param  \com\apiconnect\apiconnect\models\ValidateUidPwdRequest $body (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function validateVendorCrdntialsRequest($vendorID, $source, $body)
    {
        // verify the required parameter 'vendorID' is set
        if ($vendorID === null || (is_array($vendorID) && count($vendorID) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $vendorID when calling validateVendorCrdntials'
            );
        }
        // verify the required parameter 'source' is set
        if ($source === null || (is_array($source) && count($source) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $source when calling validateVendorCrdntials'
            );
        }
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling validateVendorCrdntials'
            );
        }

        $resourcePath = '/accounts/loginvendor/{vendorID}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($source !== null) {
            $headerParams['source'] = ObjectSerializer::toHeaderValue($source);
        }

        // path params
        if ($vendorID !== null) {
            $resourcePath = str_replace(
                '{' . 'vendorID' . '}',
                ObjectSerializer::toPathValue($vendorID),
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
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($body)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($body));
            } else {
                $httpBody = $body;
            }
        } elseif (count($formParams) > 0) {
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


        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
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
