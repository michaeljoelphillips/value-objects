<?php

declare(strict_types=1);

namespace Nomad145\ValueObjects\Tests;

use InvalidArgumentException;
use Nomad145\ValueObjects\CurrencyCode;
use PHPUnit\Framework\TestCase;

class CurrencyCodeTest extends TestCase
{
    /**
     * @dataProvider illegalValues
     */
    public function testFromCountryCodeValidatesIllegalValues(string $illegalValues)
    {
        $this->expectException(InvalidArgumentException::class);

        CurrencyCode::fromCountryCode($illegalValues);
    }

    public function testFromCountryCodeWithLegalValues()
    {
        $this->addToAssertionCount(1);

        CurrencyCode::fromCountryCode(CurrencyCode::US);
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
