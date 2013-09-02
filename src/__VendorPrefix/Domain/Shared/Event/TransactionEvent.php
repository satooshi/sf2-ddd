<?php

namespace __VendorPrefix\Domain\Shared\Event;

use __VendorPrefix\Domain\Shared\DomainEvents;

/**
 * Notify transaction needed.
 */
abstract class TransactionEvent extends DomainEvent
{
    public function getEventNames()
    {
        $eventNames = $this->eventNames;
        array_unshift($eventNames, DomainEvents::TRANSACTION);

        return $eventNames;
    }
}

/*
// in domain layer

namespace __VendorPrefix\Domain\SampleDomainBundle\Event;

class RegistrationCompletedEvent extends TransactionEvent
{
    protected $eventNames = [
        DomainEvents::SEND_MAIL,
        SampleDomainEvents::REGISTRATION_COMPLETED,
    ];

    // other arguments ...
}

namespace __VendorPrefix\Domain\SampleDomainBundle\Application;

class SampleRegistrationService
{
    // Notification Pattern 1.
    // - event dispatch
    use DomainEventNotifer;

    private $dispatcher;
    private $sampleRepository;

    public function __construct(EventDispatcherInterface $dispatcher, SampleRepositoryInterface $sampleRepository)
    {
        $this->dispatcher       = $dispatcher;
        $this->sampleRepository = $sampleRepository;
    }

    // test case:
    // - is $entity registered by $user at $currentDateTime ?
    // - is $entity persisted by $sampleRepository ?
    // - are events dispatched with RegistrationCompletedEvent ?
    //     - DomainEvents::TRANSACTION
    //     - DomainEvents::SEND_MAIL
    //     - SampleDomainEvents::REGISTRATION_COMPLETED
    // - is a domain exception thrown if the registration failed ?
    public function doRegistration($user, $entity, \DateTime $currentDateTime)
    {
        // do insert, update, ...
        $entity->register($user, $currentDateTime);
        $this->sampleRepository->persist($entity);

        // notify domain event
        $domainEvent = new RegistrationCompletedEvent($this, $user, $entity, $currentDateTime);
        $this->notifyDomainEvent($domainEvent);
    }

    // Notification Pattern 2.
    // - annoation, AOP
    @Transactional
    public function doRegistration($user, $entity, \DateTime $currentDateTime)
    {
        // do insert, update, ...
        $entity->register($user, $currentDateTime);
        $this->sampleRepository->persist($entity);

        // return event ???
        // should define dto ???
        return new RegistrationCompletedEvent($this, $user, $entity, $currentDateTime);
    }
}

// Notification Pattern 2.
// implement @Transaction annotation by JMSAopBundle
// @see https://github.com/schmittjoh/JMSAopBundle/blob/master/Resources/doc/index.rst

class TransactionalPointcut implements PointcutInterface
{
    // ...
}

class TransactionalInterceptor implements MethodInterceptorInterface
{
    private $reader;
    private $dispatcher;

    public function __construct(EventDispatcher $dispatcher, Reader $reader)
    {
        $this->reader     = $reader;
        $this->dispatcher = $dispatcher;
    }

    public function intercept(MethodInvocation $invocation)
    {
        // get domain event ???
        // or dto ???
        $domainEvent = $invocation->proceed();

        foreach ($domainEvent->getEventNames() as $eventName) {
            $this->dispatcher->dispatch($eventName, $domainEvent);
        }

        return $domainEvent;
    }
}

// in infrastructure layer

class Transactor
{
    // Transaction Pattern 1.
    // - execute $em->flush() for all entity/document managers
    public function onTransact(TransactionEvent $domainEvent)
    {
        $this->flushAll();
        // $this->container->get('doctrine.orm.default_entity_manager')->flush();
        // or $this->defualtEm->flush();
    }

    // Transaction Pattern 2.
    // - map domain event to data store connection
    public function onTransact(TransactionEvent $domainEvent)
    {
        // get domain event -> connection map
        $connectionMap = $this->getConnectionMap($domainEvent);

        if ($connectionMap->contains('default', 'entity')) {
            $this
            ->getTransactor('default', 'entity') // returns EntityManager, DocumentManager, ...
            ->flush();
        } elseif (...) {
        }
    }
}
*/
