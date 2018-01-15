<?php

namespace Mailjet\Tests\Event;

use Mailjet\Event\EventFactory;
use Mailjet\Event\Data\EventData;

class EventFactoryTest extends \PHPUnit_Framework_TestCase
{
    private $factory;

    public function setUp()
    {
        $this->factory = new EventFactory();
    }

    /**
     * @dataProvider getEventsData
     */
    public function testCreateEvent(array $data, $expectedClass)
    {
        $event = $this->factory->createEvent($data);

        $this->assertInstanceOf($expectedClass, $event);
        $this->assertEquals($data, $event->getData());
        $this->assertEquals($data[EventData::DATA_EVENT], $event->getType());
    }

    public function getEventsData()
    {
        return array(
            array(
                array(
                    EventData::DATA_EVENT => EventData::EVENT_BOUNCE
                ),
                '\Mailjet\Event\Events\BounceEvent'
            ),
            array(
                array(
                    EventData::DATA_EVENT => EventData::EVENT_OPEN
                ),
                '\Mailjet\Event\Events\OpenEvent'
            ),
            array(
                array(
                    EventData::DATA_EVENT => EventData::EVENT_SPAM
                ),
                '\Mailjet\Event\Events\SpamEvent'
            ),
            array(
                array(
                    EventData::DATA_EVENT => EventData::EVENT_BLOCKED
                ),
                '\Mailjet\Event\Events\BlockedEvent'
            ),
            array(
                array(
                    EventData::DATA_EVENT => EventData::EVENT_CLICK
                ),
                '\Mailjet\Event\Events\ClickEvent'
            ),
            array(
                array(
                    EventData::DATA_EVENT => EventData::EVENT_SENT
                ),
                '\Mailjet\Event\Events\SentEvent'
            ),
            array(
                array(
                    EventData::DATA_EVENT => EventData::EVENT_UNSUB
                ),
                '\Mailjet\Event\Events\UnsubEvent'
            )
        );
    }
}