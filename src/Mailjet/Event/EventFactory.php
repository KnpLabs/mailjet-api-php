<?php

namespace Mailjet\Event;

use Mailjet\Event\Data\EventData;

class EventFactory
{
    private $classMap = array(
        EventData::EVENT_BLOCKED => '\Mailjet\Event\Events\BlockedEvent',
        EventData::EVENT_BOUNCE  => '\Mailjet\Event\Events\BounceEvent',
        EventData::EVENT_CLICK   => '\Mailjet\Event\Events\ClickEvent',
        EventData::EVENT_OPEN    => '\Mailjet\Event\Events\OpenEvent',
        EventData::EVENT_SPAM    => '\Mailjet\Event\Events\SpamEvent',
        EventData::EVENT_TYPOFIX => '\Mailjet\Event\Events\TypofixEvent',
        EventData::EVENT_UNSUB   => '\Mailjet\Event\Events\UnsubEvent'
    );

    public function createEvent(array $data)
    {
        $type = $this->classMap[$data[EventData::DATA_EVENT]];

        return new $type($data);
    }
}
