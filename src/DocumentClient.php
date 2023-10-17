<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient;

use Psr\Http\Client\ClientExceptionInterface as ClientException;
use Vanta\Integration\B2posSoapClient\Client\Document\Request\GetDocumentsCheckResultRequest;
use Vanta\Integration\B2posSoapClient\Client\Document\Response\GetDocumentsCheckResultResponse;

interface DocumentClient
{
    /**
     * @throws ClientException
     */
    public function getDocumentCheckResult(GetDocumentsCheckResultRequest $request): GetDocumentsCheckResultResponse;
}
