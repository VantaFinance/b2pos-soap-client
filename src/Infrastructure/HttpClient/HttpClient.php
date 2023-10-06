<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient;

use Psr\Http\Client\ClientInterface as PsrHttpClient;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\Middleware\PipelineMiddleware;

final class HttpClient implements PsrHttpClient
{
    private readonly PipelineMiddleware $pipeline;

    private readonly ConfigurationClient $configuration;

    public function __construct(ConfigurationClient $configuration, PipelineMiddleware $pipeline)
    {
        $this->configuration = $configuration;
        $this->pipeline      = $pipeline;
    }

    public function sendRequest(Request $request): Response
    {
        return $this->pipeline->process($request, $this->configuration);
    }
}
