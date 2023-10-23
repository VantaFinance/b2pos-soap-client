<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Response\Full;

use Symfony\Component\Serializer\Annotation\SerializedPath;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Response\Offer as OfferAbstract;
use Vanta\Integration\B2posSoapClient\Infrastructure\Struct\MoneyPositiveOrZero;

final class Offer extends OfferAbstract
{
    /**
     * @var numeric-string
     */
    #[SerializedPath('[ns1:terms]')]
    public readonly string $periodToInMonths;

    #[SerializedPath('[ns1:firstPayment]')]
    public readonly MoneyPositiveOrZero $initialPaymentAmount;

    #[SerializedPath('[ns1:monthlyAmount]')]
    public readonly MoneyPositiveOrZero $paymentAmountInMonth;

    #[SerializedPath('[ns1:insuranceAmount]')]
    public readonly MoneyPositiveOrZero $insuranceAmount;

    #[SerializedPath('[ns1:otherAmount]')]
    public readonly MoneyPositiveOrZero $otherProductsAmount;

    /**
     * @var numeric-string|null
     */
    #[SerializedPath('[ns1:variantID]')]
    public readonly ?string $loanProductId;

    #[SerializedPath('[ns1:rebate]')]
    public readonly ?float $discount;

    /**
     * @param non-empty-string    $loanProductName
     * @param numeric-string      $periodToInMonths
     * @param numeric-string|null $loanProductId
     */
    public function __construct(
        string $loanProductName,
        MoneyPositiveOrZero $paymentAmount,
        float $loanRate,
        string $periodToInMonths,
        MoneyPositiveOrZero $initialPaymentAmount = new MoneyPositiveOrZero('0'),
        MoneyPositiveOrZero $paymentAmountInMonth = new MoneyPositiveOrZero('0'),
        MoneyPositiveOrZero $insuranceAmount = new MoneyPositiveOrZero('0'),
        MoneyPositiveOrZero $otherProductsAmount = new MoneyPositiveOrZero('0'),
        ?string $loanProductId = null,
        ?float $discount = null,
    ) {
        parent::__construct($loanProductName, $paymentAmount, $loanRate);

        $this->periodToInMonths     = $periodToInMonths;
        $this->initialPaymentAmount = $initialPaymentAmount;
        $this->paymentAmountInMonth = $paymentAmountInMonth;
        $this->insuranceAmount      = $insuranceAmount;
        $this->otherProductsAmount  = $otherProductsAmount;
        $this->loanProductId        = $loanProductId;
        $this->discount             = $discount;
    }
}
