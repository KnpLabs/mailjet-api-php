<?php

namespace Mailjet\Event\Events;

use Mailjet\Event\Data\EventData;

class OpenEvent extends EmailEvent
{
    protected $ip;
    protected $geo;
    protected $userAgent;

    public function getType()
    {
        return EventData::EVENT_OPEN;
    }

    public function getGeo()
    {
        return $this->geo;
    }

    public function getIp()
    {
        return $this->ip;
    }

    public function getUserAgent()
    {
        return $this->userAgent;
    }

    protected function process(array $data)
    {
        $this->ip        = $data[EventData::DATA_IP];
        $this->geo       = $data[EventData::DATA_GEO];
        $this->userAgent = $data[EventData::DATA_USER_AGENT];
    }
}
