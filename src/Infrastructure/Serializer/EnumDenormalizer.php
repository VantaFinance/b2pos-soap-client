<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\Serializer;

use Symfony\Component\Serializer\Exception\UnexpectedValueException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface as Denormalizer;

final class EnumDenormalizer implements Denormalizer
{
    public function __construct(
        private readonly Denormalizer $enumNormalizer,
    ) {
    }

    /**
     * @param class-string $type
     */
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null): bool
    {
        return $this->enumNormalizer->supportsDenormalization($data, $type, $format);
    }

    /**
     * @param int|string            $data
     * @param class-string          $type
     * @param array<string, string> $context
     */
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (!$this->enumNormalizer->supportsDenormalization($data, $type, $format)) {
            throw new UnexpectedValueException(sprintf('Not supported data: %s, type: %s', var_export($data, true), $type));
        }

        if ('' === $data) {
            return null;
        }

        return $this->enumNormalizer->denormalize($data, $type, $format, $context);
    }
}
