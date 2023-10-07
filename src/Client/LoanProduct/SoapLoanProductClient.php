<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanProduct;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface as PsrHttpClient;
use Symfony\Component\Serializer\Normalizer\UnwrappingDenormalizer;
use Symfony\Component\Serializer\SerializerInterface as Serializer;
use Vanta\Integration\B2posSoapClient\Client\LoanProduct\Request\ChooseLoanProductRequest;
use Vanta\Integration\B2posSoapClient\Client\LoanProduct\Request\GetAvailableLoanProductsRequest;
use Vanta\Integration\B2posSoapClient\Client\LoanProduct\Response\Bank;
use Vanta\Integration\B2posSoapClient\Client\LoanProduct\Response\ChooseLoanProductResponse;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\RequestNormalizer;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\ResponseContentReportsErrorDenormalizer;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\XmlSerializer;
use Vanta\Integration\B2posSoapClient\LoanProductClient;
use Yiisoft\Http\Method;

final class SoapLoanProductClient implements LoanProductClient
{
    public function __construct(
        private readonly Serializer $serializer,
        private readonly PsrHttpClient $client,
    ) {
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAvailableLoanProducts(GetAvailableLoanProductsRequest $request): array
    {
        $requestContent = $this->serializer->serialize(
            $request,
            'xml',
            [
                RequestNormalizer::AUTHORIZATION_DATA_PATH => '[env:Body][ns1:CalculatorBookOptyRequest]',
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

        return $this->serializer->deserialize(
            $responseContent,
            Bank::class . '[]',
            'xml',
            [
                ResponseContentReportsErrorDenormalizer::CHECK_ERROR_PATH => '[env:Body][ns1:CalculatorBookOptyResponse]',
                UnwrappingDenormalizer::UNWRAP_PATH                       => '[env:Body][ns1:CalculatorBookOptyResponse][ns1:selectedBanks][ns1:selectedBank]',
                XmlSerializer::DEFAULT_VALUE                              => [],
            ],
        );
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function chooseLoanProduct(ChooseLoanProductRequest $request): ChooseLoanProductResponse
    {
        $requestContent = $this->serializer->serialize(
            $request,
            'xml',
            [
                RequestNormalizer::AUTHORIZATION_DATA_PATH => '[soapenv:Body][api:AcceptOptyRequest]',
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
            ChooseLoanProductResponse::class,
            'xml',
            [
                ResponseContentReportsErrorDenormalizer::CHECK_ERROR_PATH => '[soapenv:Body][ns1:AcceptOptyResponse]',
            ],
        );
    }
}
