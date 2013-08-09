<?php

namespace Mailjet\Event\Events;

use Mailjet\Event\Data\EventData;

class ClickEvent extends OpenEvent
{
    public function getUrl()
    {
        return $this->data[EventData::DATA_URL];
    }
}
