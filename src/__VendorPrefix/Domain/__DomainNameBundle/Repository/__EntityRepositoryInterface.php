<?php

namespace __VendorPrefix\Domain\__DomainNameBundle\Repository;

use __VendorPrefix\Domain\__DomainNameBundle\Entity\__EntityExtendsDataModel;

/**
 * Object related to persistence logic in the Domain layer should depend on this interface.
 * __EntityRepository in the Infrastructure layer must implement this interface.
 */
interface __EntityRepositoryInterface extends \Doctrine\Common\Persistence\ObjectRepository
{
    public function persist(__EntityExtendsDataModel $entity);
    public function remove(__EntityExtendsDataModel $entity);
}
