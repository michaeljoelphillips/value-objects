<?php

declare(strict_types=1);

namespace Nomad145\ValueObjects\Tests;

use InvalidArgumentException;
use Nomad145\ValueObjects\Vin;
use PHPUnit\Framework\TestCase;

class VinTest extends TestCase
{
    /**
     * @dataProvider illegalValues
     */
    public function testFromStringValidatesIllegalValues(string $illegalValue)
    {
        $this->expectException(InvalidArgumentException::class);

        new Vin($illegalValue);
    }

    public function testFromStringWithValidValue()
    {
        $this->addToAssertionCount(1);

        new Vin('12345678901234567');
    }

    public function testGetValue()
    {
        $subject = new Vin('12345678901234567');

        $this->assertEquals('12345678901234567', $subject->getValue());
    }

    public function illegalValues(): array
    {
        return [
            ['aaaaaaaaaaaaaaaa'],
            ['1111111111111111l'],
            ['0000000000000000o'],
            ['9999999999999999q'],
            ['aaaaaaaaaaaaaaaaaa'],
        ];
    }
}
