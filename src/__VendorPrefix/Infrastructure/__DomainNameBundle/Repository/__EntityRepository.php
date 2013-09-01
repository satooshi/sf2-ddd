<?php

namespace __VendorPrefix\Infrastructure\__DomainNameBundle\Repository;

use __VendorPrefix\Domain\__DomainNameBundle\Entity\__EntityExtendsDataModel;
use __VendorPrefix\Domain\__DomainNameBundle\Repository\__EntityRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class __EntityRepository extends EntityRepository implements __EntityRepositoryInterface
{
    public function persist(__EntityExtendsDataModel $entity)
    {
        $this->em->persist($entity);
    }

    public function remove(__EntityExtendsDataModel $entity)
    {
        $this->em->remove($entity);
    }
}
