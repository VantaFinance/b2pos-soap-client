<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\Serializer;

use InvalidArgumentException;
use Symfony\Component\PropertyInfo\Type;
use Symfony\Component\Serializer\Exception\NotNormalizableValueException;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface as Denormalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface as Normalizer;
use Vanta\Integration\B2posSoapClient\Infrastructure\Struct\RussianPassportNumber;
use Webmozart\Assert\Assert;

final class RussianPassportNumberNormalizer implements Normalizer, Denormalizer
{
    /**
     * @param array<string, mixed> $context
     */
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return RussianPassportNumber::class == $type;
    }

    /**
     * @param array<string, string> $context
     */
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): RussianPassportNumber
    {
        try {
            Assert::string($data);

            return new RussianPassportNumber($data);
        } catch (InvalidArgumentException $e) {
            throw NotNormalizableValueException::createForUnexpectedDataType(
                $e->getMessage(),
                $data,
                [Type::BUILTIN_TYPE_INT, Type::BUILTIN_TYPE_STRING],
                $context['deserialization_path'] ?? null,
                true
            );
        }
    }

    /**
     * @param array<string, mixed> $context
     */
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return $data instanceof RussianPassportNumber;
    }

    /**
     * @param  array<string, mixed> $context
     * @return non-empty-string
     */
    public function normalize(mixed $object, ?string $format = null, array $context = []): string
    {
        if (!$object instanceof RussianPassportNumber || '' == $object->value) {
            throw new UnexpectedValueException(sprintf('Allowed type: %s', RussianPassportNumber::class));
        }

        return $object->value;
    }
}
