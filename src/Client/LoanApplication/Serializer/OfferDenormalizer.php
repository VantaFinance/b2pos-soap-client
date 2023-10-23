<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Serializer;

use Symfony\Component\PropertyInfo\Type;
use Symfony\Component\Serializer\Exception\NotNormalizableValueException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface as Denormalizer;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Response\Full\StandartOffer as OfferFull;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Response\Offer;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Response\Short\CreditCard;

final class OfferDenormalizer implements Denormalizer
{
    public function __construct(
        private readonly Denormalizer $denormalizer,
    ) {
    }

    /**
     * @param array<string, mixed> $context
     */
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return Offer::class == $type;
    }

    /**
     * @param array<string, string> $context
     */
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): ?Offer
    {
        if (!is_array($data)) {
            throw NotNormalizableValueException::createForUnexpectedDataType(
                sprintf('Ожидали массив, получили:%s.', get_debug_type($data)),
                $data,
                [Type::BUILTIN_TYPE_STRING],
                $context['deserialization_path'] ?? null,
                true
            );
        }

        $shortOfferSortedFields = [
            'ns1:amount',
            'ns1:product',
            'ns1:rate',
        ];

        $dataKeys = array_keys($data);
        sort($dataKeys);

        $type = OfferFull::class;
        if ($dataKeys == $shortOfferSortedFields) {
            $type = CreditCard::class;
        }

        return $this->denormalizer->denormalize($data, $type, 'array');
    }
}
