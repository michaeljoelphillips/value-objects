<?php

declare(strict_types=1);

namespace Nomad145\ValueObjects\Tests;

use Nomad145\ValueObjects\Address;
use Nomad145\ValueObjects\Dependent;
use Nomad145\ValueObjects\Guardian;
use PHPUnit\Framework\TestCase;

class GuardianTest extends TestCase
{
    public function testGetHouseholdDependents()
    {
        $address = new Address('123 Test Street', 'Dallas', 'TX', '75001');

        $dependents = [
            new Dependent('Test', 'Dependent', new Address('123 Test Street', 'Dallas', 'TX', '75001')),
            new Dependent('Test', 'Dependent', new Address('123 Imaginary Lane', 'Dallas', 'TX', '75001')),
        ];

        $subject = new Guardian('Test', 'Guardian', $address, $dependents);

        $this->assertCount(1, $subject->getHouseholdDependents());
    }
}
