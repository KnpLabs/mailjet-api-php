<?php

namespace Mailjet\Event\Events;

use Mailjet\Event\Data\EventData;

class BounceEvent extends BlockedEvent
{
    protected $blocked;
    protected $hardBounce;

    public function getType()
    {
        return EventData::EVENT_BOUNCE;
    }

    public function isBlocked()
    {
        return $this->blocked;
    }

    public function isHardBounce()
    {
        return $this->hardBounce;
    }

    protected function process(array $data)
    {
        parent::process($data);

        $this->blocked    = $data[EventData::DATA_BLOCKED];
        $this->hardBounce = $data[EventData::DATA_HARD_BOUNCE];
    }
}
