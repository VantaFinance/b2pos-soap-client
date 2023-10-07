<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\Struct;

use InvalidArgumentException;

final class DivisionCode
{
    /**
     * @param non-empty-string $value
     */
    public function __construct(
        public readonly string $value
    ) {
        if (!preg_match('/^\d{3}-\d{3}$/m', $value)) {
            throw new InvalidArgumentException('Неверный формат кода подразделения');
        }
    }
}
