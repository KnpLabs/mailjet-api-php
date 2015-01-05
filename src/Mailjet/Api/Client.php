<?php

namespace Mailjet\Api;

use Guzzle\Http\Message\Response;
use Guzzle\Http\Message\RequestInterface;

use Guzzle\Http\Client as HttpClient;
use Guzzle\Http\ClientInterface;

use Mailjet\Exception\ApiServerException;

class Client implements MailjetClientInterface
{
    private $apiClient;

    private $apiKey;
    private $secretKey;
    private $outputFormat   = self::FORMAT_ARRAY;
    private $connectionMode = self::CONNECTION_SECURE;

    public function __construct($apiKey, $secretKey, $debug = false)
    {
        $this->apiKey    = $apiKey;
        $this->secretKey = $secretKey;

        if ($debug && class_exists('\Symfony\Component\Debug\Debug')) {
            \Symfony\Component\Debug\Debug::enable();
        }
    }

    /**
     * Method for issuing low level API GET requests
     * If array is set as output format (as by default), then response is parsed
     * Otherwise it's returned as a raw string
     *
     * @param $apiQuery For list of available queries @see \Mailjet\Api\RequestApi
     * @param array $options
     *
     * @return string|array
     *
     * @throws \InvalidArgumentException
     */
    public function get($apiQuery, $options = array())
    {
        if (!RequestApi::isGet($apiQuery)) {
            throw new \InvalidArgumentException('Unsupported API query for GET method: ' . $apiQuery);
        }

        $request = $this->getApi()->get($apiQuery);

        $this->prepareRequest($request, $options);

        $response = $request->send();

        return $this->processResponse($response);
    }

    /**
     * Method for issuing low level API POST requests
     *
     * @see Client::get()
     */
    public function post($apiQuery, $options = array())
    {
        if (!RequestApi::isPost($apiQuery)) {
            throw new \InvalidArgumentException('Unsupported API query for POST method: ' . $apiQuery);
        }

        $request = $this->getApi()->post($apiQuery);

        $this->prepareRequest($request, $options);

        $response = $request->send();

        return $this->processResponse($response);
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

    public function setApi(ClientInterface $api)
    {
        $this->apiClient = $api;
    }

    /**
     * @return \Guzzle\Http\Client
     */
    public function getApi()
    {
        if (!$this->apiClient) {
            $this->setApi(new HttpClient(sprintf('%s://%s/%s', $this->connectionMode, self::API_BASE_URL, self::API_VERSION)));
        }

        return $this->apiClient;
    }

    private function prepareRequest(RequestInterface $request, $options = array())
    {
        $request->setAuth($this->apiKey, $this->secretKey);

        if ($request->getMethod() == RequestInterface::POST) {
            $request->setPostField('output', $this->getRealOutputFormat());
            foreach ($options as $option => $value) {
                $request->setPostField($option, $value);
            }
        } else {
            $query = $request->getQuery();
            $query->add('output', $this->getRealOutputFormat());
            foreach ($options as $option => $value) {
                $query->add($option, $value);
            }
        }
    }

    private function processResponse(Response $response)
    {
        if (!$response->isSuccessful()) {
            throw new ApiServerException($response->getMessage(), $response->getStatusCode());
        }

        if (self::FORMAT_ARRAY === $this->outputFormat) {
            return $response->json();
        }

        return $response->getBody(true);
    }
}
