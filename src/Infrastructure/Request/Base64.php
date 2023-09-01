<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\Request;

use InvalidArgumentException;

final class Base64
{
    /**
     * @param non-empty-string $value
     */
    private function __construct(
        public readonly string $value
    ) {
    }

    /**
     * @param non-empty-string $rawString
     */
    public static function createFromRaw(string $rawString): self
    {
        return new self(base64_encode($rawString));
    }

    /**
     * @param non-empty-string $base64String
     */
    public static function createFromBase64(string $base64String): self
    {
        if (false === base64_decode($base64String, true)) {
            throw new InvalidArgumentException('Invalid base64String');
        }

        return new self($base64String);
    }

    /**
     * @return non-empty-string
     */
    public function __toString(): string
    {
        return $this->value;
    }
}
