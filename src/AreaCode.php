<?php

declare(strict_types=1);

namespace Nomad145\ValueObjects;

use Webmozart\Assert\Assert;

class AreaCode
{
    private $value;

    public function __construct(string $value)
    {
        self::validate($value);

        $this->value = $value;
    }

    private static function validate(string $value): void
    {
        Assert::digits($value);
        Assert::length($value, 3);
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->getValue();
    }
}
