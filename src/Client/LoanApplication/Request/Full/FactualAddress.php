<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\Full;

use Symfony\Component\Serializer\Annotation\SerializedPath;

final class FactualAddress extends Address
{
    /**
     * @var positive-int
     */
    #[SerializedPath('[api:period]')]
    public readonly int $periodOfStateInMonths;

    /**
     * @param numeric-string        $postalBox
     * @param numeric-string        $cityKladrId
     * @param numeric-string        $streetKladrId
     * @param non-empty-string      $house
     * @param positive-int          $periodOfStateInMonths
     * @param non-empty-string|null $block
     * @param non-empty-string|null $flat
     */
    public function __construct(
        string $postalBox,
        string $cityKladrId,
        string $streetKladrId,
        string $house,
        int $periodOfStateInMonths,
        ?string $block = null,
        ?string $flat = null,
    ) {
        $this->periodOfStateInMonths = $periodOfStateInMonths;

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
