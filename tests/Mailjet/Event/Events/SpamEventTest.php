<?php

namespace Mailjet\Tests\Event\Events;

use Mailjet\Event\Data\EventData;
use Mailjet\Event\Events\SpamEvent;

class SpamEventTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $data = array(
            EventData::DATA_EVENT  => EventData::EVENT_SPAM,
            EventData::DATA_SOURCE => 'I have no idea how this should look',
        );

        $event = new SpamEvent($data);

        $this->assertEquals($event->getSource(), $data[EventData::DATA_SOURCE]);
    }
}