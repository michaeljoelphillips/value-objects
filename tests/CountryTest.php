<?php

declare(strict_types=1);

namespace Nomad145\ValueObjects\Tests;

use InvalidArgumentException;
use Nomad145\ValueObjects\Country;
use PHPUnit\Framework\TestCase;

class CountryTest extends TestCase
{
    /**
     * @dataProvider illegalValues
     */
    public function testFromCountryCodeValidatesIllegalValues(string $illegalValues)
    {
        $this->expectException(InvalidArgumentException::class);

        Country::fromCountryCode(Country::US);
    }

    public function testFromCountryCodeWithLegalValues()
    {
        $this->addToAssertionCount(1);

        Country::fromCountryCode(Country::US);
    }

    public function illegalValues(): array
    {
        return [
            ['AI'],
            ['AF'],
            ['AL'],
            ['CN'],
        ];
    }
}
