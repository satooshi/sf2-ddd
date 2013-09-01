<?php

namespace __VendorPrefix\Infrastructure\__DomainNameBundle\Factory;

use __VendorPrefix\Domain\__DomainNameBundle\Factory\__EntityFactoryInterface;
use __VendorPrefix\Infrastructure\__DomainNameBundle\Entity\__Entity;

class __EntityFactory implements __EntityFactoryInterface
{
    public function create()
    {
        return new __Entity();
    }
}
