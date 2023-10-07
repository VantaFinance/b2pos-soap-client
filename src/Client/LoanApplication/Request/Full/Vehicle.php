<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\Full;

use Symfony\Component\Serializer\Annotation\SerializedPath;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Full\PurchaseType;
use Vanta\Integration\B2posSoapClient\Infrastructure\Struct\CountryIso;

final class Vehicle
{
    /**
     * @var non-empty-string
     */
    #[SerializedPath('[api:brand]')]
    public readonly string $brand;

    /**
     * @var non-empty-string
     */
    #[SerializedPath('[api:model]')]
    public readonly string $model;

    /**
     * @var positive-int
     */
    #[SerializedPath('[api:year]')]
    public readonly int $year;

    #[SerializedPath('[api:country]')]
    public readonly CountryIso $countryOrigin;

    /**
     * @var non-empty-string
     */
    #[SerializedPath('[api:number]')]
    public readonly string $number;

    #[SerializedPath('[api:source]')]
    public readonly PurchaseType $purchaseType;

    /**
     * @param non-empty-string $brand
     * @param non-empty-string $model
     * @param positive-int     $year
     * @param non-empty-string $number
     */
    public function __construct(
        string $brand,
        string $model,
        int $year,
        CountryIso $countryOrigin,
        string $number,
        PurchaseType $purchaseType,
    ) {
        $this->brand         = $brand;
        $this->model         = $model;
        $this->year          = $year;
        $this->countryOrigin = $countryOrigin;
        $this->number        = $number;
        $this->purchaseType  = $purchaseType;
    }
}
