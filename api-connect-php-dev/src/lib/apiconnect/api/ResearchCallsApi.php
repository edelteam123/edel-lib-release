<?php

namespace com\apiconnect\apiconnect\api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use com\apiconnect\ApiException;
use com\apiconnect\Configuration;
use com\apiconnect\HeaderSelector;
use com\apiconnect\ObjectSerializer;
use stdClass;

class ResearchCallsApi
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var Configuration
     */
    private $config;

    /**
     * @var HeaderSelector
     */
    private $headerSelector;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        $chartsApiConfig,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();

        $this->config->setHost($chartsApiConfig['host']);
        $this->config->setIniFilePath($chartsApiConfig['iniFilePath']);
        $this->config->setApiKey($chartsApiConfig['apikey']['key'], $chartsApiConfig['apikey']['val']);
    }

    /**
     * Operation getAllActiveCalls
     *
     * Get all active research calls
     *
     * @param  string $seg Segments can be EQ,FNO,CUR,COM (optional)
     * @param  string $term Terms can be LONGTERM,SHORTTERM,MIDTERM (optional)
     *
     * @throws \\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \com\apiconnect\apiconnect\models\ResearchCalls\ResearchCallsDataDao
     */
    public function getAllActiveCalls($seg = null, $term = null)
    {
        list($response) = $this->getAllActiveCallsWithHttpInfo($seg, $term);
        return $response;
    }

    /**
     * Operation getAllActiveCallsWithHttpInfo
     *
     * Get all active research calls
     *
     * @param  string $seg Segments can be EQ,FNO,CUR,COM (optional)
     * @param  string $term Terms can be LONGTERM,SHORTTERM,MIDTERM (optional)
     *
     * @throws \ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \com\apiconnect\apiconnect\models\ResearchCalls\ResearchCallsDataDao, HTTP status code, HTTP response headers (array of strings)
     */
    public function getAllActiveCallsWithHttpInfo($seg = null, $term = null)
    {
        $request = $this->getAllActiveCallsRequest($seg, $term);

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
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
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
                    if ('\com\apiconnect\apiconnect\models\ResearchCalls\ResearchCallsDataDao' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\com\apiconnect\apiconnect\models\ResearchCalls\ResearchCallsDataDao', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\com\apiconnect\apiconnect\models\ResearchCalls\ResearchCallsDataDao';
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
                        '\com\apiconnect\apiconnect\models\ResearchCalls\ResearchCallsDataDao',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Create request for operation 'getAllActiveCalls'
     *
     * @param  string $seg Segments can be EQ,FNO,CUR,COM (optional)
     * @param  string $term Terms can be LONGTERM,SHORTTERM,MIDTERM (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getAllActiveCallsRequest($seg = null, $term = null)
    {

        $resourcePath = '/research/active';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if (is_array($seg)) {
            $seg = ObjectSerializer::serializeCollection($seg, '', true);
        }
        if ($seg !== null) {
            $queryParams['seg'] = $seg;
        }
        // query params
        if (is_array($term)) {
            $term = ObjectSerializer::serializeCollection($term, '', true);
        }
        if ($term !== null) {
            $queryParams['term'] = $term;
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
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
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

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getClosedCalls
     *
     * Get closed research calls
     *
     * @param  string $seg Segments can be EQ,FNO,CUR,COM (required)
     * @param  string $term Terms can be LONGTERM,SHORTTERM,MIDTERM (required)
     * @param  string $fr_dt Filtering start date. In format : YYYY-MM-dd (optional)
     * @param  string $to_dt Filtering to date. In format : YYYY-MM-dd (optional)
     * @param  int $cur_sz Identifier for number of calls in list that have already been sent to client (optional)
     * @param  string $rc_typ Filtering based on recommendation type (optional)
     * @param  string $by_sl_typ Filtering based on action type (optional)
     *
     * @throws \ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \com\apiconnect\apiconnect\models\ResearchCalls\ResearchCallsDataDao
     */
    public function getClosedCalls($seg, $term, $by_sl_typ = null, $fr_dt = null, $to_dt = null, $rc_typ = null, $cur_sz = null)
    {
        list($response) = $this->getClosedCallsWithHttpInfo($seg, $term, $fr_dt, $to_dt, $cur_sz, $rc_typ, $by_sl_typ);
        return $response;
    }

    /**
     * Operation getClosedCallsWithHttpInfo
     *
     * Get closed research calls
     *
     * @param  string $seg Segments can be EQ,FNO,CUR,COM (required)
     * @param  string $term Terms can be LONGTERM,SHORTTERM,MIDTERM (required)
     * @param  string $fr_dt Filtering start date. In format : YYYY-MM-dd (optional)
     * @param  string $to_dt Filtering to date. In format : YYYY-MM-dd (optional)
     * @param  int $cur_sz Identifier for number of calls in list that have already been sent to client (optional)
     * @param  string $rc_typ Filtering based on recommendation type (optional)
     * @param  string $by_sl_typ Filtering based on action type (optional)
     *
     * @throws \ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \com\apiconnect\apiconnect\models\ResearchCalls\ResearchCallsDataDao, HTTP status code, HTTP response headers (array of strings)
     */
    public function getClosedCallsWithHttpInfo($seg, $term, $fr_dt = null, $to_dt = null, $cur_sz = null, $rc_typ = null, $by_sl_typ = null)
    {
        $request = $this->getClosedCallsRequest($seg, $term, $fr_dt, $to_dt, $cur_sz, $rc_typ, $by_sl_typ);

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
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
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
                    if ('\com\apiconnect\apiconnect\models\ResearchCalls\ResearchCallsDataDao' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\com\apiconnect\apiconnect\models\ResearchCalls\ResearchCallsDataDao', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\com\apiconnect\apiconnect\models\ResearchCalls\ResearchCallsDataDao';
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
                        '\com\apiconnect\apiconnect\models\ResearchCalls\ResearchCallsDataDao',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Create request for operation 'getClosedCalls'
     *
     * @param  string $seg Segments can be EQ,FNO,CUR,COM (required)
     * @param  string $term Terms can be LONGTERM,SHORTTERM,MIDTERM (required)
     * @param  string $fr_dt Filtering start date. In format : YYYY-MM-dd (optional)
     * @param  string $to_dt Filtering to date. In format : YYYY-MM-dd (optional)
     * @param  int $cur_sz Identifier for number of calls in list that have already been sent to client (optional)
     * @param  string $rc_typ Filtering based on recommendation type (optional)
     * @param  string $by_sl_typ Filtering based on action type (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getClosedCallsRequest($seg, $term, $fr_dt = null, $to_dt = null, $cur_sz = null, $rc_typ = null, $by_sl_typ = null)
    {
        // verify the required parameter 'seg' is set
        if ($seg === null || (is_array($seg) && count($seg) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $seg when calling getClosedCalls'
            );
        }
        // verify the required parameter 'term' is set
        if ($term === null || (is_array($term) && count($term) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $term when calling getClosedCalls'
            );
        }

        $resourcePath = '/research/closed';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if (is_array($fr_dt)) {
            $fr_dt = ObjectSerializer::serializeCollection($fr_dt, '', true);
        }
        if ($fr_dt !== null) {
            $queryParams['frDt'] = $fr_dt;
        }
        // query params
        if (is_array($to_dt)) {
            $to_dt = ObjectSerializer::serializeCollection($to_dt, '', true);
        }
        if ($to_dt !== null) {
            $queryParams['toDt'] = $to_dt;
        }
        // query params
        if (is_array($cur_sz)) {
            $cur_sz = ObjectSerializer::serializeCollection($cur_sz, '', true);
        }
        if ($cur_sz !== null) {
            $queryParams['curSz'] = $cur_sz;
        }
        // query params
        if (is_array($rc_typ)) {
            $rc_typ = ObjectSerializer::serializeCollection($rc_typ, '', true);
        }
        if ($rc_typ !== null) {
            $queryParams['rcTyp'] = $rc_typ;
        }
        // query params
        if (is_array($by_sl_typ)) {
            $by_sl_typ = ObjectSerializer::serializeCollection($by_sl_typ, '', true);
        }
        if ($by_sl_typ !== null) {
            $queryParams['bySlTyp'] = $by_sl_typ;
        }
        // query params
        if (is_array($seg)) {
            $seg = ObjectSerializer::serializeCollection($seg, '', true);
        }
        if ($seg !== null) {
            $queryParams['seg'] = $seg;
        }
        // query params
        if (is_array($term)) {
            $term = ObjectSerializer::serializeCollection($term, '', true);
        }
        if ($term !== null) {
            $queryParams['term'] = $term;
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
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
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

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
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
    private function createHttpClientOption()
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
