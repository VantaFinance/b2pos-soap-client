<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanAgreement;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Client\ClientInterface as PsrHttpClient;
use Symfony\Component\Serializer\SerializerInterface as Serializer;
use Vanta\Integration\B2posSoapClient\Client\LoanAgreement\Request\AuthorizeLoanAgreementRequest;
use Vanta\Integration\B2posSoapClient\Client\LoanAgreement\Response\AuthorizeLoanAgreementResponse;
use Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\Middleware\ResponseContentErrorMiddleware;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\RequestNormalizer;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\XmlEncoder;
use Vanta\Integration\B2posSoapClient\LoanAgreementClient;
use Yiisoft\Http\Method;

final class SoapLoanAgreementClient implements LoanAgreementClient
{
    public function __construct(
        private readonly Serializer $serializer,
        private readonly PsrHttpClient $client,
    ) {
    }

    public function authorizeLoanAgreement(AuthorizeLoanAgreementRequest $request): AuthorizeLoanAgreementResponse
    {
        $requestContent = $this->serializer->serialize(
            $request,
            'xml',
            [
                RequestNormalizer::AUTHORIZATION_DATA_PATH => '[soapenv:Body][api:AuthOptyRequest]',
                XmlEncoder::FIELD_NAME_PREFIX              => 'api:',
            ],
        );

        $requestPsr = new Request(
            Method::POST,
            '/loan/',
            [
                ResponseContentErrorMiddleware::CHECK_ERROR_PATH => '[soapenv:Body][ns1:AuthOptyResponse]',
            ],
            $requestContent,
        );

        $responsePsr     = $this->client->sendRequest($requestPsr);
        $responseContent = $responsePsr->getBody()->__toString();

        return $this->serializer->deserialize($responseContent, AuthorizeLoanAgreementResponse::class, 'xml');
    }
}
