<?php

namespace __VendorPrefix\Infrastructure\__DomainNameBundle\Entity;

use __VendorPrefix\Domain\__DomainNameBundle\Entity\__EntityExtendsDataModel;

class __Entity extends __EntityExtendsDataModel
{
    use \__VendorPrefix\Infrastructure\Shared\Entity\Version;
    use \__VendorPrefix\Infrastructure\Shared\Entity\Timestampable;

    /**
     * @var integer
     */
    protected $id;

    public function getId()
    {
        return $this->id;
    }
}
