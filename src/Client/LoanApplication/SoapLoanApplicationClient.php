<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication;

use GuzzleHttp\Psr7\Request;
use Symfony\Component\Serializer\Normalizer\UnwrappingDenormalizer;
use Symfony\Component\Serializer\SerializerInterface as Serializer;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\Full\CancelLoanApplicationRequest;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\Full\NewLoanApplicationRequest as NewLoanApplicationRequestFull;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\GetLoanApplicationStatusRequest;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\Short\NewLoanApplicationRequest as NewLoanApplicationRequestShort;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Response\Full\CancelLoanApplicationResponse;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Response\GetLoanApplicationStatusResponse;
use Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\B2PosClient;
use Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\B2PosClientConfiguration;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\RequestNormalizer;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\XmlEncoder;
use Vanta\Integration\B2posSoapClient\LoanApplicationClient;
use Yiisoft\Http\Method;

final class SoapLoanApplicationClient implements LoanApplicationClient
{
    public function __construct(
        private readonly Serializer $serializer,
        private readonly B2PosClient $client,
        private readonly B2PosClientConfiguration $clientConfiguration,
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
            [],
            $requestContent,
        );

        $responsePsr = $this->client->sendRequest(
            $requestPsr,
            $this->clientConfiguration->withCheckErrorPath('[env:Body][ns1:SendShortOptyResponse]'),
        );
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
            [],
            $requestContent,
        );

        $responsePsr = $this->client->sendRequest(
            $requestPsr,
            $this->clientConfiguration->withCheckErrorPath('[soapenv:Body][ns1:CreateOptyResponse]'),
        );
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

    public function getLoanApplicationStatus(string $loanApplicationId): GetLoanApplicationStatusResponse
    {
        $requestContent = $this->serializer->serialize(
            new GetLoanApplicationStatusRequest($loanApplicationId),
            'xml',
            [
                RequestNormalizer::AUTHORIZATION_DATA_PATH => '[soapenv:Body][api:StatusOptyRequest]',
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
            $this->clientConfiguration->withCheckErrorPath('[soapenv:Body][ns1:StatusOptyResponse]'),
        );
        $responseContent = $responsePsr->getBody()->__toString();

        return $this->serializer->deserialize(
            $responseContent,
            GetLoanApplicationStatusResponse::class,
            'xml',
        );
    }

    public function cancelLoanApplicationFull(CancelLoanApplicationRequest $request): CancelLoanApplicationResponse
    {
        $requestContent = $this->serializer->serialize(
            $request,
            'xml',
            [
                RequestNormalizer::AUTHORIZATION_DATA_PATH => '[soapenv:Body][api:CancelOptyRequest]',
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
            $this->clientConfiguration->withCheckErrorPath('[soapenv:Body][ns1:CancelOptyResponse]'),
        );
        $responseContent = $responsePsr->getBody()->__toString();

        return $this->serializer->deserialize(
            $responseContent,
            CancelLoanApplicationResponse::class,
            'xml',
        );
    }
}
