<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\Middleware;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\B2PosClientConfiguration;

final class ContentTypeHeaderMiddleware implements Middleware
{
    public function process(Request $request, B2PosClientConfiguration $clientConfiguration, callable $next): Response
    {
        $request = $request->withHeader('Content-Type', 'application/soap+xml'); // иначе не работает на guzzlehttp/guzzle

        return $next($request, $clientConfiguration);
    }
}
