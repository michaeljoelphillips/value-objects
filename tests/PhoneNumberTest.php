<?php

declare(strict_types=1);

namespace Nomad145\ValueObjects\Tests;

use InvalidArgumentException;
use Nomad145\ValueObjects\AreaCode;
use Nomad145\ValueObjects\PhoneNumber;
use PHPUnit\Framework\TestCase;

class PhoneNumberTest extends TestCase
{
    /**
     * @dataProvider invalidValues
     */
    public function testPhoneNumberWithInvalidValue(string $invalidValue)
    {
        $this->expectException(InvalidArgumentException::class);

        new PhoneNumber($invalidValue);
    }

    public function testGetAreaCode()
    {
        $subject = new PhoneNumber('8174567890');

        $this->assertEquals(new AreaCode('817'), $subject->getAreaCode());
    }

    public function invalidValues(): array
    {
        return [
            ['abc'],
            ['1abc4567890'],
            ['181745678901'],
        ];
    }
}
