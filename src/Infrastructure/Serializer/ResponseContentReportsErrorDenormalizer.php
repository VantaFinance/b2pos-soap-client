<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\Serializer;

use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyAccess\PropertyAccessorInterface as PropertyAccessor;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface as Denormalizer;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\Exception\ResponseContentReportsErrorException;

final class ResponseContentReportsErrorDenormalizer implements Denormalizer
{
    public const CHECK_ERROR_PATH = 'B2POS_SOAP_CLIENT_CHECK_ERROR_PATH';

    private PropertyAccessor $propertyAccessor;

    public function __construct()
    {
        $this->propertyAccessor = PropertyAccess::createPropertyAccessor();
    }

    /**
     * @param class-string                                                        $type
     * @param array{B2POS_SOAP_CLIENT_CHECK_ERROR_PATH: non-empty-string}|array{} $context
     */
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        if (!is_array($data) || !array_key_exists(self::CHECK_ERROR_PATH, $context)) {
            return false;
        }

        $errorCode        = $this->getErrorCode($data, $context[self::CHECK_ERROR_PATH]);
        $errorDescription = $this->getErrorDescription($data, $context[self::CHECK_ERROR_PATH]);

        return null !== $errorCode || null !== $errorDescription;
    }

    /**
     * @param array{B2POS_SOAP_CLIENT_CHECK_ERROR_PATH: non-empty-string}|array{} $context
     */
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): void
    {
        if (!is_array($data)) {
            throw new UnexpectedValueException(sprintf('Allowed data type: array, %s given', get_debug_type($data)));
        }

        if (!array_key_exists(self::CHECK_ERROR_PATH, $context)) {
            throw new UnexpectedValueException('CHECK_ERROR_PATH in context required');
        }

        $errorCode        = $this->getErrorCode($data, $context[self::CHECK_ERROR_PATH]);
        $errorDescription = $this->getErrorDescription($data, $context[self::CHECK_ERROR_PATH]);

        if (null !== $errorCode || null != $errorDescription) {
            throw ResponseContentReportsErrorException::create($errorCode, $errorDescription, $data);
        }
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
     * @param array<string, mixed> $data
     * @param non-empty-string     $checkErrorPath
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
