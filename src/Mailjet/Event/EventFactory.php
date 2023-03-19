<?php

namespace Mailjet\Event;

use Mailjet\Event\Data\EventData;

class EventFactory implements EventFactoryInterface
{
    private $classMap = array(
        EventData::EVENT_BLOCKED => '\Mailjet\Event\Events\BlockedEvent',
        EventData::EVENT_BOUNCE  => '\Mailjet\Event\Events\BounceEvent',
        EventData::EVENT_CLICK   => '\Mailjet\Event\Events\ClickEvent',
        EventData::EVENT_OPEN    => '\Mailjet\Event\Events\OpenEvent',
        EventData::EVENT_SENT    => '\Mailjet\Event\Events\SentEvent',
        EventData::EVENT_SPAM    => '\Mailjet\Event\Events\SpamEvent',
        EventData::EVENT_UNSUB   => '\Mailjet\Event\Events\UnsubEvent'
    );

    public function createEvent(array $data)
    {
        $class = $this->classMap[$data[EventData::DATA_EVENT]];

        return new $class($data);
    }
}
