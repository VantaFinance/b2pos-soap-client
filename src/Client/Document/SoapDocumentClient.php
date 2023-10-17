<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\Document;

use GuzzleHttp\Psr7\Request;
use Symfony\Component\Serializer\SerializerInterface as Serializer;
use Vanta\Integration\B2posSoapClient\Client\Document\Request\GetDocumentsCheckResultRequest;
use Vanta\Integration\B2posSoapClient\Client\Document\Response\GetDocumentsCheckResultResponse;
use Vanta\Integration\B2posSoapClient\DocumentClient;
use Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\B2PosClient;
use Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\B2PosClientConfiguration;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\RequestNormalizer;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\XmlEncoder;
use Yiisoft\Http\Method;

final class SoapDocumentClient implements DocumentClient
{
    public function __construct(
        private readonly Serializer $serializer,
        private readonly B2PosClient $client,
        private readonly B2PosClientConfiguration $clientConfiguration,
    ) {
    }

    public function getDocumentCheckResult(GetDocumentsCheckResultRequest $request): GetDocumentsCheckResultResponse
    {
        $requestContent = $this->serializer->serialize(
            $request,
            'xml',
            [
                RequestNormalizer::AUTHORIZATION_DATA_PATH => '[soapenv:Body][api:CheckScansOptyRequest]',
                XmlEncoder::FIELD_NAME_PREFIX              => 'api:',
            ],
        );

        $requestPsr = new Request(
            Method::POST,
            '/loan/',
            [],
            $requestContent,
        );

        $responsePsr = $this->client->sendRequest(
            $requestPsr,
            $this->clientConfiguration->withCheckErrorPath('[soapenv:Body][ns1:CheckScansOptyResponse]'),
        );
        $responseContent = $responsePsr->getBody()->__toString();

        return $this->serializer->deserialize(
            $responseContent,
            GetDocumentsCheckResultResponse::class,
            'xml',
        );
    }
}
