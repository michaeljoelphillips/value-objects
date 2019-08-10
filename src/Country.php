<?php

declare(strict_types=1);

namespace Nomad145\ValueObjects;

use Webmozart\Assert\Assert;

class Country
{
    public const US = 'US';
    public const CA = 'CA';
    public const AU = 'AU';

    private const VALID_COUNTRIES = [
        self::US,
        self::CA,
        self::AU,
    ];

    private $value;

    public static function fromCountryCode(string $value): self
    {
        self::validate($value);

        return new self($value);
    }

    private static function validate(string $value)
    {
        Assert::oneOf($value, self::VALID_COUNTRIES);
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }
}
