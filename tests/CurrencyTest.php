<?php

declare(strict_types=1);

namespace Nomad145\ValueObjects\Tests;

use InvalidArgumentException;
use Nomad145\ValueObjects\Country;
use Nomad145\ValueObjects\Currency;
use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{
    public function testFromCountryAndValueValidatesIllegalValues()
    {
        $this->expectException(InvalidArgumentException::class);

        Currency::fromCountryAndValue(Country::fromCountryCode(Country::US), -400);
    }

    public function testAddWhenCurrenciesAreNotFromTheSameCountry()
    {
        $country = Country::fromCountryCode(Country::US);
        $subject = Currency::fromCountryAndValue($country, 40.00);

        $this->expectException(InvalidArgumentException::class);

        $subject->add(Currency::fromCountryAndValue(Country::fromCountryCode('CA'), 40.00));
    }

    public function testAdd()
    {
        $country = Country::fromCountryCode(Country::US);
        $subject = Currency::fromCountryAndValue($country, 40.00);

        $result = $subject->add(Currency::fromCountryAndValue($country, 40.00));

        $this->assertNotSame($result, $subject);
        $this->assertEquals(80.00, $result->getValue());
    }
}
