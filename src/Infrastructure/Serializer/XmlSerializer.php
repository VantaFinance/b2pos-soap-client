<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\Serializer;

use Symfony\Component\Serializer\Exception\UnexpectedValueException;
use Symfony\Component\Serializer\SerializerInterface as Serializer;

final class XmlSerializer implements Serializer
{
    public function __construct(
        private readonly Serializer $serializer,
    ) {
    }

    /**
     * @param array<non-empty-string, non-empty-string> $context
     */
    public function serialize(mixed $data, string $format, array $context = []): string
    {
        if (!is_object($data)) {
            throw new UnexpectedValueException(sprintf('Required $data type object, got %s', get_debug_type($data)));
        }

        $contextToSerialize = array_merge(
            [
                RequestNormalizer::ROOT_REQUEST_CLASS => $data::class,
            ],
            $context,
        );

        return $this->serializer->serialize($data, $format, $contextToSerialize);
    }

    public function deserialize(mixed $data, string $type, string $format, array $context = []): mixed
    {
        if (!is_string($data)) {
            throw new UnexpectedValueException(sprintf('Required $data type array, got %s', get_debug_type($data)));
        }

        return $this->serializer->deserialize($data, $type, $format, $context);
    }
}
