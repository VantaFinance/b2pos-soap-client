<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\Middleware;

use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\B2PosClientConfiguration;

final class UrlMiddleware implements Middleware
{
    public function process(Request $request, B2PosClientConfiguration $configuration, callable $next): Response
    {
        $request = $request->withUri(
            Utils::uriFor(sprintf('%s%s', $configuration->url, $request->getUri()->__toString())),
        );

        return $next($request);
    }
}
