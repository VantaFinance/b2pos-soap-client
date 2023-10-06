<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\Full;

use DateTimeImmutable;
use Symfony\Component\Serializer\Annotation\Context;
use Symfony\Component\Serializer\Annotation\SerializedPath;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

final class RegisterAddress extends Address
{
    #[Context(
        normalizationContext: [
            DateTimeNormalizer::FORMAT_KEY => 'd.m.Y',
        ],
    )]
    #[SerializedPath('[api:date]')]
    public readonly DateTimeImmutable $registerDate;

    #[SerializedPath('[api:status]')]
    public readonly ?PropertyStatus $propertyStatus;

    /**
     * @param numeric-string        $postalBox
     * @param numeric-string        $cityKladrId
     * @param numeric-string        $streetKladrId
     * @param non-empty-string      $house
     * @param non-empty-string|null $block
     * @param non-empty-string|null $flat
     */
    public function __construct(
        string $postalBox,
        string $cityKladrId,
        string $streetKladrId,
        string $house,
        DateTimeImmutable $registerDate,
        ?string $block = null,
        ?string $flat = null,
        ?PropertyStatus $propertyStatus = null,
    ) {
        $this->registerDate   = $registerDate;
        $this->propertyStatus = $propertyStatus;

        parent::__construct(
            $postalBox,
            $cityKladrId,
            $streetKladrId,
            $house,
            $block,
            $flat,
        );
    }
}
