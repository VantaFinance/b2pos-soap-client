<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\Request;

use InvalidArgumentException;
use Money\Money;
use Stringable;

final class MoneyPositiveOrZero implements Stringable
{
    public function __construct(
        public readonly Money $value
    ) {
        if (!$value->isPositive() && !$value->isZero()) {
            throw new InvalidArgumentException('Ожидали позитивное число или ноль');
        }
    }

    public function getValue(): Money
    {
        return $this->value;
    }

    /**
     * @return numeric-string
     */
    public function __toString(): string
    {
        return $this->value->getAmount();
    }
}
