<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\Exception;

use Psr\Http\Client\ClientExceptionInterface as ClientException;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Throwable;
use Vanta\Integration\B2posSoapClient\B2PosSoapClientException;

abstract class HttpException extends B2PosSoapClientException implements ClientException
{
    private readonly Response $response;

    private readonly Request $request;

    final protected function __construct(
        Response $response,
        Request $request,
        string $message = '',
        int $code = 0,
        ?Throwable $previous = null
    ) {
        $this->response = $response;
        $this->request  = $request;

        parent::__construct($message, $code, $previous);
    }

    final public function getResponse(): Response
    {
        return $this->response;
    }

    final public function getRequest(): Request
    {
        return $this->request;
    }
}
