<?php

namespace __VendorPrefix\Domain\Shared\Event;

trait DomainEventNotifer
{
    protected function notifyDomainEvent(DomainEvent $domainEvent)
    {
        foreach ($domainEvent->getEventNames() as $eventName) {
            $this->dispatcher->dispatch($eventName, $domainEvent);
        }
    }
}
