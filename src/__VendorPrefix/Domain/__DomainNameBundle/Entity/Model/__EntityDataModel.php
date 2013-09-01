<?php

namespace __VendorPrefix\Domain\__DomainNameBundle\Entity\Model;

class __EntityDataModel
{
    /**
     * @var string
     */
    protected $prop1;

    /**
     * @var integer
     */
    protected $prop2;

    public function setProp1($prop1)
    {
        $this->prop1 = $prop1;

        return $this;
    }

    public function getProp1()
    {
        return $this->prop1;
    }

    public function setProp2($prop2)
    {
        $this->prop2 = $prop2;

        return $this;
    }

    public function getProp2()
    {
        return $this->prop2;
    }
}
