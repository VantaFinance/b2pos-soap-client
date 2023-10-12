<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanProduct\Response;

use Symfony\Component\Serializer\Annotation\SerializedPath;

final class Bank
{
    /**
     * @var numeric-string|null
     */
    #[SerializedPath('[ns1:id]')]
    public readonly ?string $id;

    /**
     * @var non-empty-string|null
     */
    #[SerializedPath('[ns1:value]')]
    public readonly ?string $name;

    /**
     * @var array<int, LoanProduct>
     */
    #[SerializedPath('[ns1:creditProducts][ns1:creditProduct]')]
    public readonly array $availableLoanProducts;

    /**
     * @param numeric-string|null     $id
     * @param non-empty-string|null   $name
     * @param array<int, LoanProduct> $availableLoanProducts
     */
    public function __construct(
        ?string $id = null,
        ?string $name = null,
        array $availableLoanProducts = [],
    ) {
        $this->id                    = $id;
        $this->name                  = $name;
        $this->availableLoanProducts = $availableLoanProducts;
    }
}
