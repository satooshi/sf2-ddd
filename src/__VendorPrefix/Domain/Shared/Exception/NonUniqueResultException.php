<?php

namespace __VendorPrefix\Domain\Shared\Exception;

use Doctrine\ORM\NonUniqueResultException as BaseNonUniqueResultException;

class NonUniqueResultException extends BaseNonUniqueResultException
{
}
