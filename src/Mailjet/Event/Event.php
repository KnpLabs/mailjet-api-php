<?php

namespace Mailjet\Event;

use Mailjet\Event\Data\EventData;

abstract class Event implements EventInterface
{
    protected $time;

    public function __construct(array $data)
    {
        $this->time = $data[EventData::DATA_TIME];

        $this->process($data);
    }

    public function getTime()
    {
        return $this->time;
    }

    abstract public function getType();
    abstract protected function process(array $data);
}
