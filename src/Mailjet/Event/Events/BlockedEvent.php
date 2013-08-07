<?php

namespace Mailjet\Event\Events;

use Mailjet\Event\Data\EventData;

class BlockedEvent extends EmailEvent
{
    protected $error;
    protected $errorExplanation;

    public function getType()
    {
        return EventData::EVENT_BLOCKED;
    }

    public function getError()
    {
        return $this->error;
    }

    /**
     * @link https://www.mailjet.com/docs/event_tracking#errortable
     */
    public function getErrorExplanation()
    {
        return $this->errorExplanation;
    }

    protected function process(array $data)
    {
        $this->error            = $data[EventData::DATA_ERROR];
        $this->errorExplanation = $data[EventData::DATA_ERROR_RELATED_TO];
    }
}
