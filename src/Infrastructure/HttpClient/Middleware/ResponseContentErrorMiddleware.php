<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\Middleware;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Symfony\Component\PropertyAccess\PropertyAccessorInterface as PropertyAccessor;
use Symfony\Component\Serializer\Encoder\DecoderInterface;
use Symfony\Component\Serializer\Encoder\DecoderInterface as Decoder;
use Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\B2PosClientConfiguration;
use Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\Exception\CheckErrorPathMissingException;
use Vanta\Integration\B2posSoapClient\Infrastructure\HttpClient\Exception\ResponseContentErrorException;

final class ResponseContentErrorMiddleware implements Middleware
{
    public const CHECK_ERROR_PATH = 'b2pos_soap_client_check_error_path';

    private readonly Decoder $decoder;

    private readonly PropertyAccessor $propertyAccessor;

    public function __construct(DecoderInterface $decoder, PropertyAccessor $propertyAccessor)
    {
        $this->decoder          = $decoder;
        $this->propertyAccessor = $propertyAccessor;
    }

    public function process(Request $request, B2PosClientConfiguration $configuration, callable $next): Response
    {
        $checkErrorPath = $request->getHeaderLine(self::CHECK_ERROR_PATH);
        $request        = $request->withoutHeader(self::CHECK_ERROR_PATH);

        /** @var Response $response */
        $response = $next($request);

        if ('' === $checkErrorPath) {
            throw CheckErrorPathMissingException::create($response, $request);
        }

        $responseData = $response->getBody()->__toString();
        $response->getBody()->rewind(); // иначе следующий вызов __toString() вернет пустую строку

        if ('' === $responseData) {
            return $response;
        }

        /** @var array<non-empty-string, mixed> $responseDataDecoded */
        $responseDataDecoded = $this->decoder->decode($responseData, 'xml');

        // ошибка может быть только одна, не массив
        $errorCode        = $this->getErrorCode($responseDataDecoded, $checkErrorPath);
        $errorDescription = $this->getErrorDescription($responseDataDecoded, $checkErrorPath);

        if (null === $errorCode && null === $errorDescription) {
            return $response;
        }

        throw ResponseContentErrorException::create($response, $request, $errorCode, $errorDescription);
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
        $errorDescriptionPropertyPath = $checkErrorPath . '[ns1:error][ns1:description]';

        if ($this->propertyAccessor->isReadable($data, $errorDescriptionPropertyPath)) {
            /** @var string|null $errorDescription */
            $errorDescription = $this->propertyAccessor->getValue($data, $errorDescriptionPropertyPath);
        }

        return $errorDescription;
    }
}
