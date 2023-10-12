<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanProduct\Response;

use Symfony\Component\Serializer\Annotation\SerializedPath;
use Vanta\Integration\B2posSoapClient\Infrastructure\Struct\MoneyPositiveOrZero;

final class LoanProduct
{
    #[SerializedPath('[ns1:amountFrom]')]
    public readonly MoneyPositiveOrZero $paymentAmountFrom;

    #[SerializedPath('[ns1:amountTo]')]
    public readonly MoneyPositiveOrZero $paymentAmountTo;

    #[SerializedPath('[ns1:firstPaymentFrom]')]
    public readonly MoneyPositiveOrZero $firstPaymentAmountFrom;

    #[SerializedPath('[ns1:firstPaymentTo]')]
    public readonly MoneyPositiveOrZero $firstPaymentAmountTo;

    #[SerializedPath('[ns1:creditRate]')]
    public readonly float $loanRate;

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
     * @var positive-int|null
     */
    #[SerializedPath('[ns1:termFrom]')]
    public readonly ?int $periodFromInMonths;

    /**
     * @var positive-int|null
     */
    #[SerializedPath('[ns1:termTo]')]
    public readonly ?int $periodToInMonths;

    /**
     * @param numeric-string|null   $id
     * @param non-empty-string|null $name
     * @param positive-int|null     $periodFromInMonths
     * @param positive-int|null     $periodToInMonths
     */
    public function __construct(
        MoneyPositiveOrZero $paymentAmountFrom,
        MoneyPositiveOrZero $paymentAmountTo,
        MoneyPositiveOrZero $firstPaymentAmountFrom,
        MoneyPositiveOrZero $firstPaymentAmountTo,
        float $loanRate,
        ?string $id = null,
        ?string $name = null,
        ?int $periodFromInMonths = null,
        ?int $periodToInMonths = null,
    ) {
        $this->paymentAmountFrom      = $paymentAmountFrom;
        $this->paymentAmountTo        = $paymentAmountTo;
        $this->firstPaymentAmountFrom = $firstPaymentAmountFrom;
        $this->firstPaymentAmountTo   = $firstPaymentAmountTo;
        $this->loanRate               = $loanRate;
        $this->id                     = $id;
        $this->name                   = $name;
        $this->periodFromInMonths     = $periodFromInMonths;
        $this->periodToInMonths       = $periodToInMonths;
    }
}
