<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\Middleware;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\Exception\InternalServerErrorException;
use Yiisoft\Http\Status;

final class InternalServerMiddleware implements Middleware
{
    public function process(Request $request, callable $next): Response
    {
        $response   = $next($request);
        $statusCode = $response->getStatusCode();

        if (!(Status::INTERNAL_SERVER_ERROR <= $statusCode && $statusCode <= Status::NETWORK_AUTHENTICATION_REQUIRED)) {
            return $response;
        }

        throw InternalServerErrorException::create($response, $request);
    }
}
