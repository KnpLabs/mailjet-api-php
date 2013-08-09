<?php

namespace Mailjet\Event\Events;

use Mailjet\Event\Event;
use Mailjet\Event\Data\EventData;

class TypofixEvent extends Event
{
    public function getNewAddress()
    {
        return $this->data[EventData::DATA_NEW_ADDRESS];
    }

    public function getOriginalAddress()
    {
        return $this->data[EventData::DATA_ORIGINAL_ADDRESS];
    }
}
