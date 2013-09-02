<?php

namespace __VendorPrefix\Domain\Shared\Exception;

use Doctrine\ORM\PessimisticLockException as BasePessimisticLockException;

/**
 * @see http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/reference/transactions-and-concurrency.html
 */
class PessimisticLockException extends BasePessimisticLockException
{
}
