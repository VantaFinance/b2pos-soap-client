<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\Exception;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Throwable;
use Vanta\Integration\B2posSoapClient\B2PosSoapClientException;

final class ResponseContentErrorException extends B2PosSoapClientException
{
    public readonly ?string $errorCode;

    public readonly ?string $errorDescription;

    private function __construct(
        Response $response,
        Request $request,
        string $message = '',
        int $code = 0,
        ?Throwable $previous = null,
        ?string $errorCode = null,
        ?string $errorDescription = null,
    ) {
        $this->errorCode        = $errorCode;
        $this->errorDescription = $errorDescription;

        parent::__construct(
            $response,
            $request,
            $message,
            $code,
            $previous,
        );
    }

    public static function create(
        Response $response,
        Request $request,
        ?string $errorCode = null,
        ?string $errorDescription = null,
    ): self {
        return new self(
            response: $response,
            request: $request,
            message: 'Response content reports an error',
            errorCode: $errorCode,
            errorDescription: $errorDescription,
        );
    }
}
