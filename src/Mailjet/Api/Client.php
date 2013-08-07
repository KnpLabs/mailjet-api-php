<?php

namespace Mailjet\Api;

class Client
{
    const API_VERSION = '0.1';

    const DEBUG_NONE   = 0;
    const DEBUG_ERRORS = 1;
    const DEBUG_ALL    = 2;

    const FORMAT_CSV       = 'csv';
    const FORMAT_XML       = 'xml';
    const FORMAT_HTML      = 'html';
    const FORMAT_JSON      = 'json';
    const FORMAT_SERIALIZE = 'serialize';

    const CONNECTION_NORMAL = 'http';
    const CONNECTION_SECURE = 'https';

    private $apiKey;
    private $secretKey;
    private $debugMode      = self::DEBUG_NONE;
    private $version        = self::API_VERSION;
    private $outputFormat   = self::FORMAT_JSON;
    private $connectionMode = self::CONNECTION_SECURE;

    public function __construct($apiKey, $secretKey)
    {
        $this->apiKey    = $apiKey;
        $this->secretKey = $secretKey;
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
            self::FORMAT_SERIALIZE
        ))) {
            throw new \InvalidArgumentException('Unsupported output format: ' . $outputFormat);
        }

        $this->outputFormat = $outputFormat;

        return $this;
    }

    public function getOutputFormat()
    {
        return $this->outputFormat;
    }

    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    public function getVersion()
    {
        return $this->version;
    }
}
