<?php

namespace Mailjet\Event\Events;

use Mailjet\Event\Event;
use Mailjet\Event\Data\EventData;

abstract class EmailEvent extends Event
{
    protected $email;
    protected $campaignId;
    protected $contactId;
    protected $customCampaign;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->email          = $data[EventData::DATA_EMAIL];
        $this->campaignId     = $data[EventData::DATA_CAMPAIGN_ID];
        $this->contactId      = $data[EventData::DATA_CONTACT_ID];
        $this->customCampaign = $data[EventData::DATA_CUSTOM_CAMPAIGN];
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getContactId()
    {
        return $this->contactId;
    }

    public function getCampaignId()
    {
        return $this->campaignId;
    }

    public function getCustomCampaign()
    {
        return $this->customCampaign;
    }
}
