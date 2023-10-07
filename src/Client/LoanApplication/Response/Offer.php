<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Response;

use Symfony\Component\Serializer\Annotation\SerializedPath;
use Vanta\Integration\B2posSoapClient\Infrastructure\Struct\MoneyPositiveOrZero;

final class Offer
{
    /**
     * @var numeric-string
     */
    #[SerializedPath('[ns1:variantID]')]
    public readonly string $loanProductId;

    /**
     * @var non-empty-string
     */
    #[SerializedPath('[ns1:product]')]
    public readonly string $loanProductName;

    #[SerializedPath('[ns1:amount]')]
    public readonly MoneyPositiveOrZero $paymentAmount;

    /**
     * @var positive-int
     */
    #[SerializedPath('[ns1:terms]')]
    public readonly int $periodToInMonths;

    #[SerializedPath('[ns1:firstPayment]')]
    public readonly MoneyPositiveOrZero $initialPaymentAmount;

    #[SerializedPath('[ns1:monthlyAmount]')]
    public readonly MoneyPositiveOrZero $paymentAmountInMonth;

    #[SerializedPath('[ns1:insuranceAmount]')]
    public readonly MoneyPositiveOrZero $insuranceAmount;

    #[SerializedPath('[ns1:otherAmount]')]
    public readonly MoneyPositiveOrZero $otherProductsAmount;

    #[SerializedPath('[ns1:rate]')]
    public readonly float $loanRate;

    #[SerializedPath('[ns1:rebate]')]
    public readonly float $discount;

    /**
     * @param numeric-string   $loanProductId
     * @param non-empty-string $loanProductName
     * @param positive-int     $periodToInMonths
     */
    public function __construct(
        string $loanProductId,
        string $loanProductName,
        MoneyPositiveOrZero $paymentAmount,
        int $periodToInMonths,
        MoneyPositiveOrZero $initialPaymentAmount,
        MoneyPositiveOrZero $paymentAmountInMonth,
        MoneyPositiveOrZero $insuranceAmount,
        MoneyPositiveOrZero $otherProductsAmount,
        float $loanRate,
        float $discount,
    ) {
        $this->loanProductId        = $loanProductId;
        $this->loanProductName      = $loanProductName;
        $this->paymentAmount        = $paymentAmount;
        $this->periodToInMonths     = $periodToInMonths;
        $this->initialPaymentAmount = $initialPaymentAmount;
        $this->paymentAmountInMonth = $paymentAmountInMonth;
        $this->insuranceAmount      = $insuranceAmount;
        $this->otherProductsAmount  = $otherProductsAmount;
        $this->loanRate             = $loanRate;
        $this->discount             = $discount;
    }
}
