<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\Serializer;

use Symfony\Component\PropertyAccess\PropertyAccessorInterface as PropertyAccessor;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface as Normalizer;

final class RequestNormalizer implements Normalizer
{
    public const ROOT_REQUEST_CLASS = 'B2POS_SOAP_CLIENT_ROOT_REQUEST_CLASS';

    public const AUTHORIZATION_DATA_PATH = 'B2POS_SOAP_CLIENT_AUTHORIZATION_DATA_PATH';

    private readonly Normalizer $objectNormalizer;

    private readonly PropertyAccessor $propertyAccessor;

    public function __construct(
        Normalizer $objectNormalizer,
        PropertyAccessor $propertyAccessor,
    ) {
        $this->objectNormalizer = $objectNormalizer;
        $this->propertyAccessor = $propertyAccessor;
    }

    /**
     * @param array<non-empty-string, non-empty-string> $context
     */
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data)
            && ($context[self::ROOT_REQUEST_CLASS] ?? null) == $data::class
            && array_key_exists(XmlSerializer::FIELD_NAME_PREFIX, $context)
        ;
    }

    /**
     * @param array<non-empty-string, non-empty-string> $context
     *
     * @return array<non-empty-string, mixed>
     */
    public function normalize(mixed $object, ?string $format = null, array $context = []): array
    {
        if (!is_object($object) || ($context[self::ROOT_REQUEST_CLASS] ?? null) != $object::class) {
            throw new UnexpectedValueException(sprintf('Allowed class: %s, %s given', self::ROOT_REQUEST_CLASS, get_debug_type($object)));
        }

        if (!array_key_exists(XmlSerializer::FIELD_NAME_PREFIX, $context)) {
            throw new UnexpectedValueException('FIELD_NAME_PREFIX in context required');
        }

        $requestNormalized = $this->objectNormalizer->normalize($object, $format, $context);

        $userIdFieldPath    = sprintf('%s[%suserID]', $context[self::AUTHORIZATION_DATA_PATH], $context[XmlSerializer::FIELD_NAME_PREFIX]);
        $userTokenFieldPath = sprintf('%s[%suserToken]', $context[self::AUTHORIZATION_DATA_PATH], $context[XmlSerializer::FIELD_NAME_PREFIX]);

        $this->propertyAccessor->setValue($requestNormalized, $userIdFieldPath, '#userId#');
        $this->propertyAccessor->setValue($requestNormalized, $userTokenFieldPath, '#userToken#');

        return $requestNormalized;
    }
}
