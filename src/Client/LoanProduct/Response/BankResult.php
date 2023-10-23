<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanProduct\Response;

use Symfony\Component\Serializer\Annotation\SerializedPath;

final class BankResult
{
    /**
     * @var numeric-string
     */
    #[SerializedPath('[ns1:id]')]
    public readonly string $id;

    /**
     * @var non-empty-string
     */
    #[SerializedPath('[ns1:value]')]
    public readonly string $name;

    /**
     * @var array<int, LoanProduct>
     */
    #[SerializedPath('[ns1:creditProducts][ns1:creditProduct]')]
    public readonly array $availableLoanProducts;

    /**
     * @param numeric-string          $id
     * @param non-empty-string        $name
     * @param array<int, LoanProduct> $availableLoanProducts
     */
    public function __construct(
        string $id,
        string $name,
        array $availableLoanProducts = [],
    ) {
        $this->id                    = $id;
        $this->name                  = $name;
        $this->availableLoanProducts = $availableLoanProducts;
    }
}
