<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Response;

use Symfony\Component\Serializer\Annotation\SerializedPath;
use Vanta\Integration\B2posSoapClient\Infrastructure\Struct\MoneyPositiveOrZero;

abstract class Offer
{
    /**
     * @var non-empty-string
     */
    #[SerializedPath('[ns1:product]')]
    public readonly string $loanProductName;

    #[SerializedPath('[ns1:amount]')]
    public readonly MoneyPositiveOrZero $paymentAmount;

    #[SerializedPath('[ns1:rate]')]
    public readonly float $loanRate;

    /**
     * @var numeric-string|null
     */
    #[SerializedPath('[ns1:variantID]')]
    public readonly ?string $loanProductId;

    /**
     * @param non-empty-string    $loanProductName
     * @param numeric-string|null $loanProductId
     */
    public function __construct(
        string $loanProductName,
        MoneyPositiveOrZero $paymentAmount,
        float $loanRate,
        ?string $loanProductId = null,
    ) {
        $this->loanProductName = $loanProductName;
        $this->paymentAmount   = $paymentAmount;
        $this->loanRate        = $loanRate;
        $this->loanProductId   = $loanProductId;
    }
}
