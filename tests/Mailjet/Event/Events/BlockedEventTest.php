<?php

namespace Mailjet\Tests\Event\Events;

use Mailjet\Event\Data\EventData;
use Mailjet\Event\Events\BlockedEvent;

class BlockedEventTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $data = array(
            EventData::DATA_EVENT            => EventData::EVENT_BLOCKED,
            EventData::DATA_ERROR            => 'error',
            EventData::DATA_ERROR_RELATED_TO => 'error_related'
        );

        $event = new BlockedEvent($data);

        $this->assertEquals($event->getError(),            $data[EventData::DATA_ERROR]);
        $this->assertEquals($event->getErrorExplanation(), $data[EventData::DATA_ERROR_RELATED_TO]);
    }
}