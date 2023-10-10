<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\Exception;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Vanta\Integration\B2posSoapClient\B2PosSoapClientException;

final class ResponseContentErrorException extends B2PosSoapClientException
{
    public static function create(Response $response, Request $request): self
    {
        return new self($response, $request, 'Response content reports an error');
    }
}
