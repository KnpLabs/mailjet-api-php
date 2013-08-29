<?php

namespace Mailjet\Tests\Event\Events;

use Mailjet\Event\Data\EventData;
use Mailjet\Event\Events\UnsubEvent;

class UnsubEventTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $data = array(
            EventData::DATA_EVENT   => EventData::EVENT_UNSUB,
            EventData::DATA_LIST_ID => 12234,
        );

        $event = new UnsubEvent($data);

        $this->assertEquals($event->getListId(), $data[EventData::DATA_LIST_ID]);
    }
}