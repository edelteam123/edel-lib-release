<?php

namespace com\apiconnect\apiconnect\api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use com\apiconnect\ApiException;
use com\apiconnect\Configuration;
use com\apiconnect\HeaderSelector;
use com\apiconnect\ObjectSerializer;

class EventsResourceApi
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
     * Operation getLatestCorpAct
     *
     * Latest Corporate Actions
     *
     * @param  string $sym streaming symbol (required)
     *
     * @throws \ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \com\apiconnect\apiconnect\models\Events\EventsDataDao
     */
    public function getLatestCorpAct($sym)
    {
        list($response) = $this->getLatestCorpActWithHttpInfo($sym);
        return $response;
    }

    /**
     * Operation getLatestCorpActWithHttpInfo
     *
     * Latest Corporate Actions
     *
     * @param  string $sym streaming symbol (required)
     *
     * @throws \ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \com\apiconnect\apiconnect\models\Events\EventsDataDao, HTTP status code, HTTP response headers (array of strings)
     */
    public function getLatestCorpActWithHttpInfo($sym)
    {
        $request = $this->getLatestCorpActRequest($sym);

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
                    if ('\com\apiconnect\apiconnect\models\Events\EventsDataDao' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\com\apiconnect\apiconnect\models\Events\EventsDataDao', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\com\apiconnect\apiconnect\models\Events\EventsDataDao';
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
                        '\com\apiconnect\apiconnect\models\Events\EventsDataDao',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Create request for operation 'getLatestCorpAct'
     *
     * @param  string $sym streaming symbol (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getLatestCorpActRequest($sym)
    {
        $resourcePath = '/events/latestcorpactions/{sym}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($sym !== null) {
            $resourcePath = str_replace(
                '{' . 'sym' . '}',
                ObjectSerializer::toPathValue($sym),
                $resourcePath
            );
        }

        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            []
        );

        if ($headers['Content-Type'] === 'application/json') {
            $httpBody = \GuzzleHttp\json_encode($formParams);
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('AppIdKey');
        if ($apiKey !== null) {
            $headers['AppIdKey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
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
