<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient;

use Psr\Http\Client\ClientExceptionInterface as ClientException;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\B2PosClientConfiguration;

// @todo метод withB2PosClient в builder-е

interface B2PosClient
{
    /**
     * @throws ClientException
     */
    public function sendRequest(Request $request, B2PosClientConfiguration $clientConfiguration): Response;
}
