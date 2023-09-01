<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\Serializer;

use Symfony\Component\Serializer\Exception\UnexpectedValueException;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface as Normalizer;
use Vanta\Integration\B2posSoapClient\Infrastructure\Request\RussianPassportDocument;

final class RussianPassportDocumentNormalizer implements Normalizer
{
    /**
     * @param array<string, mixed> $context
     */
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return $data instanceof RussianPassportDocument;
    }

    /**
     * @param array<string, string> $context
     */
    public function normalize(mixed $object, ?string $format = null, array $context = []): string
    {
        if (!$object instanceof RussianPassportDocument) {
            throw new UnexpectedValueException(sprintf('Allowed type: %s', RussianPassportDocument::class));
        }

        return $object->series->value . $object->number->value;
    }
}
