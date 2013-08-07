<?php

namespace Mailjet\Event\Events;

use Mailjet\Event\Data\EventData;

class UnsubEvent extends OpenEvent
{
    protected $listId;

    public function getType()
    {
        return EventData::EVENT_UNSUB;
    }

    public function getListId()
    {
        return $this->listId;
    }

    protected function process(array $data)
    {
        parent::process($data);

        $this->listId = $data[EventData::DATA_LIST_ID];
    }
}
