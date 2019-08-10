<?php

declare(strict_types=1);

namespace Nomad145\ValueObjects;

use Webmozart\Assert\Assert;

abstract class CurrencyCode
{
    public const US = 'US';
    public const CA = 'CA';
    public const AU = 'AU';

    private const VALID_COUNTRIES = [
        self::US => USD::class,
        self::CA => CAD::class,
        self::AU => AUD::class,
    ];

    public static function fromCountryCode(string $value): self
    {
        self::validate($value);

        $currencyCode = self::VALID_COUNTRIES[$value];

        return new $currencyCode();
    }

    private static function validate(string $value)
    {
        Assert::keyExists(self::VALID_COUNTRIES, $value);
    }

    abstract public function formatValue(float $value): string;
}
