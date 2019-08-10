<?php

declare(strict_types=1);

namespace Nomad145\ValueObjects;

use Webmozart\Assert\Assert;

class Currency
{
    private $country;
    private $value;

    public static function fromCountryAndValue(Country $country, float $value): self
    {
        self::validate($value);

        return new self($country, $value);
    }

    private static function validate(float $value)
    {
        Assert::greaterThan($value, 0);
    }

    private function __construct(Country $country, float $value)
    {
        $this->country = $country;
        $this->value = $value;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function getCountry(): Country
    {
        return $this->country;
    }

    public function add(self $currency): self
    {
        Assert::same($this->getCountry(), $currency->getCountry());

        $value = $this->getValue() + $currency->getValue();

        return new self($this->getCountry(), $value);
    }
}
