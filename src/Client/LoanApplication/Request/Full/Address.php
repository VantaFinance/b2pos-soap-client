<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\Full;

use Symfony\Component\Serializer\Annotation\SerializedPath;

abstract class Address
{
    /**
     * @var numeric-string
     */
    #[SerializedPath('[api:index]')]
    public readonly string $postalBox;

    /**
     * @var numeric-string
     */
    #[SerializedPath('[api:city]')]
    public readonly string $cityKladrId;

    /**
     * @var numeric-string
     */
    #[SerializedPath('[api:street]')]
    public readonly string $streetKladrId;

    /**
     * @var non-empty-string
     */
    #[SerializedPath('[api:house]')]
    public readonly string $house;

    /**
     * @var non-empty-string|null
     */
    #[SerializedPath('[api:housing]')]
    public readonly ?string $block;

    /**
     * @var non-empty-string|null
     */
    #[SerializedPath('[api:flat]')]
    public readonly ?string $flat;

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
        ?string $block = null,
        ?string $flat = null,
    ) {
        $this->postalBox     = $postalBox;
        $this->cityKladrId   = $cityKladrId;
        $this->streetKladrId = $streetKladrId;
        $this->house         = $house;
        $this->block         = $block;
        $this->flat          = $flat;
    }

    final public function isEqual(self $address): bool
    {
        return $this->postalBox == $address->postalBox
            && $this->cityKladrId == $address->cityKladrId
            && $this->streetKladrId == $address->streetKladrId
            && $this->house == $address->house
            && $this->block == $address->block
            && $this->flat == $address->flat
        ;
    }
}
