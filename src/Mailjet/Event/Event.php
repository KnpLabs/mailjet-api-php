<?php

namespace Mailjet\Event;

use Mailjet\Event\Data\EventData;

abstract class Event implements EventInterface
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getTime()
    {
        return $this->data[EventData::DATA_TIME];
    }

    public function getData()
    {
        return $this->data;
    }

    public function getType()
    {
        return $this->data[EventData::DATA_EVENT];
    }
}
