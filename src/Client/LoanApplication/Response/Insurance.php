<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Response;

use Symfony\Component\Serializer\Annotation\SerializedPath;
use Vanta\Integration\B2posSoapClient\Infrastructure\Struct\MoneyPositiveOrZero;

final class Insurance
{
    /**v
     * @var non-empty-string
     */
    #[SerializedPath('[ns1:name]')]
    public readonly string $name;

    #[SerializedPath('[ns1:amount]')]
    public readonly MoneyPositiveOrZero $amount;

    /**
     * @var non-empty-string
     */
    #[SerializedPath('[ns1:product]')]
    public readonly string $productName;

    /**
     * @var non-empty-string|null
     */
    #[SerializedPath('[ns1:contract]')]
    public readonly ?string $documentNumber;

    /**
     * @param non-empty-string      $name
     * @param non-empty-string      $productName
     * @param non-empty-string|null $documentNumber
     */
    public function __construct(
        string $name,
        MoneyPositiveOrZero $amount,
        string $productName,
        ?string $documentNumber = null,
    ) {
        $this->name           = $name;
        $this->amount         = $amount;
        $this->productName    = $productName;
        $this->documentNumber = $documentNumber;
    }
}
