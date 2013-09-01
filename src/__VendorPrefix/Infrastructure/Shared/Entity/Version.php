<?php

namespace __VendorPrefix\Infrastructure\Shared\Entity;

trait Version
{
    protected $version;

    public function getVersion()
    {
        return $this->version;
    }

    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }
}
