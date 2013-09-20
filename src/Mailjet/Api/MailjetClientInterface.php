<?php

namespace Mailjet\Api;

use Guzzle\Http\ClientInterface;

interface MailjetClientInterface
{
    const API_VERSION  = '0.1';
    const API_BASE_URL = 'api.mailjet.com';

    const FORMAT_CSV       = 'csv';
    const FORMAT_XML       = 'xml';
    const FORMAT_HTML      = 'html';
    const FORMAT_JSON      = 'json';
    const FORMAT_SERIALIZE = 'serialize';
    const FORMAT_ARRAY     = 'array';

    const CONNECTION_NORMAL = 'http';
    const CONNECTION_SECURE = 'https';

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
    public function get($apiQuery, $options = array());

    /**
     * Method for issuing low level API POST requests
     *
     * @see Client::get()
     */
    public function post($apiQuery, $options = array());

    /**
     * @param string $connectionMode
     * @return \Mailjet\Api\MailjetClientInterface
     */
    public function setConnectionMode($connectionMode);

    /**
     * @return string
     */
    public function getConnectionMode();

    /**
     * @param string $outputFormat
     * @return \Mailjet\Api\MailjetClientInterface
     */
    public function setOutputFormat($outputFormat);

    /**
     * @return string
     */
    public function getOutputFormat();

    /**
     * A method that forces use of a specific lower-level API connection implementation
     *
     * @param ClientInterface $api
     */
    public function setApi(ClientInterface $api);

    /**
     * @return \Guzzle\Http\ClientInterface
     */
    public function getApi();
}
