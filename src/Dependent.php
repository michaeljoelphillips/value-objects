<?php

declare(strict_types=1);

namespace Nomad145\ValueObjects;

class Dependent
{
    private $firstName;
    private $lastName;
    private $address;

    public function __construct(string $firstName, string $lastName, Address $address)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->address = $address;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }
}
