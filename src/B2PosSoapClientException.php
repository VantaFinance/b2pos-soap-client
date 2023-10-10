<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient;

use Exception;
use Psr\Http\Client\ClientExceptionInterface as ClientException;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Throwable;

abstract class B2PosSoapClientException extends Exception implements ClientException
{
    public readonly Response $response;

    public readonly Request $request;

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
}
