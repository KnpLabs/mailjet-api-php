<?php

namespace Mailjet\Api\Request;

use Mailjet\Api\MailjetClientInterface;
use Mailjet\Api\RequestApi;

/**
 * Higher-level OOP wrapper over Mailjet Client for Message related requests
 *
 * @link http://www.mailjet.com/docs/api/message
 *
 * Based on https://github.com/dguyon/Mailjet
 */
class Message
{
    private $client;

    public function __construct(MailjetClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @link http://www.mailjet.com/docs/api/message/campaigns
     */
    public function getCampaigns($id = '', $limit = '', $offset = '', $orderBy = '', $status = '')
    {
        return $this->client->get(RequestApi::MESSAGE_CAMPAIGNS, array(
            'id'      => $id,
            'limit'   => $limit,
            'start'   => $offset,
            'orderBy' => $orderBy,
            'status'  => $status
        ));
    }

    /**
     * @link http://www.mailjet.com/docs/api/message/contacts
     */
    public function getContacts($id = '', $limit = '', $offset = '', $status = '')
    {
        return $this->client->get(RequestApi::MESSAGE_CONTACTS, array(
            'id'      => $id,
            'limit'   => $limit,
            'start'   => $offset,
            'status'  => $status
        ));
    }

    /**
     * @link http://www.mailjet.com/docs/api/message/htmlcampaign
     */
    public function getCampaignHtml($id)
    {
        return $this->client->get(RequestApi::MESSAGE_HTML_CAMPAIGN, array(
            'id' => $id,
        ));
    }

    /**
     * @link http://www.mailjet.com/docs/api/message/sethtmlcampaign
     */
    public function setCampaignContent($id, $html, $text = '')
    {
        return $this->client->post(RequestApi::MESSAGE_SET_HTML_CAMPAIGN, array(
            'id'   => $id,
            'html' => $html,
            'text' => $text
        ));
    }

    /**
     * @link http://www.mailjet.com/docs/api/message/statistics
     */
    public function getCampaignStatistics($id)
    {
        return $this->client->get(RequestApi::MESSAGE_STATISTICS, array(
            'id' => $id
        ));
    }

    /**
     * @link http://www.mailjet.com/docs/api/message/sendcampaign
     */
    public function sendCampaign($id)
    {
        return $this->client->post(RequestApi::MESSAGE_SEND_CAMPAIGN, array(
            'id' => $id
        ));
    }

    /**
     * @link http://www.mailjet.com/docs/api/message/testcampaign
     */
    public function sendCampaignTest($id, $email)
    {
        return $this->client->post(RequestApi::MESSAGE_TEST_CAMPAIGN, array(
            'id'    => $id,
            'email' => $email
        ));
    }

    /**
     * @link http://www.mailjet.com/docs/api/message/tplcategories
     */
    public function getTemplateCategories()
    {
        return $this->client->get(RequestApi::MESSAGE_TPL_CATEGORIES);
    }

    /**
     * @link http://www.mailjet.com/docs/api/message/tplmodels
     */
    public function getTemplates($category = '', $locale = '', $isCustom = false)
    {
        $options = array(
            'category' => $category,
            'locale'   => $locale
        );

        if ($isCustom) {
            $options['custom'] = 1;
        }

        return $this->client->get(RequestApi::MESSAGE_TPL_MODELS, $options);
    }

    /**
     * @todo
     *
     * @link http://www.mailjet.com/docs/api/message/list
     */
    public function getMessages()
    {
        throw new \RuntimeException('Not implement yet');
    }

    /**
     * @todo
     *
     * @link http://www.mailjet.com/docs/api/message/createcampaign
     */
    public function addCampaign()
    {
        throw new \RuntimeException('Not implement yet');
    }

    /**
     * @todo
     *
     * @link http://www.mailjet.com/docs/api/message/duplicatecampaign
     */
    public function duplicateCampaign()
    {
        throw new \RuntimeException('Not implement yet');
    }

    /**
     * @todo
     *
     * @link http://www.mailjet.com/docs/api/message/updatecampaign
     */
    public function updateCampaign()
    {
        throw new \RuntimeException('Not implement yet');
    }
}