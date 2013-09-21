<?php

namespace Mailjet\Api\Request;

use Mailjet\Api\MailjetClientInterface;
use Mailjet\Api\RequestApi;

/**
 * Higher-level OOP wrapper over Mailjet Client for Api related requests
 * 
 * @link http://www.mailjet.com/docs/api/api
 *
 * Based on https://github.com/dguyon/Mailjet
 */
class Api
{
    private $client;

    public function __construct(MailjetClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @link http://www.mailjet.com/docs/api/api/keyadd
     */
    public function addKey($name, $status = '')
    {
        return $this->client->post(RequestApi::API_KEY_ADD, array(
            'name'          => $name,
            'custom_status' => $status
        ));
    }

    /**
     * @link http://www.mailjet.com/docs/api/api/keyupdate
     */
    public function updateKey($key, $name = '', $status = '')
    {
        return $this->client->post(RequestApi::API_KEY_UPDATE, array(
            'apiKey'        => $key,
            'name'          => $name,
            'custom_status' => $status
        ));
    }

    /**
     * @link http://www.mailjet.com/docs/api/api/keyauthenticate
     */
    public function authenticateKey($key, array $allowedPages, $defaultPage = '', $lang = '', $timezone = '', $type = null)
    {
        $options = array(
            'apikey'         => $key,
            'allowed_access' => $allowedPages,
            'default_page'   => $defaultPage,
            'lang'           => $lang,
            'timezone'       => $timezone,
        );

        if (null !== $type) {
            $options['type'] = $type;
        }

        return $this->client->post(RequestApi::API_KEY_AUTH, $options);
    }

    /**
     * @link http://www.mailjet.com/docs/api/api/keylist
     */
    public function getKeys($key = '', $status = '', $name = '', $type = null, $isActive = null)
    {
        $options = array(
            'api_key'       => $key,
            'custom_status' => $status,
            'name'          => $name,
        );

        if (null !== $type) {
            $options['type'] = $type;
        }

        if (null !== $isActive) {
            $options['active'] = $isActive;
        }

        return $this->client->get(RequestApi::API_KEY_LIST, $options);
    }

    /**
     * @link http://www.mailjet.com/docs/api/api/keysecret
     */
    public function getSecretForKey($key)
    {
        return $this->client->get(RequestApi::API_KEY_SECRET, array(
            'apiKey' => $key
        ));
    }

    /**
     * @link http://www.mailjet.com/docs/api/api/keysecretchange
     */
    public function resetSecretForKey($key)
    {
        return $this->client->post(RequestApi::API_KEY_SECRET_CHANGE, array(
            'apiKey' => $key
        ));
    }
}