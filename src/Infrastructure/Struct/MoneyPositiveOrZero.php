<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\Struct;

use InvalidArgumentException;
use Money\Currency;
use Money\Money;
use Stringable;

final class MoneyPositiveOrZero implements Stringable
{
    public readonly Money $value;

    /**
     * @param numeric-string $amount - сумма в копейках
     */
    public function __construct(string $amount)
    {
        $this->value = new Money($amount, new Currency('RUB'));

        if (!$this->value->isPositive() && !$this->value->isZero()) {
            throw new InvalidArgumentException('Ожидали позитивное число или ноль');
        }
    }

    /**
     * @return numeric-string
     */
    public function __toString(): string
    {
        return $this->value->getAmount();
    }
}
