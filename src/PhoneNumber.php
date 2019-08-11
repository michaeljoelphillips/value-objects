<?php

declare(strict_types=1);

namespace Nomad145\ValueObjects;

use Webmozart\Assert\Assert;

class PhoneNumber
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
        Assert::length($value, 10);
    }

    public function getValue(): string
    {
        return $this->getValue();
    }

    public function getAreaCode(): AreaCode
    {
        return new AreaCode(substr($this->value, 0, 3));
    }

    public function __toString()
    {
        return sprintf('(%s) %s-%s', substr($this->value, 0, 3), substr($this->value, 3, 3), substr($this->value, 6, 4));
    }
}
