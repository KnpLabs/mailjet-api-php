<?php

namespace Mailjet\Event\Events;

use Mailjet\Event\Data\EventData;
use Mailjet\Event\Event;

class BlockedEvent extends Event
{
    public function getError()
    {
        return $this->data[EventData::DATA_ERROR];
    }

    /**
     * @link https://dev.mailjet.com/guides/#possible-values-for-errors
     */
    public function getErrorExplanation()
    {
        return $this->data[EventData::DATA_ERROR_RELATED_TO];
    }
}
