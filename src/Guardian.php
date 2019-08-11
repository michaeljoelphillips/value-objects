<?php

declare(strict_types=1);

namespace Nomad145\ValueObjects;

class Guardian
{
    private $firstName;
    private $lastName;
    private $address;
    private $dependents;

    public function __construct(string $firstName, string $lastName, Address $address, array $dependents)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->address = $address;
        $this->dependents = $dependents;
    }

    public function getHouseholdDependents(): array
    {
        return array_filter(
            $this->dependents,
            function (Dependent $dependent): bool {
                $dependentAddress = $dependent->getAddress();

                return $this->address->isEqual($dependentAddress);
            }
        );
    }
}
