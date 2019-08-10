<?php

declare(strict_types=1);

namespace Nomad145\ValueObjects;

use Webmozart\Assert\Assert;

class Currency
{
    private $value;
    private $currencyCode;

    public static function fromCountryAndValue(CurrencyCode $currencyCode, float $value): self
    {
        self::validate($value);

        return new self($currencyCode, $value);
    }

    private static function validate(float $value)
    {
        Assert::greaterThan($value, 0);
    }

    private function __construct(CurrencyCode $currencyCode, float $value)
    {
        $this->currencyCode = $currencyCode;
        $this->value = $value;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function getCountry(): CurrencyCode
    {
        return $this->currencyCode;
    }

    public function add(self $currency): self
    {
        Assert::same($this->getCountry(), $currency->getCountry());

        $value = $this->getValue() + $currency->getValue();

        return new self($this->getCountry(), $value);
    }

    public function subtract(self $currency): self
    {
        Assert::same($this->getCountry(), $currency->getCountry());

        $value = $this->getValue() - $currency->getValue();

        return new self($this->getCountry(), $value);
    }

    public function __toString(): string
    {
        return $this->currencyCode->formatValue($this->value);
    }
}
