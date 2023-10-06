<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\Request;

use InvalidArgumentException;

final class RussianPassportSeries
{
    public readonly string $value;

    public function __construct(string $value)
    {
        if (!preg_match('/^\d{4}$/', $value)) {
            throw new InvalidArgumentException('Неверный формат серии документа, ожидается 4 цифры');
        }

        $this->value = $value;
    }
}
