<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface as PsrHttpClient;
use Symfony\Component\Serializer\Normalizer\UnwrappingDenormalizer;
use Symfony\Component\Serializer\SerializerInterface as Serializer;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\Full\NewLoanApplicationRequest as NewLoanApplicationRequestFull;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\GetLoanApplicationStatusRequest;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\Short\NewLoanApplicationRequest as NewLoanApplicationRequestShort;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Response\GetLoanApplicationStatusResponse;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\RequestNormalizer;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\ResponseContentReportsErrorDenormalizer;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\XmlSerializer;
use Vanta\Integration\B2posSoapClient\LoanApplicationClient;
use Yiisoft\Http\Method;

final class SoapLoanApplicationClient implements LoanApplicationClient
{
    public function __construct(
        private readonly Serializer $serializer,
        private readonly PsrHttpClient $client,
    ) {
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function newLoanApplicationShort(NewLoanApplicationRequestShort $request): string
    {
        $requestContent = $this->serializer->serialize(
            $request,
            'xml',
            [
                RequestNormalizer::AUTHORIZATION_DATA_PATH => '[env:Body][ns1:SendShortOptyRequest]',
                XmlSerializer::FIELD_NAME_PREFIX           => 'ns1:',
            ],
        );

        $requestPsr = new Request(
            Method::POST,
            '/loan/',
            [],
            $requestContent,
        );

        $responsePsr     = $this->client->sendRequest($requestPsr);
        $responseContent = $responsePsr->getBody()->getContents();

        /* @phpstan-ignore-next-line */
        return $this->serializer->deserialize(
            $responseContent,
            'numeric-string',
            'xml',
            [
                ResponseContentReportsErrorDenormalizer::CHECK_ERROR_PATH => '[env:Body][ns1:SendShortOptyResponse]',
                UnwrappingDenormalizer::UNWRAP_PATH                       => '[env:Body][ns1:SendShortOptyResponse][ns1:profileID]',
            ],
        );
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function newLoanApplicationFull(NewLoanApplicationRequestFull $request): string
    {
        $requestContent = $this->serializer->serialize(
            $request,
            'xml',
            [
                RequestNormalizer::AUTHORIZATION_DATA_PATH => '[soapenv:Body][api:CreateOptyRequest]',
                XmlSerializer::FIELD_NAME_PREFIX           => 'api:',
            ],
        );

        $requestPsr = new Request(
            Method::POST,
            '/loan/',
            [],
            $requestContent,
        );

        $responsePsr     = $this->client->sendRequest($requestPsr);
        $responseContent = $responsePsr->getBody()->getContents();

        /* @phpstan-ignore-next-line */
        return $this->serializer->deserialize(
            $responseContent,
            'numeric-string',
            'xml',
            [
                ResponseContentReportsErrorDenormalizer::CHECK_ERROR_PATH => '[soapenv:Body][ns1:CreateOptyResponse]',
                UnwrappingDenormalizer::UNWRAP_PATH                       => '[soapenv:Body][ns1:CreateOptyResponse][ns1:profileID]',
            ],
        );
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getLoanApplicationStatus(GetLoanApplicationStatusRequest $request): GetLoanApplicationStatusResponse
    {
        $requestContent = $this->serializer->serialize(
            $request,
            'xml',
            [
                RequestNormalizer::AUTHORIZATION_DATA_PATH => '[soapenv:Body][api:StatusOptyRequest]',
                XmlSerializer::FIELD_NAME_PREFIX           => 'api:',
            ],
        );

        $requestPsr = new Request(
            Method::POST,
            '/loan/',
            [],
            $requestContent,
        );

        $responsePsr     = $this->client->sendRequest($requestPsr);
        $responseContent = $responsePsr->getBody()->getContents();

        return $this->serializer->deserialize(
            $responseContent,
            GetLoanApplicationStatusResponse::class,
            'xml',
            [
                ResponseContentReportsErrorDenormalizer::CHECK_ERROR_PATH => '[soapenv:Body][ns1:StatusOptyResponse]',
            ],
        );
    }
}
