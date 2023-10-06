<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\Request;

use InvalidArgumentException;

final class Email
{
    /**
     * @param non-empty-string $value
     */
    public function __construct(
        public readonly string $value,
    ) {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(sprintf('Не валидный email: %s', $value));
        }
    }
}
