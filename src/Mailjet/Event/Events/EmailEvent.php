<?php

namespace Mailjet\Event\Events;

use Mailjet\Event\Event;
use Mailjet\Event\Data\EventData;

abstract class EmailEvent extends Event
{
    public function getEmail()
    {
        return $this->data[EventData::DATA_EMAIL];
    }

    public function getContactId()
    {
        return $this->data[EventData::DATA_CONTACT_ID];
    }

    public function getCampaignId()
    {
        return $this->data[EventData::DATA_CAMPAIGN_ID];
    }

    public function getCustomCampaign()
    {
        return $this->data[EventData::DATA_CUSTOM_CAMPAIGN];
    }
}
