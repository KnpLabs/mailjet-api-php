<?php

namespace Mailjet\Tests\Event\Events;

use Mailjet\Event\Data\EventData;
use Mailjet\Event\Events\TypofixEvent;

class TypofixEventTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $data = array(
            EventData::DATA_EVENT  => EventData::EVENT_TYPOFIX,
            EventData::DATA_ORIGINAL_ADDRESS => 'examlpe@example.com',
            EventData::DATA_NEW_ADDRESS      => 'example@example.com',
        );

        $event = new TypofixEvent($data);

        $this->assertEquals($event->getOriginalAddress(), $data[EventData::DATA_ORIGINAL_ADDRESS]);
        $this->assertEquals($event->getNewAddress(),      $data[EventData::DATA_NEW_ADDRESS]);
    }
}