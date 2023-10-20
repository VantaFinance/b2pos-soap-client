<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Serializer;

use Symfony\Component\PropertyInfo\Type;
use Symfony\Component\Serializer\Exception\NotNormalizableValueException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface as Denormalizer;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Response\Full\Offer as OfferFull;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Response\Offer;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Response\Offer as OfferAbstract;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Response\Short\Offer as OfferShort;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\MoneyPositiveOrZeroNormalizer;
use Vanta\Integration\B2posSoapClient\Infrastructure\Struct\MoneyPositiveOrZero;

final class OfferDenormalizer implements Denormalizer
{
    public function __construct(
        private readonly MoneyPositiveOrZeroNormalizer $moneyPositiveOrZeroNormalizer,
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
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): OfferAbstract
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

        if (
            null === ($data['ns1:amount'] ?? null)
            || null === ($data['ns1:product'] ?? null)
            || null === ($data['ns1:rate'] ?? null)
        ) {
            throw NotNormalizableValueException::createForUnexpectedDataType(
                'Одно из обязательных полей отсутствует, либо = null: ns1:amount, ns1:product, ns1:rate.',
                $data,
                [Type::BUILTIN_TYPE_ARRAY],
                $context['deserialization_path'] ?? null,
                true
            );
        }

        $dataKeys = array_keys($data);
        sort($dataKeys);

        if ($dataKeys == $shortOfferSortedFields) {
            return new OfferShort(
                loanProductName: $data['ns1:product'],
                paymentAmount: $this->moneyPositiveOrZeroNormalizer->denormalize($data['ns1:amount'], MoneyPositiveOrZero::class),
                loanRate: (float) $data['ns1:rate'],
            );
        }

        /** @var positive-int|null $periodToInMonths */
        $periodToInMonths = null !== $data['ns1:terms'] ? (int) $data['ns1:terms'] : $data['ns1:terms'];

        return new OfferFull(
            loanProductName: $data['ns1:product'],
            paymentAmount: $this->moneyPositiveOrZeroNormalizer->denormalize($data['ns1:amount'], MoneyPositiveOrZero::class),
            loanRate: (float) $data['ns1:rate'],
            periodToInMonths: $periodToInMonths,
            initialPaymentAmount: $this->moneyPositiveOrZeroNormalizer->denormalize($data['ns1:firstPayment'] ?? '', MoneyPositiveOrZero::class),
            paymentAmountInMonth: $this->moneyPositiveOrZeroNormalizer->denormalize($data['ns1:monthlyAmount'] ?? '', MoneyPositiveOrZero::class),
            insuranceAmount: $this->moneyPositiveOrZeroNormalizer->denormalize($data['ns1:insuranceAmount'] ?? '', MoneyPositiveOrZero::class),
            otherProductsAmount: $this->moneyPositiveOrZeroNormalizer->denormalize($data['ns1:otherAmount'] ?? '', MoneyPositiveOrZero::class),
            discount: null !== ($data['ns1:rebate'] ?? null) ? (float) $data['ns1:rebate'] : $data['ns1:rebate'],
            loanProductId: $data['ns1:variantID'] ?? null,
        );
    }
}
