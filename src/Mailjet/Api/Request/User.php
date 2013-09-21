<?php

namespace Mailjet\Api\Request;

use Mailjet\Api\MailjetClientInterface;
use Mailjet\Api\RequestApi;

/**
 * Higher-level OOP wrapper over Mailjet Client for User related requests
 *
 * @link http://www.mailjet.com/docs/api/user
 *
 * Based on https://github.com/dguyon/Mailjet
 */
class User
{
    private $client;

    public function __construct(MailjetClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @link http://www.mailjet.com/docs/api/user/domainadd
     */
    public function addDomain($domain)
    {
        return $this->client->post(RequestApi::USER_DOMAIN_ADD, array(
            'domain' => $domain
        ));
    }

    /**
     * @link http://www.mailjet.com/docs/api/user/domainlist
     */
    public function getDomains()
    {
        return $this->client->get(RequestApi::USER_DOMAIN_LIST);
    }

    /**
     * @link http://www.mailjet.com/docs/api/user/domainlist
     */
    public function getDomainStatus($domain, $forceVerification = false)
    {
        $options = array('domain' => $domain);
        if ($forceVerification) {
            $options['check'] = 1;
        }

        return $this->client->post(RequestApi::USER_DOMAIN_STATUS, $options);
    }

    /**
     * @link http://www.mailjet.com/docs/api/user/infos
     */
    public function getInfo()
    {
        return $this->client->get(RequestApi::USER_INFOS);
    }

    /**
     * @link http://www.mailjet.com/docs/api/user/senderadd
     */
    public function addSender($email)
    {
        return $this->client->post(RequestApi::USER_SENDER_ADD, array(
            'email' => $email
        ));
    }

    /**
     * @link http://www.mailjet.com/docs/api/user/senderlist
     */
    public function getSenders()
    {
        return $this->client->get(RequestApi::USER_SENDER_LIST);
    }

    /**
     * @link http://www.mailjet.com/docs/api/user/senderstatus
     */
    public function getSenderStatus($email)
    {
        return $this->client->post(RequestApi::USER_SENDER_STATUS, array(
            'email' => $email
        ));
    }

    /**
     * @link http://www.mailjet.com/docs/api/user/trackingcheck
     */
    public function getTrackingSettings()
    {
        return $this->client->get(RequestApi::USER_TRACKING_CHECK);
    }

    /**
     * @link http://www.mailjet.com/docs/api/user/trackingupdate
     */
    public function updateTrackingSettings($click, $open)
    {
        return $this->client->post(RequestApi::USER_TRACKING_UPDATE, array(
            'click' => $click,
            'open'  => $open
        ));
    }

    /**
     * @link http://www.mailjet.com/docs/api/user/update
     */
    public function updateInfo($country = '', $city = '', $street = '', $postalCode = '', $companyName = '', $contactEmail = '', $firstName = '', $lastName = '', $locale = '')
    {
        return $this->client->post(RequestApi::USER_UPDATE, array(
            'address_country'     => $country,
            'address_city'        => $city,
            'address_street'      => $street,
            'address_postal_code' => $postalCode,
            'company_name'        => $companyName,
            'contact_email'       => $contactEmail,
            'firstname'           => $firstName,
            'lastname'            => $lastName,
            'locale'              => $locale
        ));
    }
}