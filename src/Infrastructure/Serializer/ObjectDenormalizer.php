<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\Serializer;

use ReflectionClass;
use ReflectionNamedType;
use Symfony\Component\PropertyAccess\PropertyAccessorInterface as PropertyAccessor;
use Symfony\Component\Serializer\Annotation\SerializedPath;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface as Denormalizer;

use function Vanta\Integration\arrayRemoveValueByDynamicKey;

final class ObjectDenormalizer implements Denormalizer
{
    private readonly Denormalizer $objectNormalizer;

    private readonly PropertyAccessor $propertyAccessor;

    public function __construct(
        Denormalizer $objectNormalizer,
        PropertyAccessor $propertyAccessor,
    ) {
        $this->objectNormalizer = $objectNormalizer;
        $this->propertyAccessor = $propertyAccessor;
    }

    /**
     * @param class-string $type
     */
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null): bool
    {
        return $this->objectNormalizer->supportsDenormalization($data, $type, $format);
    }

    /**
     * @param array<int|string, mixed> $data
     * @param class-string             $type
     * @param array<string, string>    $context
     */
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (!is_array($data)) {
            throw new UnexpectedValueException(sprintf('Allowed data type: array, %s given', get_debug_type($data)));
        }

        $data = $this->normalizeEmptyArray($data, $type);

        return $this->objectNormalizer->denormalize($data, $type, $format, $context);
    }

    /**
     * В ответах b2pos поля с пустыми массивами представлены как пустая строка, удаляем их, чтобы избежать ошибок при денормализации.
     * Проявляется, как минимум, в Vanta\Integration\B2posSoapClient\Client\Reference\Response\SelectedBank::loanProducts,
     * вместо ['ns1:creditProducts']['ns1:creditProduct'] => [], получаем ['ns1:creditProducts'] => ''.
     *
     * @param  array<int|string, mixed> $data
     * @param  class-string             $type
     * @return array<int|string, mixed> $data
     */
    private function normalizeEmptyArray(mixed $data, string $type): mixed
    {
        $reflectionClass = new ReflectionClass($type);

        $reflectionProperties = $reflectionClass->getProperties();

        foreach ($reflectionProperties as $reflectionProperty) {
            $serializedPathAttribute = $reflectionProperty->getAttributes(SerializedPath::class);

            // отсеиваем несериализуемые поля
            if (!array_key_exists(0, $serializedPathAttribute)) {
                continue;
            }

            /** @var SerializedPath $serializedPathAttribute */
            $serializedPathAttribute = $serializedPathAttribute[0]->newInstance();

            /** @var ReflectionNamedType|null $reflectionNamedType */
            $reflectionNamedType = $reflectionProperty->getType();

            // отсеиваем поля не массивы
            if ('array' != $reflectionNamedType?->getName()) {
                continue;
            }

            // отсеиваем корректные поля
            if ($this->propertyAccessor->isReadable($data, $serializedPathAttribute->getSerializedPath())) {
                continue;
            }

            // отсеиваем поля без родительского элемента, например, при невалидной структуре ответа
            $keyItemList = $serializedPathAttribute->getSerializedPath()->getParent()?->getElements() ?? [];

            if (0 == count($keyItemList)) {
                continue;
            }

            // удаляем некорректные поля
            $data = arrayRemoveValueByDynamicKey($data, $keyItemList);
        }

        return $data;
    }
}
