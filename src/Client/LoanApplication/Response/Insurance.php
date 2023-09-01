<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Response;

use Symfony\Component\Serializer\Annotation\SerializedPath;
use Vanta\Integration\B2posSoapClient\Infrastructure\Request\MoneyPositiveOrZero;

final class Insurance
{
    /**
     * @var non-empty-string
     */
    #[SerializedPath('[ns1:name]')]
    public readonly string $name;

    #[SerializedPath('[ns1:amount]')]
    public readonly MoneyPositiveOrZero $amount;

    #[SerializedPath('[ns1:contract]')]
    public readonly string $documentNumber;

    /**
     * @var non-empty-string
     */
    #[SerializedPath('[ns1:product]')]
    public readonly string $productName;

    /**
     * @param non-empty-string $name
     * @param non-empty-string $productName
     */
    public function __construct(
        string $name,
        MoneyPositiveOrZero $amount,
        string $documentNumber,
        string $productName,
    ) {
        $this->name           = $name;
        $this->amount         = $amount;
        $this->documentNumber = $documentNumber;
        $this->productName    = $productName;
    }
}
