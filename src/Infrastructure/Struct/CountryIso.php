<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\Struct;

use InvalidArgumentException;

final class CountryIso
{
    /**
     * @param non-empty-string $value
     */
    public function __construct(
        public readonly string $value
    ) {
        if (!preg_match('/^[a-zA-Z]{2}$/', $value)) {
            throw new InvalidArgumentException('Invalid country ISO code');
        }
    }
}
