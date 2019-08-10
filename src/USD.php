<?php

declare(strict_types=1);

namespace Nomad145\ValueObjects;

class USD extends CurrencyCode
{
    public function formatValue(float $value): string
    {
        return sprintf('$%01.2f', $value);
    }
}
