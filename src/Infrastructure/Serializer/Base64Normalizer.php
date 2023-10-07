<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\Serializer;

use Symfony\Component\Serializer\Exception\UnexpectedValueException;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface as Normalizer;
use Vanta\Integration\B2posSoapClient\Infrastructure\Struct\Base64;
use Vanta\Integration\B2posSoapClient\Infrastructure\Struct\RussianPassportDocument;

final class Base64Normalizer implements Normalizer
{
    /**
     * @param array<string, mixed> $context
     */
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return $data instanceof Base64;
    }

    /**
     * @param  array<string, string> $context
     * @return non-empty-string
     */
    public function normalize(mixed $object, ?string $format = null, array $context = []): string
    {
        if (!$object instanceof Base64) {
            throw new UnexpectedValueException(sprintf('Allowed type: %s', RussianPassportDocument::class));
        }

        return $object->value;
    }
}
