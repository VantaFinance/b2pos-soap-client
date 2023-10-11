<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\Middleware;

use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\B2PosClientConfiguration;

final class AuthorizationMiddleware implements Middleware
{
    /**
     * @var non-empty-string
     */
    private readonly string $userId;

    /**
     * @var non-empty-string
     */
    private readonly string $userToken;

    /**
     * @param non-empty-string $userId
     * @param non-empty-string $userToken
     */
    public function __construct(string $userId, string $userToken)
    {
        $this->userId    = $userId;
        $this->userToken = $userToken;
    }

    public function process(Request $request, B2PosClientConfiguration $clientConfiguration, callable $next): Response
    {
        $requestContents = $request->getBody()->__toString();

        $requestContents = str_replace(
            [
                '#userId#',
                '#userToken#',
            ],
            [
                $this->userId,
                $this->userToken,
            ],
            $requestContents,
        );

        $request = $request->withBody(
            Utils::streamFor($requestContents),
        );

        $request = $request->withHeader('Content-Type', 'application/soap+xml');

        return $next($request, $clientConfiguration);
    }
}
