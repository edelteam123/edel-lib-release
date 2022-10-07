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

class ChartsContentApi
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
     * Operation getScripChartData
     *
     * Returns Chart Data of a scrip
     *
     * @throws \com\apiconnect\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \com\apiconnect\apiconnect\models\ChartsResponseDao
     */
    public function getScripChartData($body)
    {
        list($response) = $this->getScripChartDataWithHttpInfo($body);
        return $response;
    }

    /**
     * Operation getScripChartDataWithHttpInfo
     *
     * Returns Chart Data of a scrip
     *
     * @throws \com\apiconnect\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \com\apiconnect\apiconnect\models\ChartsResponseDao, HTTP status code, HTTP response headers (array of strings)
     */
    private function getScripChartDataWithHttpInfo($data)
    {
        $request = $this->getScripChartDataRequest($data);
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
                    if ('\com\apiconnect\apiconnect\models\ChartsDataDao' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }
                    return [
                        ObjectSerializer::deserialize($content, '\com\apiconnect\apiconnect\models\ChartsDataDao', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\com\apiconnect\apiconnect\models\ChartsDataDao';
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
                        '\com\apiconnect\apiconnect\models\ChartsDataDao',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Create request for operation 'getScripChartDataRequest'
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    private function getScripChartDataRequest($data)
    {
        $exc = $data['exc'];
        $aTyp = $data['aTyp'];
        $symbol = $data['symbol'];
        $interval = $data['interval'];
        $body = $this->prepareBodyForRequest($data);

        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        $resourcePath = $this->setPathParams($exc, $aTyp, $symbol, $interval);

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

    /**
     * setPathParams
     *
     * @param  mixed $exc
     * @param  mixed $a_typ
     * @param  mixed $symbol
     * @param  mixed $interval
     * @return void
     */
    private function setPathParams($exc, $a_typ, $symbol, $interval)
    {
        // path params
        $resourcePath = '/charts/v2/main/{interval}/{exc}/{aTyp}/{symbol}';

        if ($exc !== null) {
            $resourcePath = str_replace(
                '{' . 'exc' . '}',
                ObjectSerializer::toPathValue($exc),
                $resourcePath
            );
        }
        // path params
        if ($a_typ !== null) {
            $resourcePath = str_replace(
                '{' . 'aTyp' . '}',
                ObjectSerializer::toPathValue($a_typ),
                $resourcePath
            );
        }
        // path params
        if ($symbol !== null) {
            $resourcePath = str_replace(
                '{' . 'symbol' . '}',
                ObjectSerializer::toPathValue($symbol),
                $resourcePath
            );
        }
        // path params
        if ($interval !== null) {
            $resourcePath = str_replace(
                '{' . 'interval' . '}',
                ObjectSerializer::toPathValue($interval),
                $resourcePath
            );
        }

        return $resourcePath;
    }

    /**
     * prepareBodyForRequest
     *
     * @param  mixed $data
     */
    private function prepareBodyForRequest($data)
    {
        $body = new stdClass;
        $body->conti = isset($data['includeContinuousFuture']) ? $data['includeContinuousFuture'] : false;
        $body->ltt = isset($data['ltt']) ? $data['ltt'] : null;
        $body->chTyp =  'Interval';

        $aTypValues = ['FUTIDX', 'FUTSTk', 'FUTCUR', 'FUTCOM'];

        if (!in_array($data['aTyp'], $aTypValues))
            $body->conti = false;

        return $body;
    }
}
