<?php

namespace Mailjet\Event\Events;

use Mailjet\Event\Data\EventData;

class BounceEvent extends BlockedEvent
{
    public function isBlocked()
    {
        return $this->data[EventData::DATA_BLOCKED];
    }

    public function isHardBounce()
    {
        return $this->data[EventData::DATA_HARD_BOUNCE];
    }
}
