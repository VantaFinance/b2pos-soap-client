<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\Short;

use Symfony\Component\Serializer\Annotation\SerializedPath;
use Vanta\Integration\B2posSoapClient\Infrastructure\Request\MoneyPositiveOrZero;

final class BasketProduct
{
    /**
     * @var non-empty-string
     */
    #[SerializedPath('[goodName]')]
    public readonly string $name;

    #[SerializedPath('[goodPrice]')]
    public readonly MoneyPositiveOrZero $amount;

    /**
     * @var non-empty-string
     */
    #[SerializedPath('[goodModel]')]
    public readonly string $model;

    /**
     * @var non-empty-string
     */
    #[SerializedPath('[goodBrand]')]
    public readonly string $brand;

    /**
     * @param non-empty-string $name
     * @param non-empty-string $model
     * @param non-empty-string $brand
     */
    public function __construct(
        string $name,
        MoneyPositiveOrZero $amount,
        string $model,
        string $brand,
    ) {
        $this->name   = $name;
        $this->amount = $amount;
        $this->model  = $model;
        $this->brand  = $brand;
    }
}
