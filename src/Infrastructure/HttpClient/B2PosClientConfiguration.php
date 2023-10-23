<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient;

final class B2PosClientConfiguration
{
    /**
     * @param non-empty-string $url
     */
    public function __construct(
        public readonly string $url,
    ) {
    }
}
