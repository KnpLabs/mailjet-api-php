<?php

namespace Mailjet\Event;

interface EventInterface
{
    public function __construct(array $data);

    public function getType();
}
