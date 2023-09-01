<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\Request;

use InvalidArgumentException;

final class RussianPassportNumber
{
    public readonly string $value;

    public function __construct(string $value)
    {
        if (!preg_match('/^\d{6}$/', $value)) {
            throw new InvalidArgumentException('Неверный формат серии документа, ожидается 6 цифр');
        }

        $this->value = $value;
    }
}
