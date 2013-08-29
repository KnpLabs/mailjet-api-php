<?php

namespace Mailjet\Tests\Event\Events;

use Mailjet\Event\Data\EventData;
use Mailjet\Event\Events\BounceEvent;

class BounceEventTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $data = array(
            EventData::DATA_EVENT       => EventData::EVENT_BOUNCE,
            EventData::DATA_BLOCKED     => true,
            EventData::DATA_HARD_BOUNCE => false
        );

        $event = new BounceEvent($data);

        $this->assertEquals($event->isBlocked(),    $data[EventData::DATA_BLOCKED]);
        $this->assertEquals($event->isHardBounce(), $data[EventData::DATA_HARD_BOUNCE]);
    }
}