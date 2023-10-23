<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\Middleware;

use Psr\Http\Client\ClientExceptionInterface as ClientException;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

interface Middleware
{
    /**
     * @param callable(Request): Response $next
     *
     * @throws ClientException
     */
    public function process(Request $request, callable $next): Response;
}
