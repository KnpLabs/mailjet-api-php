<?php

namespace Mailjet\Api;

use Guzzle\Http\Client as HttpClient;

class Client
{
    const API_VERSION  = '0.1';
    const API_BASE_URL = 'api.mailjet.com';

    const DEBUG_NONE   = 0;
    const DEBUG_ERRORS = 1;
    const DEBUG_ALL    = 2;

    const FORMAT_CSV       = 'csv';
    const FORMAT_XML       = 'xml';
    const FORMAT_HTML      = 'html';
    const FORMAT_JSON      = 'json';
    const FORMAT_SERIALIZE = 'serialize';
    const FORMAT_ARRAY     = 'array';

    const CONNECTION_NORMAL = 'http';
    const CONNECTION_SECURE = 'https';

    private $apiClient;

    private $apiKey;
    private $secretKey;
    private $debugMode      = self::DEBUG_NONE;
    private $outputFormat   = self::FORMAT_ARRAY;
    private $connectionMode = self::CONNECTION_SECURE;

    public function __construct($apiKey, $secretKey)
    {
        $this->apiKey    = $apiKey;
        $this->secretKey = $secretKey;
    }

    /**
     * Method for issuing low level API requests
     * If array is set as output format (as by default), then response is parsed
     * Otherwise it's returned as a raw string
     *
     * @param $apiQuery For list of available queries @see \Mailjet\Api\RequestApi
     * @param array $options
     *
     * @return string|array
     */
    public function get($apiQuery, $options = array())
    {
        $request = $this->getApi()->get($apiQuery);
        $request->setAuth($this->apiKey, $this->secretKey);

        $query = $request->getQuery();
        $query->add('output', $this->getRealOutputFormat());
        foreach ($options as $option => $value) {
            $query->add($option, $value);
        }

        $response = $request->send();

        if (self::FORMAT_ARRAY === $this->outputFormat) {
            $data = $response->json();

            // data format: array(status => status, function => data)
            return array_pop($data);
        }

        return $response->getBody(true);
    }

    public function post($method, $function)
    {
        // placeholder method for POST requests
    }

    /**
     * @return \Guzzle\Http\Client
     */
    public function getApi()
    {
        if (!$this->apiClient) {
            $this->apiClient = new HttpClient(sprintf('%s://%s/%s', $this->connectionMode, self::API_BASE_URL, self::API_VERSION));
        }

        return $this->apiClient;
    }

    public function setConnectionMode($connectionMode)
    {
        if (!in_array($connectionMode, array(
            self::CONNECTION_NORMAL,
            self::CONNECTION_SECURE
        ))) {
            throw new \InvalidArgumentException('Unsupported connection mode: ' . $connectionMode);
        }

        $this->connectionMode = $connectionMode;

        return $this;
    }

    public function getConnectionMode()
    {
        return $this->connectionMode;
    }

    public function setDebugMode($debugMode)
    {
        if (!in_array($debugMode, array(
            self::DEBUG_NONE,
            self::DEBUG_ERRORS,
            self::DEBUG_ALL
        ))) {
            throw new \InvalidArgumentException('Unsupported debug mode: ' . $debugMode);
        }

        $this->debugMode = $debugMode;

        return $this;
    }

    public function getDebugMode()
    {
        return $this->debugMode;
    }

    public function setOutputFormat($outputFormat)
    {
        if (!in_array($outputFormat, array(
            self::FORMAT_CSV,
            self::FORMAT_XML,
            self::FORMAT_HTML,
            self::FORMAT_JSON,
            self::FORMAT_SERIALIZE,
            self::FORMAT_ARRAY
        ))) {
            throw new \InvalidArgumentException('Unsupported output format: ' . $outputFormat);
        }

        $this->outputFormat = $outputFormat;

        return $this;
    }

    /**
     * Fetch actual output format that will be sent with request
     *
     * @return string
     */
    public function getRealOutputFormat()
    {
        if (self::FORMAT_ARRAY === $this->outputFormat) {
            return self::FORMAT_JSON;
        }

        return $this->outputFormat;
    }

    public function getOutputFormat()
    {
        return $this->outputFormat;
    }
}
