<?php

namespace Mailjet\Event\Events;

use Mailjet\Event\Data\EventData;

class ClickEvent extends OpenEvent
{
    protected $url;

    public function getType()
    {
        return EventData::EVENT_CLICK;
    }

    public function getUrl()
    {
        return $this->url;
    }

    protected function process(array $data)
    {
        parent::process($data);

        $this->url = $data[EventData::DATA_URL];
    }
}
