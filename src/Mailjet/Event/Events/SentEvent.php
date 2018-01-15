<?php

namespace Mailjet\Event\Events;

use Mailjet\Event\Data\EventData;
use Mailjet\Event\Event;

class SentEvent extends Event
{
    public function getSMTPReply()
    {
        return $this->data[EventData::DATA_SMTP_REPLY];
    }
}
