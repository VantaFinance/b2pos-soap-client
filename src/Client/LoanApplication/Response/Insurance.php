<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Response;

use Symfony\Component\Serializer\Annotation\SerializedPath;
use Vanta\Integration\B2posSoapClient\Infrastructure\Struct\MoneyPositiveOrZero;

final class Insurance
{
    #[SerializedPath('[ns1:amount]')]
    public readonly MoneyPositiveOrZero $amount;

    /**v
     * @var non-empty-string|null
     */
    #[SerializedPath('[ns1:name]')]
    public readonly ?string $name;

    /**
     * @var non-empty-string|null
     */
    #[SerializedPath('[ns1:product]')]
    public readonly ?string $productName;

    /**
     * @var non-empty-string|null
     */
    #[SerializedPath('[ns1:contract]')]
    public readonly ?string $documentNumber;

    /**
     * @param non-empty-string|null $name
     * @param non-empty-string|null $productName
     * @param non-empty-string|null $documentNumber
     */
    public function __construct(
        MoneyPositiveOrZero $amount,
        ?string $name,
        ?string $productName,
        ?string $documentNumber,
    ) {
        $this->amount         = $amount;
        $this->name           = $name;
        $this->productName    = $productName;
        $this->documentNumber = $documentNumber;
    }
}
