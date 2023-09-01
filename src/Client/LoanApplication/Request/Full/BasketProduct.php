<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\Full;

use Symfony\Component\Serializer\Annotation\SerializedPath;
use Vanta\Integration\B2posSoapClient\Infrastructure\Request\MoneyPositiveOrZero;

final class BasketProduct
{
    #[SerializedPath('[api:id]')]
    public readonly BasketProductName $name;

    /**
     * @var non-empty-string
     */
    #[SerializedPath('[api:model]')]
    public readonly string $model;

    /**
     * @var non-empty-string
     */
    #[SerializedPath('[api:brand]')]
    public readonly string $brand;

    #[SerializedPath('[api:price]')]
    public readonly MoneyPositiveOrZero $amount;

    /**
     * @var non-empty-string
     */
    #[SerializedPath('[api:idGoodVendor]')]
    public readonly string $productCode;

    /**
     * @param non-empty-string $model
     * @param non-empty-string $brand
     * @param non-empty-string $productCode
     */
    public function __construct(
        BasketProductName $name,
        string $model,
        string $brand,
        MoneyPositiveOrZero $amount,
        string $productCode,
    ) {
        $this->name        = $name;
        $this->model       = $model;
        $this->brand       = $brand;
        $this->amount      = $amount;
        $this->productCode = $productCode;
    }
}
