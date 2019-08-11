<?php

declare(strict_types=1);

namespace Nomad145\ValueObjects;

class Address
{
    private $streetAddress;
    private $city;
    private $state;
    private $zip;

    public function __construct(string $streetAddress, string $city, string $state, string $zip)
    {
        $this->streetAddress = $streetAddress;
        $this->city = $city;
        $this->state = $state;
        $this->zip = $zip;
    }

    public function isEqual(self $address): bool
    {
        return $this->zip === $address->zip
            && $this->city === $address->city
            && $this->state === $address->state
            && $this->streetAddress === $address->streetAddress;
    }
}
