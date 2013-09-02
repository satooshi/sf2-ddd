<?php

namespace __VendorPrefix\Domain\Shared\Exception;

use Doctrine\ORM\TransactionRequiredException as BaseTransactionRequiredException;

class TransactionRequiredException extends BaseTransactionRequiredException
{
}
