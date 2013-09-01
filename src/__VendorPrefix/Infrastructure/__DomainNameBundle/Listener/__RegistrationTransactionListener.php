<?php

namespace __VendorPrefix\Infrastructure\__DomainNameBundle\Listener;

use Doctrine\ORM\EntityManagerInterface; // doctrine-orm 2.4+

class __RegistrationTransactionListener
{
    private $defaultEm;
    private $dependedObject;

    public function __construct(EntityManagerInterface $defaultEm, $dependedObject)
    {
        $this->defaultEm      = $defaultEm;
        $this->dependedObject = $dependedObject;
    }

    /**
     * pattern 1.
     *
     * just flush.
     */
    public function transact1()
    {
        $this->defaultEm->flush();
    }

    /**
     * pattern 2.
     *
     * manually call beginTransaction(), commit().
     */
    public function transact2()
    {
        $this->defaultEm->beginTransaction();

        // execute raw SQL, ...
        $this->dependedObject->doSomething();

        $this->defaultEm->commit();
    }

    /**
     * pattern 3.
     *
     * execute something in transactional().
     */
    public function transact3()
    {
        $this->defaultEm->transactional(
            function($em)
            {
                // execute raw SQL, ...
                $this->dependedObject->doSomething();

                return true;
            }
        );
    }
}
