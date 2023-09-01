<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\Serializer;

use Symfony\Component\PropertyInfo\Type;
use Symfony\Component\Serializer\Exception\NotNormalizableValueException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface as Denormalizer;

final class NumericStringDenormalizer implements Denormalizer
{
    /**
     * @param array<string, mixed> $context
     */
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return is_string($data) && is_numeric($data);
    }

    /**
     * @param  array<string, string> $context
     * @return numeric-string
     */
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): string
    {
        if (!is_string($data) || !is_numeric($data)) {
            throw NotNormalizableValueException::createForUnexpectedDataType(
                sprintf('Ожидали numeric-string,получили: %s.', get_debug_type($data)),
                $data,
                [Type::BUILTIN_TYPE_STRING],
                $context['deserialization_path'] ?? null,
                true
            );
        }

        return $data;
    }
}
