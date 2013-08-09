<?php

namespace Mailjet\Event\Events;

use Mailjet\Event\Data\EventData;

class SpamEvent extends EmailEvent
{
    public function getSource()
    {
        return $this->data[EventData::DATA_SOURCE];
    }
}
