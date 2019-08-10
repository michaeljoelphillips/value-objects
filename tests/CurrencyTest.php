<?php

declare(strict_types=1);

namespace Nomad145\ValueObjects\Tests;

use InvalidArgumentException;
use Nomad145\ValueObjects\Currency;
use Nomad145\ValueObjects\CurrencyCode;
use Nomad145\ValueObjects\USD;
use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{
    public function testFromCountryAndValueValidatesIllegalValues()
    {
        $this->expectException(InvalidArgumentException::class);

        Currency::fromCountryAndValue(CurrencyCode::fromCountryCode(CurrencyCode::US), -400);
    }

    public function testAddWhenCurrenciesAreNotFromTheSameCountry()
    {
        $currencyCode = CurrencyCode::fromCountryCode(CurrencyCode::US);
        $subject = Currency::fromCountryAndValue($currencyCode, 40.00);

        $this->expectException(InvalidArgumentException::class);

        $subject->add(Currency::fromCountryAndValue(CurrencyCode::fromCountryCode('CA'), 40.00));
    }

    public function testAdd()
    {
        $currencyCode = CurrencyCode::fromCountryCode(CurrencyCode::US);
        $subject = Currency::fromCountryAndValue($currencyCode, 40.00);

        $result = $subject->add(Currency::fromCountryAndValue($currencyCode, 40.00));

        $this->assertNotSame($result, $subject);
        $this->assertEquals(80.00, $result->getValue());
    }

    public function testSubtract()
    {
        $currencyCode = CurrencyCode::fromCountryCode(CurrencyCode::US);
        $subject = Currency::fromCountryAndValue($currencyCode, 50.00);

        $result = $subject->subtract(Currency::fromCountryAndValue($currencyCode, 40.00));

        $this->assertNotSame($result, $subject);
        $this->assertEquals(10.00, $result->getValue());
    }

    public function testToString()
    {
        $subject = Currency::fromCountryAndValue(new USD(), 40.00);

        $this->assertEquals('$40.00', $subject->__toString());
    }
}
