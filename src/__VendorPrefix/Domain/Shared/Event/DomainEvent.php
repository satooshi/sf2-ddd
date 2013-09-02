<?php

namespace __VendorPrefix\Domain\Shared\Event;

use Symfony\Component\EventDispatcher\Event;

/**
 * Domain event must extend this abstract event.
 */
abstract class DomainEvent extends Event
{
    protected $eventNames = [];

    public function getEventNames()
    {
        return $this->eventNames;
    }
}
