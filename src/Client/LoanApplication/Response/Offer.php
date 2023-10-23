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
     * @param non-empty-string $loanProductName
     */
    public function __construct(
        string $loanProductName,
        MoneyPositiveOrZero $paymentAmount,
        float $loanRate,
    ) {
        $this->loanProductName = $loanProductName;
        $this->paymentAmount   = $paymentAmount;
        $this->loanRate        = $loanRate;
    }
}
