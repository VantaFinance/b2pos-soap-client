<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\Serializer;

use function is_string;

use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Exception\ParserException;
use Money\Formatter\DecimalMoneyFormatter;
use Money\Parser\DecimalMoneyParser;
use Symfony\Component\PropertyInfo\Type;
use Symfony\Component\Serializer\Exception\NotNormalizableValueException;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface as Denormalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface as Normalizer;
use Vanta\Integration\B2posSoapClient\Infrastructure\Struct\MoneyPositiveOrZero;

final class MoneyPositiveOrZeroNormalizer implements Normalizer, Denormalizer
{
    private readonly DecimalMoneyFormatter $formatterDecimal;

    private readonly DecimalMoneyParser $parserDecimal;

    public function __construct()
    {
        $currencies             = new ISOCurrencies();
        $this->formatterDecimal = new DecimalMoneyFormatter($currencies);
        $this->parserDecimal    = new DecimalMoneyParser($currencies);
    }

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null): bool
    {
        return MoneyPositiveOrZero::class == $type;
    }

    /**
     * @param array<string, string> $context
     */
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): MoneyPositiveOrZero
    {
        if (!is_string($data)) {
            throw NotNormalizableValueException::createForUnexpectedDataType(
                sprintf('Ожидали строку,получили:%s.', get_debug_type($data)),
                $data,
                [Type::BUILTIN_TYPE_STRING],
                $context['deserialization_path'] ?? null,
                true
            );
        }

        try {
            return new MoneyPositiveOrZero(
                $this->parserDecimal->parse($data, new Currency('RUB'))->getAmount(),
            );
        } catch (ParserException $e) {
            throw NotNormalizableValueException::createForUnexpectedDataType(
                $e->getMessage(),
                $data,
                [Type::BUILTIN_TYPE_INT, Type::BUILTIN_TYPE_STRING],
                $context['deserialization_path'] ?? null,
                true
            );
        }
    }

    public function supportsNormalization(mixed $data, ?string $format = null): bool
    {
        return $data instanceof MoneyPositiveOrZero;
    }

    /**
     * @param array<string, string> $context
     */
    public function normalize(mixed $object, ?string $format = null, array $context = []): string
    {
        if (!$object instanceof MoneyPositiveOrZero) {
            throw new UnexpectedValueException(sprintf('Allowed type: %s', MoneyPositiveOrZero::class));
        }

        return $this->formatterDecimal->format($object->value);
    }
}
