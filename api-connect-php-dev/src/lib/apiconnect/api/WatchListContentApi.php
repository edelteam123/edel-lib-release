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
use com\apiconnect\Exceptions\ValidationException;
use com\apiconnect\HeaderSelector;
use com\apiconnect\ObjectSerializer;

class WatchListContentApi
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
        $watchListApiConfig,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();

        $this->config->setHost($watchListApiConfig['host']);
        $this->config->setIniFilePath($watchListApiConfig['iniFilePath']);
        $this->config->setApiKey($watchListApiConfig['apikey']['key'], $watchListApiConfig['apikey']['val']);
    }

    /**
     * Operation getGroups
     *
     * Retrieving watchlist for a particular client
     *
     * @param  string $acc_id Account Code of the Client (required)
     * @param  string $acc_typ Account Type - EQ,CO (required)
     * @param  string $prf_id Profile ID (required)
     *
     * @throws \ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \com\apiconnect\apiconnect\models\WatchList\WatchListDataDao
     */
    public function getGroups($acc_id, $acc_typ, $prf_id)
    {
        list($response) = $this->getGroupsWithHttpInfo($acc_id, $acc_typ, $prf_id);
        return $response;
    }

    /**
     * Operation getGroupsWithHttpInfo
     *
     * Retrieving watchlist for a particular client
     *
     * @param  string $acc_id Account Code of the Client (required)
     * @param  string $acc_typ Account Type - EQ,CO (required)
     * @param  string $prf_id Profile ID (required)
     *
     * @throws \ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \com\apiconnect\apiconnect\models\WatchList\WatchListDataDao, HTTP status code, HTTP response headers (array of strings)
     */
    public function getGroupsWithHttpInfo($acc_id, $acc_typ, $prf_id)
    {
        $request = $this->getGroupsRequest($acc_id, $acc_typ, $prf_id);

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
                    if ('\com\apiconnect\apiconnect\models\WatchList\WatchListDataDao' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\com\apiconnect\apiconnect\models\WatchList\WatchListDataDao', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\com\apiconnect\apiconnect\models\WatchList\WatchListDataDao';
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
                        '\com\apiconnect\apiconnect\models\WatchList\WatchListDataDao',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Create request for operation 'getGroups'
     *
     * @param  string $acc_id Account Code of the Client (required)
     * @param  string $acc_typ Account Type - EQ,CO (required)
     * @param  string $prf_id Profile ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getGroupsRequest($acc_id, $acc_typ, $prf_id)
    {
        // verify the required parameter 'acc_id' is set
        if (empty($acc_id)) {
            throw new ValidationException(
                'Missing the required parameter $acc_id when calling getGroups'
            );
        }
        // verify the required parameter 'acc_typ' is set
        if (empty($acc_typ)) {
            throw new ValidationException(
                'Missing the required parameter $acc_typ when calling getGroups'
            );
        }
        // verify the required parameter 'prf_id' is set
        if (empty($prf_id)) {
            throw new ValidationException(
                'Missing the required parameter $prf_id when calling getGroups'
            );
        }

        $resourcePath = '/accounts/groups';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if (is_array($acc_id)) {
            $acc_id = ObjectSerializer::serializeCollection($acc_id, '', true);
        }
        if (!empty($acc_id)) {
            $queryParams['accId'] = $acc_id;
        }
        // query params
        if (is_array($acc_typ)) {
            $acc_typ = ObjectSerializer::serializeCollection($acc_typ, '', true);
        }
        if (!empty($acc_typ)) {
            $queryParams['accTyp'] = $acc_typ;
        }
        // query params
        if (is_array($prf_id)) {
            $prf_id = ObjectSerializer::serializeCollection($prf_id, '', true);
        }
        if (!empty($prf_id)) {
            $queryParams['prfId'] = $prf_id;
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
     * Operation getSymbols
     *
     * Get symbol details of a watchlist
     *
     * @param  string $acc_id account id of the client (required)
     * @param  string $acc_typ accTyp (required)
     * @param  string $prf_id prfId (required)
     * @param  string $grp_nm Watchlist name, grID of getGroups response (optional)
     *
     * @throws \ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \com\apiconnect\apiconnect\models\WatchList\WatchListDataDao
     */
    public function getSymbols($acc_id, $acc_typ, $prf_id, $grp_nm = null)
    {
        list($response) = $this->getSymbolsWithHttpInfo($acc_id, $acc_typ, $prf_id, $grp_nm);
        return $response;
    }

    /**
     * Operation getSymbolsWithHttpInfo
     *
     * Get symbol details of a watchlist
     *
     * @param  string $acc_id account id of the client (required)
     * @param  string $acc_typ accTyp (required)
     * @param  string $prf_id prfId (required)
     * @param  string $grp_nm Watchlist name, grID of getGroups response (optional)
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\MultiQuoteDao, HTTP status code, HTTP response headers (array of strings)
     */
    public function getSymbolsWithHttpInfo($acc_id, $acc_typ, $prf_id, $grp_nm = null)
    {
        $request = $this->getSymbolsRequest($acc_id, $acc_typ, $prf_id, $grp_nm);

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
                    if ('\com\apiconnect\apiconnect\models\WatchList\WatchListScripDataDao' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\com\apiconnect\apiconnect\models\WatchList\WatchListScripDataDao', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\com\apiconnect\apiconnect\models\WatchList\WatchListScripDataDao';
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
                        '\com\apiconnect\apiconnect\models\WatchList\WatchListScripDataDao',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Create request for operation 'getSymbols'
     *
     * @param  string $acc_id account id of the client (required)
     * @param  string $acc_typ accTyp (required)
     * @param  string $prf_id prfId (required)
     * @param  string $grp_nm Watchlist name, grID of getGroups response (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getSymbolsRequest($acc_id, $acc_typ, $prf_id, $grp_nm = null)
    {
        // verify the required parameter 'acc_id' is set
        if (empty($acc_id)) {
            throw new ValidationException(
                'Missing the required parameter $acc_id when calling getGroups'
            );
        }
        // verify the required parameter 'acc_typ' is set
        if (empty($acc_typ)) {
            throw new ValidationException(
                'Missing the required parameter $acc_typ when calling getGroups'
            );
        }
        // verify the required parameter 'prf_id' is set
        if (empty($prf_id)) {
            throw new ValidationException(
                'Missing the required parameter $prf_id when calling getGroups'
            );
        }

        $resourcePath = '/accounts/groups/symbols';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if (is_array($acc_id)) {
            $acc_id = ObjectSerializer::serializeCollection($acc_id, '', true);
        }
        if ($acc_id !== null) {
            $queryParams['accId'] = $acc_id;
        }
        // query params
        if (is_array($acc_typ)) {
            $acc_typ = ObjectSerializer::serializeCollection($acc_typ, '', true);
        }
        if ($acc_typ !== null) {
            $queryParams['accTyp'] = $acc_typ;
        }
        // query params
        if (is_array($prf_id)) {
            $prf_id = ObjectSerializer::serializeCollection($prf_id, '', true);
        }
        if ($prf_id !== null) {
            $queryParams['prfId'] = $prf_id;
        }
        // query params
        if (is_array($grp_nm)) {
            $grp_nm = ObjectSerializer::serializeCollection($grp_nm, '', true);
        }
        if ($grp_nm !== null) {
            $queryParams['grpNm'] = $grp_nm;
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
     * Operation createGroup
     *
     * Create new group for a particular client
     *
     * @param  \OpenAPI\Client\Model\ModifyWatchListReqDao $body symLst like 3045_NSE,3456_NSE is a mandatory parameter (required)
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\ModifyGroupDao
     */
    public function createGroup($groupName, $body)
    {
        list($response) = $this->createGroupWithHttpInfo($groupName, $body);
        return $response;
    }

    /**
     * Operation createGroupWithHttpInfo
     *
     * Create new group for a particular client
     *
     * @param  \OpenAPI\Client\Model\ModifyWatchListReqDao $body symLst like 3045_NSE,3456_NSE is a mandatory parameter (required)
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\ModifyGroupDao, HTTP status code, HTTP response headers (array of strings)
     */
    public function createGroupWithHttpInfo($groupName, $body)
    {
        $request = $this->createGroupRequest($groupName, $body);
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
                    if ('\com\apiconnect\apiconnect\models\WatchList\WatchListCreateGroupDataDao' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\com\apiconnect\apiconnect\models\WatchList\WatchListCreateGroupDataDao', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\com\apiconnect\apiconnect\models\WatchList\WatchListCreateGroupDataDao';
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
                        '\com\apiconnect\apiconnect\models\WatchList\WatchListCreateGroupDataDao',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Create request for operation 'createGroup'
     *
     * @param  \OpenAPI\Client\Model\ModifyWatchListReqDao $body symLst like 3045_NSE,3456_NSE is a mandatory parameter (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createGroupRequest($groupName, $body)
    {

        if (empty($groupName)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $groupName when calling endSession'
            );
        }

        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling createGroup'
            );
        }

        $resourcePath = '/accounts/groups/{groupName}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($groupName !== null) {
            $resourcePath = str_replace(
                '{' . 'groupName' . '}',
                ObjectSerializer::toPathValue($groupName),
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
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation updateGroup
     *
     * This api can be used to Add Symbols(act:add) or Delete Symbols(act:del) or Rearrange Symbols(act:modify) or Rename Watchlist(act:modify) or Rearrange Tab(act:tab)
     *
     * @throws \ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \com\apiconnect\apiconnect\models\WatchList\WatchListCreateGroupDataDao
     */
    public function updateGroup($groupName, $body = null)
    {
        list($response) = $this->updateGroupWithHttpInfo($groupName, $body);
        return $response;
    }

    /**
     * Operation deleteGroup
     *
     * This api can be used to Add Symbols(act:add) or Delete Symbols(act:del) or Rearrange Symbols(act:modify) or Rename Watchlist(act:modify) or Rearrange Tab(act:tab)
     *
     * @throws \ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \com\apiconnect\apiconnect\models\WatchList\WatchListCreateGroupDataDao
     */
    public function deleteGroup($groupName, $body = null)
    {
        list($response) = $this->updateGroupWithHttpInfo($groupName, $body);
        return $response;
    }

    /**
     * Operation renameGroup
     *
     * This api can be used to Add Symbols(act:add) or Delete Symbols(act:del) or Rearrange Symbols(act:modify) or Rename Watchlist(act:modify) or Rearrange Tab(act:tab)
     *
     * @throws \ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \com\apiconnect\apiconnect\models\WatchList\WatchListCreateGroupDataDao
     */
    public function renameGroup($groupName, $body = null)
    {
        list($response) = $this->updateGroupWithHttpInfo($groupName, $body);
        return $response;
    }

    /**
     * Operation updateGroupWithHttpInfo
     *
     * This api can be used to Add Symbols(act:add) or Delete Symbols(act:del) or Rearrange Symbols(act:modify) or Rename Watchlist(act:modify) or Rearrange Tab(act:tab)
     *
     *
     * @throws \ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \com\apiconnect\apiconnect\models\WatchList\WatchListCreateGroupDataDao, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateGroupWithHttpInfo($groupName, $body = null)
    {
        $request = $this->updateGroupRequest($groupName, $body);

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
                    if ('\com\apiconnect\apiconnect\models\WatchList\WatchListCreateGroupDataDao' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\com\apiconnect\apiconnect\models\WatchList\WatchListCreateGroupDataDao', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\com\apiconnect\apiconnect\models\WatchList\WatchListCreateGroupDataDao';
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
                        '\com\apiconnect\apiconnect\models\WatchList\WatchListCreateGroupDataDao',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Create request for operation 'updateGroup'
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function updateGroupRequest($groupName, $body = null)
    {
        if (empty($groupName)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $groupName when calling endSession'
            );
        }

        $resourcePath = '/accounts/groups/{groupName}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($groupName !== null) {
            $resourcePath = str_replace(
                '{' . 'groupName' . '}',
                ObjectSerializer::toPathValue($groupName),
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
            'PUT',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation deleteGroups
     *
     * Deletes multiple groups for a particular user
     *
     *
     * @throws \ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \com\apiconnect\apiconnect\models\WatchList\WatchListCreateGroupDataDao
     */
    public function deleteGroups($body)
    {
        list($response) = $this->deleteGroupWithHttpInfo($body);
        return $response;
    }

    /**
     * Operation deleteGroupWithHttpInfo
     *
     * Deletes multiple groups for a particular user
     *
     *
     * @throws \ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \com\apiconnect\apiconnect\models\WatchList\WatchListCreateGroupDataDao, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteGroupWithHttpInfo($body)
    {
        $request = $this->deleteGroupRequest($body);

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
                    if ('\com\apiconnect\apiconnect\models\WatchList\WatchListCreateGroupDataDao' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\com\apiconnect\apiconnect\models\WatchList\WatchListCreateGroupDataDao', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\com\apiconnect\apiconnect\models\WatchList\WatchListCreateGroupDataDao';
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
                        '\com\apiconnect\apiconnect\models\WatchList\WatchListCreateGroupDataDao',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Create request for operation 'deleteGroup'
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function deleteGroupRequest($body)
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling createGroup'
            );
        }

        $resourcePath = '/accounts/groups';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

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
            'DELETE',
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
