<?php

namespace Mailjet\Event\Events;

use Mailjet\Event\Data\EventData;

class BlockedEvent extends EmailEvent
{
    public function getError()
    {
        return $this->data[EventData::DATA_ERROR];
    }

    /**
     * @link https://www.mailjet.com/docs/event_tracking#errortable
     */
    public function getErrorExplanation()
    {
        return $this->data[EventData::DATA_ERROR_RELATED_TO];
    }
}
