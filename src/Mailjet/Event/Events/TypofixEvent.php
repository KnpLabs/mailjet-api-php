<?php

namespace Mailjet\Event\Events;

use Mailjet\Event\Event;
use Mailjet\Event\Data\EventData;

class TypofixEvent extends Event
{
    protected $originalAddress;
    protected $newAddress;

    public function getType()
    {
        return EventData::EVENT_TYPOFIX;
    }

    public function getNewAddress()
    {
        return $this->newAddress;
    }

    public function getOriginalAddress()
    {
        return $this->originalAddress;
    }

    protected function process(array $data)
    {
        $this->newAddress      = $data[EventData::DATA_NEW_ADDRESS];
        $this->originalAddress = $data[EventData::DATA_ORIGINAL_ADDRESS];
    }
}
