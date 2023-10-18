<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanProduct;

use GuzzleHttp\Psr7\Request;
use Symfony\Component\Serializer\Normalizer\UnwrappingDenormalizer;
use Symfony\Component\Serializer\SerializerInterface as Serializer;
use Vanta\Integration\B2posSoapClient\Client\LoanProduct\Request\ChooseLoanProductRequest;
use Vanta\Integration\B2posSoapClient\Client\LoanProduct\Request\GetAvailableLoanProductsRequest;
use Vanta\Integration\B2posSoapClient\Client\LoanProduct\Response\BankResult;
use Vanta\Integration\B2posSoapClient\Client\LoanProduct\Response\ChooseLoanProductResponse;
use Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\B2PosClient;
use Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\B2PosClientConfiguration;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\RequestNormalizer;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\XmlEncoder;
use Vanta\Integration\B2posSoapClient\LoanProductClient;
use Yiisoft\Http\Method;

final class SoapLoanProductClient implements LoanProductClient
{
    public function __construct(
        private readonly Serializer $serializer,
        private readonly B2PosClient $client,
        private readonly B2PosClientConfiguration $clientConfiguration,
    ) {
    }

    public function getAvailableLoanProducts(GetAvailableLoanProductsRequest $request): array
    {
        $requestContent = $this->serializer->serialize(
            $request,
            'xml',
            [
                RequestNormalizer::AUTHORIZATION_DATA_PATH => '[env:Body][ns1:CalculatorBookOptyRequest]',
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
            $this->clientConfiguration->withCheckErrorPath('[env:Body][ns1:CalculatorBookOptyResponse]'),
        );
        $responseContent = $responsePsr->getBody()->__toString();

        return $this->serializer->deserialize(
            $responseContent,
            BankResult::class . '[]',
            'xml',
            [
                UnwrappingDenormalizer::UNWRAP_PATH => '[env:Body][ns1:CalculatorBookOptyResponse][ns1:selectedBanks][ns1:selectedBank]',
            ],
        );
    }

    public function chooseLoanProduct(ChooseLoanProductRequest $request): ChooseLoanProductResponse
    {
        $requestContent = $this->serializer->serialize(
            $request,
            'xml',
            [
                RequestNormalizer::AUTHORIZATION_DATA_PATH => '[soapenv:Body][api:AcceptOptyRequest]',
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
            $this->clientConfiguration->withCheckErrorPath('[soapenv:Body][ns1:AcceptOptyResponse]'),
        );
        $responseContent = $responsePsr->getBody()->__toString();

        return $this->serializer->deserialize(
            $responseContent,
            ChooseLoanProductResponse::class,
            'xml',
        );
    }
}
