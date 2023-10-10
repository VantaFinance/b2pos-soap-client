<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\Middleware;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyAccess\PropertyAccessorInterface as PropertyAccessor;
use Symfony\Component\Serializer\Encoder\DecoderInterface as Decoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\B2PosClientConfiguration;
use Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\Exception\CheckErrorPathMissingException;
use Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\Exception\ResponseContentErrorException;

final class ResponseContentErrorMiddleware implements Middleware
{
    private Decoder $decoder;

    private PropertyAccessor $propertyAccessor;

    public function __construct()
    {
        $this->decoder          = new XmlEncoder();
        $this->propertyAccessor = PropertyAccess::createPropertyAccessor();
    }

    public function process(Request $request, B2PosClientConfiguration $clientConfiguration, callable $next): Response
    {
        /** @var Response $response */
        $response = $next($request, $clientConfiguration);

        if (null === $clientConfiguration->checkErrorPath) {
            throw CheckErrorPathMissingException::create($response, $request);
        }

        $responseData = $response->getBody()->getContents();
        $response->getBody()->rewind(); // иначе следующий вызов getContents() вернет пустую строку

        if ('' === $responseData) {
            return $response;
        }

        /** @var array<non-empty-string, mixed> $responseDataDecoded */
        $responseDataDecoded = $this->decoder->decode($responseData, 'xml');

        // ошибка может быть только одна, не массив
        $errorCode        = $this->getErrorCode($responseDataDecoded, $clientConfiguration->checkErrorPath);
        $errorDescription = $this->getErrorDescription($responseDataDecoded, $clientConfiguration->checkErrorPath);

        if (null === $errorCode && null === $errorDescription) {
            return $response;
        }

        throw ResponseContentErrorException::create($response, $request);
    }

    /**
     * @param array<non-empty-string, mixed> $data
     * @param non-empty-string               $checkErrorPath
     */
    private function getErrorCode(array $data, string $checkErrorPath): ?string
    {
        $errorCode = null;

        // ошибки всегда с 'ns1:', даже если в других полях 'api:'
        $errorCodePropertyPath = $checkErrorPath . '[ns1:error][ns1:code]';

        if ($this->propertyAccessor->isReadable($data, $errorCodePropertyPath)) {
            /** @var string|null $errorCode */
            $errorCode = $this->propertyAccessor->getValue($data, $errorCodePropertyPath);
        }

        return $errorCode;
    }

    /**
     * @param array<non-empty-string, mixed> $data
     * @param non-empty-string               $checkErrorPath
     */
    private function getErrorDescription(array $data, string $checkErrorPath): ?string
    {
        $errorDescription = null;

        // ошибки всегда с 'ns1:', даже если в других полях 'api:'
        $errorDescriptionPropertyPath = $checkErrorPath . '[ns1:description][ns1:description]';

        if ($this->propertyAccessor->isReadable($data, $errorDescriptionPropertyPath)) {
            /** @var string|null $errorDescription */
            $errorDescription = $this->propertyAccessor->getValue($data, $errorDescriptionPropertyPath);
        }

        return $errorDescription;
    }
}
