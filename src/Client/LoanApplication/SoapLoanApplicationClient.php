<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Client\ClientInterface as PsrHttpClient;
use Symfony\Component\Serializer\Normalizer\UnwrappingDenormalizer;
use Symfony\Component\Serializer\SerializerInterface as Serializer;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\Full\NewLoanApplicationRequest as NewLoanApplicationRequestFull;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\GetLoanApplicationStatusRequest;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\Short\NewLoanApplicationRequest as NewLoanApplicationRequestShort;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Response\GetLoanApplicationStatusResponse;
use Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\Middleware\ResponseContentErrorMiddleware;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\RequestNormalizer;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\XmlEncoder;
use Vanta\Integration\B2posSoapClient\LoanApplicationClient;
use Yiisoft\Http\Method;

final class SoapLoanApplicationClient implements LoanApplicationClient
{
    public function __construct(
        private readonly Serializer $serializer,
        private readonly PsrHttpClient $client,
    ) {
    }

    public function newLoanApplicationShort(NewLoanApplicationRequestShort $request): string
    {
        $requestContent = $this->serializer->serialize(
            $request,
            'xml',
            [
                RequestNormalizer::AUTHORIZATION_DATA_PATH => '[env:Body][ns1:SendShortOptyRequest]',
                XmlEncoder::FIELD_NAME_PREFIX              => 'ns1:',
            ],
        );

        $requestPsr = new Request(
            Method::POST,
            '/loan/',
            [
                ResponseContentErrorMiddleware::CHECK_ERROR_PATH => '[env:Body][ns1:SendShortOptyResponse]',
            ],
            $requestContent,
        );

        $responsePsr     = $this->client->sendRequest($requestPsr);
        $responseContent = $responsePsr->getBody()->__toString();

        /* @phpstan-ignore-next-line */
        return $this->serializer->deserialize(
            $responseContent,
            'numeric-string',
            'xml',
            [
                UnwrappingDenormalizer::UNWRAP_PATH => '[env:Body][ns1:SendShortOptyResponse][ns1:profileID]',
            ],
        );
    }

    public function newLoanApplicationFull(NewLoanApplicationRequestFull $request): string
    {
        $requestContent = $this->serializer->serialize(
            $request,
            'xml',
            [
                RequestNormalizer::AUTHORIZATION_DATA_PATH => '[soapenv:Body][api:CreateOptyRequest]',
                XmlEncoder::FIELD_NAME_PREFIX              => 'api:',
            ],
        );

        $requestPsr = new Request(
            Method::POST,
            '/loan/',
            [
                ResponseContentErrorMiddleware::CHECK_ERROR_PATH => '[soapenv:Body][ns1:CreateOptyResponse]',
            ],
            $requestContent,
        );

        $responsePsr     = $this->client->sendRequest($requestPsr);
        $responseContent = $responsePsr->getBody()->__toString();

        /* @phpstan-ignore-next-line */
        return $this->serializer->deserialize(
            $responseContent,
            'numeric-string',
            'xml',
            [
                UnwrappingDenormalizer::UNWRAP_PATH => '[soapenv:Body][ns1:CreateOptyResponse][ns1:profileID]',
            ],
        );
    }

    public function getLoanApplicationStatus(string $profileId): GetLoanApplicationStatusResponse
    {
        $requestContent = $this->serializer->serialize(
            new GetLoanApplicationStatusRequest($profileId),
            'xml',
            [
                RequestNormalizer::AUTHORIZATION_DATA_PATH => '[soapenv:Body][api:StatusOptyRequest]',
                XmlEncoder::FIELD_NAME_PREFIX              => 'api:',
            ],
        );

        $requestPsr = new Request(
            Method::POST,
            '/loan/',
            [
                ResponseContentErrorMiddleware::CHECK_ERROR_PATH => '[soapenv:Body][ns1:StatusOptyResponse]',
            ],
            $requestContent,
        );

        $responsePsr     = $this->client->sendRequest($requestPsr);
        $responseContent = $responsePsr->getBody()->__toString();

        return $this->serializer->deserialize($responseContent, GetLoanApplicationStatusResponse::class, 'xml');
    }
}
