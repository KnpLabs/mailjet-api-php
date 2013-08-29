<?php

namespace Mailjet\Tests\Event\Events;

use Mailjet\Event\Data\EventData;
use Mailjet\Event\Events\ClickEvent;

class ClickEventTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $data = array(
            EventData::DATA_EVENT => EventData::EVENT_CLICK,
            EventData::DATA_URL   => 'http://example.com',
        );

        $event = new ClickEvent($data);

        $this->assertEquals($event->getUrl(), $data[EventData::DATA_URL]);
    }
}