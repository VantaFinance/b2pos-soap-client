<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\Middleware;

use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class UrlMiddleware implements Middleware
{
    /**
     * @param non-empty-string $url
     */
    public function __construct(
        public string $url,
    ) {
    }

    public function process(Request $request, callable $next): Response
    {
        $request = $request->withUri(
            Utils::uriFor(sprintf('%s%s', $this->url, $request->getUri()->__toString())),
        );

        return $next($request);
    }
}
