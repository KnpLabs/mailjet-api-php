<?php

namespace Mailjet\Event;

interface EventFactoryInterface
{
    /**
     * @param array $data
     * @return \Mailjet\Event\EventInterface
     */
    public function createEvent(array $data);
}