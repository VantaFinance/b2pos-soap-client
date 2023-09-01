<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient;

final class ConfigurationClient
{
    /**
     * @var non-empty-string
     */
    public readonly string $url;

    /**
     * @param non-empty-string $url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }
}
