<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanProduct\Response;

use Symfony\Component\Serializer\Annotation\SerializedPath;
use Vanta\Integration\B2posSoapClient\Infrastructure\Struct\MoneyPositiveOrZero;

final class LoanProduct
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
     * @var positive-int
     */
    #[SerializedPath('[ns1:termFrom]')]
    public readonly int $periodFromInMonths;

    /**
     * @var positive-int
     */
    #[SerializedPath('[ns1:termTo]')]
    public readonly int $periodToInMonths;

    #[SerializedPath('[ns1:amountFrom]')]
    public readonly MoneyPositiveOrZero $paymentAmountFrom;

    #[SerializedPath('[ns1:firstPaymentFrom]')]
    public readonly MoneyPositiveOrZero $firstPaymentAmountFrom;

    #[SerializedPath('[ns1:firstPaymentTo]')]
    public readonly MoneyPositiveOrZero $firstPaymentAmountTo;

    #[SerializedPath('[ns1:creditRate]')]
    public readonly float $loanRate;

    #[SerializedPath('[ns1:amountTo]')]
    public readonly ?MoneyPositiveOrZero $paymentAmountTo;

    /**
     * @param numeric-string   $id
     * @param non-empty-string $name
     * @param positive-int     $periodFromInMonths
     * @param positive-int     $periodToInMonths
     */
    public function __construct(
        string $id,
        string $name,
        int $periodFromInMonths,
        int $periodToInMonths,
        MoneyPositiveOrZero $paymentAmountFrom,
        MoneyPositiveOrZero $firstPaymentAmountFrom,
        MoneyPositiveOrZero $firstPaymentAmountTo,
        float $loanRate,
        MoneyPositiveOrZero $paymentAmountTo,
    ) {
        $this->id                     = $id;
        $this->name                   = $name;
        $this->periodFromInMonths     = $periodFromInMonths;
        $this->periodToInMonths       = $periodToInMonths;
        $this->paymentAmountFrom      = $paymentAmountFrom;
        $this->firstPaymentAmountFrom = $firstPaymentAmountFrom;
        $this->firstPaymentAmountTo   = $firstPaymentAmountTo;
        $this->loanRate               = $loanRate;
        $this->paymentAmountTo        = $paymentAmountTo;
    }
}
