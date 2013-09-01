<?php

namespace __VendorPrefix\Domain\Shared\Exception;

use Doctrine\ORM\OptimisticLockException as BaseOptimisticLockException;

/**
 * Where should be located this kind of concurrency exception ...
 *
 * - Domain layer should be aware of concurrency ?
 * - Application layer must know the exception since they should show error message to users.
 * - Infrastructure layer must know the exception since they can throw the exception.
 *
 * @see http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/reference/transactions-and-concurrency.html
 */
class OptimisticLockException extends BaseOptimisticLockException
{
}
