<?php

namespace Mailjet\Event;

use Mailjet\Event\Data\EventData;

abstract class Event implements EventInterface
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getType()
    {
        return $this->data[EventData::DATA_EVENT];
    }

    public function getTime()
    {
        return $this->data[EventData::DATA_TIME];
    }

    public function getMessageId()
    {
        return $this->data[EventData::DATA_MESSAGE_ID];
    }

    public function getEmail()
    {
        return $this->data[EventData::DATA_EMAIL];
    }

    public function getCampaignId()
    {
        return $this->data[EventData::DATA_CAMPAIGN_ID];
    }

    public function getContactId()
    {
        return $this->data[EventData::DATA_CONTACT_ID];
    }

    public function getCustomCampaign()
    {
        return $this->data[EventData::DATA_CUSTOM_CAMPAIGN];
    }

    public function getCustomId()
    {
        return $this->data[EventData::DATA_CUSTOM_ID];
    }

    public function getPayload()
    {
        return $this->data[EventData::DATA_PAYLOAD];
    }
}
