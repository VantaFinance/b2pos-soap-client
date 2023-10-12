<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\Serializer;

use Symfony\Component\Serializer\Encoder\DecoderInterface as Decoder;
use Symfony\Component\Serializer\Encoder\EncoderInterface as Encoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder as XmlEncoderSymfony;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;

use function Vanta\Integration\arrayReplaceValueRecursive;

final class XmlEncoder implements Encoder, Decoder
{
    public const FIELD_NAME_PREFIX = 'B2POS_SOAP_CLIENT_FIELD_NAME_PREFIX';

    public function __construct(
        private readonly Encoder&Decoder $xmlEncoder,
    ) {
    }

    public function encode(mixed $data, string $format, array $context = []): string
    {
        if (!array_key_exists(self::FIELD_NAME_PREFIX, $context)) {
            throw new UnexpectedValueException('FIELD_NAME_PREFIX in context required');
        }

        // @todo подумать о названиях этих групп апи: full/medium/short и использовать их вместо fieldNamePrefix к концу задачи

        $dataByFieldNamePrefix = [
            'ns1:' => [
                '@xmlns:env' => 'http://www.w3.org/2003/05/soap-envelope',
                '@xmlns:ns1' => 'https://api.b2pos.ru/',
                '@xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',
            ],
            'api:' => [
                '@xmlns:soapenv' => 'http://schemas.xmlsoap.org/soap/envelope/',
                '@xmlns:api'     => 'https://api.b2pos.ru/',
            ],
        ];

        $contextByFieldNamePrefix = [
            'ns1:' => [
                XmlEncoderSymfony::ROOT_NODE_NAME => 'env:Envelope',
            ],
            'api:' => [
                XmlEncoderSymfony::ROOT_NODE_NAME => 'soapenv:Envelope',
            ],
        ];

        $dataToEncode    = $dataByFieldNamePrefix[$context[self::FIELD_NAME_PREFIX]] ?? null;
        $contextToEncode = $contextByFieldNamePrefix[$context[self::FIELD_NAME_PREFIX]] ?? null;

        if (null === $dataToEncode || null === $contextToEncode) {
            throw new UnexpectedValueException(sprintf(
                'FieldNamePrefix %s not allowed, allowed: %s',
                $context[self::FIELD_NAME_PREFIX],
                implode(
                    ', ',
                    array_intersect(
                        array_keys($dataByFieldNamePrefix),
                        array_keys($contextByFieldNamePrefix),
                    ),
                ),
            ));
        }

        $dataToEncode['#'] = $data;
        $contextToEncode   = array_merge(
            [
                XmlEncoderSymfony::VERSION  => '1.0',
                XmlEncoderSymfony::ENCODING => 'UTF-8',
            ],
            $contextToEncode,
            $context,
        );

        return $this->xmlEncoder->encode($dataToEncode, $format, $contextToEncode);
    }

    /**
     * @param  non-empty-string                       $data
     * @param  non-empty-string                       $format
     * @param  non-empty-array<string, mixed>|array{} $context
     * @return array<int|string, mixed>
     */
    public function decode(string $data, string $format, array $context = []): array
    {
        $dataReplaced = str_replace('SOAP-ENV', 'soapenv', $data); // чтобы в запросах и ответах использовать одинаковую конструкцию: "soapenv"

        /** @var array<int|string, mixed> $dataDecoded */
        $dataDecoded = $this->xmlEncoder->decode($dataReplaced, $format, $context);

        return arrayReplaceValueRecursive($dataDecoded, '', null);
    }

    public function supportsEncoding(string $format): bool
    {
        return $this->xmlEncoder->supportsEncoding($format);
    }

    public function supportsDecoding(string $format): bool
    {
        return $this->xmlEncoder->supportsDecoding($format);
    }
}
