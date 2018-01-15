<?php

namespace Mailjet\Event\Events;

use Mailjet\Event\Data\EventData;
use Mailjet\Event\Event;

class SpamEvent extends Event
{
    public function getSource()
    {
        return $this->data[EventData::DATA_SOURCE];
    }
}
