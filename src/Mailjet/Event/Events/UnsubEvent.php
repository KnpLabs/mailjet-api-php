<?php

namespace Mailjet\Event\Events;

use Mailjet\Event\Data\EventData;

class UnsubEvent extends OpenEvent
{
    public function getListId()
    {
        return $this->data[EventData::DATA_LIST_ID];
    }
}
