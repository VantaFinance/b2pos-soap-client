<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient;

use Psr\Http\Client\ClientInterface as PsrHttpClient;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\Middleware\Middleware;

final class B2PosClient
{
    /**
     * @var array<int, Middleware>
     */
    private readonly array $middlewares;

    private readonly PsrHttpClient $client;

    /**
     * @param array<int, Middleware> $middlewares
     */
    public function __construct(array $middlewares, PsrHttpClient $client)
    {
        $this->middlewares = $middlewares;
        $this->client      = $client;
    }

    public function sendRequest(Request $request, B2PosClientConfiguration $clientConfiguration): Response
    {
        $middlewares = $this->middlewares;
        $middleware  = array_shift($middlewares);

        if (null == $middleware) {
            return $this->client->sendRequest($request);
        }

        return $middleware->process($request, $clientConfiguration, [new self($middlewares, $this->client), 'sendRequest']);
    }
}
