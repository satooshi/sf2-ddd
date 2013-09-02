<?php

namespace __VendorPrefix\Domain\Shared\Exception;

use Doctrine\ORM\EntityNotFoundException as BaseEntityNotFoundException;

/**
 * result in 404 not found in many cases.
 *
 * showAction() -> find() -> entity not found
 */
class EntityNotFoundException extends BaseEntityNotFoundException
{
}
