<?php

namespace Mailjet\Tests\Event\Events;

use Mailjet\Event\Data\EventData;
use Mailjet\Event\Events\OpenEvent;

/**
 * Also test for generic getters that are same for most of events
 */
class OpenEventTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $data = array(
            EventData::DATA_EVENT           => EventData::EVENT_OPEN,
            EventData::DATA_EMAIL           => 'email@example.com',
            EventData::DATA_TIME            => '1377800004 UTC',
            EventData::DATA_CAMPAIGN_ID     => 123,
            EventData::DATA_CONTACT_ID      => 321,
            EventData::DATA_CUSTOM_CAMPAIGN => 'campaign',
            EventData::DATA_IP              => '127.0.0.1',
            EventData::DATA_GEO             => 'US',
            EventData::DATA_USER_AGENT      => 'Mozilla/5.0 (X11; U; Linux; i686; en-US; rv:1.6) Gecko Debian/1.6-7'
        );

        $event = new OpenEvent($data);

        $this->assertEquals($data[EventData::DATA_EVENT],           $event->getType());
        $this->assertEquals($data[EventData::DATA_EMAIL],           $event->getEmail());
        $this->assertEquals($data[EventData::DATA_TIME],            $event->getTime());
        $this->assertEquals($data[EventData::DATA_CAMPAIGN_ID],     $event->getCampaignId());
        $this->assertEquals($data[EventData::DATA_CONTACT_ID],      $event->getContactId());
        $this->assertEquals($data[EventData::DATA_CUSTOM_CAMPAIGN], $event->getCustomCampaign());
        $this->assertEquals($data[EventData::DATA_IP],              $event->getIp());
        $this->assertEquals($data[EventData::DATA_GEO],             $event->getGeo());
        $this->assertEquals($data[EventData::DATA_USER_AGENT],      $event->getUserAgent());
    }
}