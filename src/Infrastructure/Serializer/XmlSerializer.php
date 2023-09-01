<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\Serializer;

use Symfony\Component\Serializer\Exception\UnexpectedValueException;
use Symfony\Component\Serializer\SerializerInterface as Serializer;

final class XmlSerializer implements Serializer
{
    public const DEFAULT_VALUE = 'B2POS_SOAP_CLIENT_DEFAULT_VALUE';

    public const FIELD_NAME_PREFIX = 'B2POS_SOAP_CLIENT_FIELD_NAME_PREFIX';

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
                'xml_root_node_name' => 'env:Envelope',
            ],
            'api:' => [
                'xml_root_node_name' => 'soapenv:Envelope',
            ],
        ];

        $dataToSeriale      = $dataByFieldNamePrefix[$context[self::FIELD_NAME_PREFIX]] ?? null;
        $contextToSerialize = $contextByFieldNamePrefix[$context[self::FIELD_NAME_PREFIX]] ?? null;

        if (null === $dataToSeriale || null === $contextToSerialize) {
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

        $dataToSeriale['#'] = $data;
        $contextToSerialize = array_merge(
            [
                'xml_version'                         => '1.0',
                'xml_encoding'                        => 'UTF-8',
                RequestNormalizer::ROOT_REQUEST_CLASS => $data::class,
            ],
            $contextToSerialize,
            $context,
        );

        return $this->serializer->serialize($dataToSeriale, $format, $contextToSerialize);
    }

    public function deserialize(mixed $data, string $type, string $format, array $context = []): mixed
    {
        if (!is_string($data)) {
            throw new UnexpectedValueException(sprintf('Required $data type array, got %s', get_debug_type($data)));
        }

        $data = str_replace('SOAP-ENV', 'soapenv', $data); // чтобы в запросах и ответах использовать одинаковую конструкцию: "soapenv"

        return $this->serializer->deserialize($data, $type, $format, $context)
            ?? $context[self::DEFAULT_VALUE]
            ?? null
        ;
    }
}
