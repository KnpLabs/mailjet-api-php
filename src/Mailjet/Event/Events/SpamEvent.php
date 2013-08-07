<?php

namespace Mailjet\Event\Events;

use Mailjet\Event\Data\EventData;

class SpamEvent extends EmailEvent
{
    protected $source;

    public function getType()
    {
        return EventData::EVENT_SPAM;
    }

    public function getSource()
    {
        return $this->source;
    }

    protected function process(array $data)
    {
        $this->source = $data[EventData::DATA_SOURCE];
    }
}
