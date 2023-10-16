<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Response;

use Symfony\Component\Serializer\Annotation\SerializedPath;
use Vanta\Integration\B2posSoapClient\Infrastructure\Struct\MoneyPositiveOrZero;

final class Offer
{
    #[SerializedPath('[ns1:amount]')]
    public readonly MoneyPositiveOrZero $paymentAmount;

    #[SerializedPath('[ns1:rate]')]
    public readonly float $loanRate;

    /**
     * @var positive-int|null
     */
    #[SerializedPath('[ns1:terms]')]
    public readonly ?int $periodToInMonths;

    #[SerializedPath('[ns1:firstPayment]')]
    public readonly ?MoneyPositiveOrZero $initialPaymentAmount;

    #[SerializedPath('[ns1:monthlyAmount]')]
    public readonly ?MoneyPositiveOrZero $paymentAmountInMonth;

    #[SerializedPath('[ns1:insuranceAmount]')]
    public readonly ?MoneyPositiveOrZero $insuranceAmount;

    #[SerializedPath('[ns1:otherAmount]')]
    public readonly ?MoneyPositiveOrZero $otherProductsAmount;

    #[SerializedPath('[ns1:rebate]')]
    public readonly ?float $discount;

    /**
     * @var numeric-string|null
     */
    #[SerializedPath('[ns1:variantID]')]
    public readonly ?string $loanProductId;

    /**
     * @var non-empty-string|null
     */
    #[SerializedPath('[ns1:product]')]
    public readonly ?string $loanProductName;

    /**
     * @param positive-int|null     $periodToInMonths
     * @param numeric-string|null   $loanProductId
     * @param non-empty-string|null $loanProductName
     */
    public function __construct(
        MoneyPositiveOrZero $paymentAmount,
        float $loanRate,
        ?int $periodToInMonths,
        ?MoneyPositiveOrZero $initialPaymentAmount,
        ?MoneyPositiveOrZero $paymentAmountInMonth,
        ?MoneyPositiveOrZero $insuranceAmount,
        ?MoneyPositiveOrZero $otherProductsAmount,
        ?float $discount,
        ?string $loanProductId,
        ?string $loanProductName,
    ) {
        $this->paymentAmount        = $paymentAmount;
        $this->loanRate             = $loanRate;
        $this->periodToInMonths     = $periodToInMonths;
        $this->initialPaymentAmount = $initialPaymentAmount;
        $this->paymentAmountInMonth = $paymentAmountInMonth;
        $this->insuranceAmount      = $insuranceAmount;
        $this->otherProductsAmount  = $otherProductsAmount;
        $this->discount             = $discount;
        $this->loanProductId        = $loanProductId;
        $this->loanProductName      = $loanProductName;
    }
}
