<?php

declare(strict_types=1);

namespace Nomad145\ValueObjects;

use Webmozart\Assert\Assert;

class Vin
{
    private const LENGTH = 17;
    private const ILLEGAL_CHARACTERS = ['l', 'o', 'q'];

    private $value;

    public static function fromString(string $value): self
    {
        self::validate($value);

        return new self($value);
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    private static function validate(string $value): void
    {
        Assert::length($value, self::LENGTH);

        foreach (self::ILLEGAL_CHARACTERS as $character) {
            Assert::notContains($value, $character);
        }
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
