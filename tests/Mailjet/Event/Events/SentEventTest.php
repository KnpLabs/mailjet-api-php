<?php

namespace Mailjet\Tests\Event\Events;

use Mailjet\Event\Data\EventData;
use Mailjet\Event\Events\SentEvent;

class SentEventTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $data = array(
            EventData::DATA_EVENT      => EventData::EVENT_SENT,
            EventData::DATA_SMTP_REPLY => 'sent (250 2.0.0 OK 1433333948 fa5si855896wjc.199 - gsmtp)'
        );

        $event = new SentEvent($data);

        $this->assertEquals($event->getSMTPReply(), $data[EventData::DATA_SMTP_REPLY]);
    }
}