<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient;

final class B2PosClientConfiguration
{
    /**
     * @var non-empty-string
     */
    public readonly string $url;

    /**
     * @var non-empty-string|null
     */
    public readonly ?string $checkErrorPath;

    /**
     * @param non-empty-string      $url
     * @param non-empty-string|null $checkErrorPath
     */
    public function __construct(string $url, ?string $checkErrorPath = null)
    {
        $this->url            = $url;
        $this->checkErrorPath = $checkErrorPath;
    }

    /**
     * @param non-empty-string $checkErrorPath
     */
    public function withCheckErrorPath(string $checkErrorPath): self
    {
        return new self($this->url, $checkErrorPath);
    }
}
