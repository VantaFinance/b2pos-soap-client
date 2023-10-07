<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanProduct\Request;

use Symfony\Component\Serializer\Annotation\SerializedPath;
use Vanta\Integration\B2posSoapClient\Client\LoanProduct\Struct\LoanType;
use Vanta\Integration\B2posSoapClient\Infrastructure\Struct\MoneyPositiveOrZero;

final class GetAvailableLoanProductsRequest
{
    #[SerializedPath('[env:Body][ns1:CalculatorBookOptyRequest][ns1:goodsAmount]')]
    public readonly MoneyPositiveOrZero $paymentAmount;

    #[SerializedPath('[env:Body][ns1:CalculatorBookOptyRequest][ns1:firstAmount]')]
    public readonly MoneyPositiveOrZero $firstPaymentAmount;

    #[SerializedPath('[env:Body][ns1:CalculatorBookOptyRequest][ns1:creditTerm]')]
    public readonly int $loanPeriodInMonths;

    #[SerializedPath('[env:Body][ns1:CalculatorBookOptyRequest][ns1:creditType]')]
    public readonly LoanType $loanType;

    /**
     * @var numeric-string|null
     */
    #[SerializedPath('[env:Body][ns1:CalculatorBookOptyRequest][ns1:tradeID]')]
    public ?string $tradeId;

    /**
     * @param numeric-string|null $tradeId
     */
    public function __construct(
        MoneyPositiveOrZero $paymentAmount,
        MoneyPositiveOrZero $firstPaymentAmount,
        int $loanPeriodInMonths,
        LoanType $loanType,
        ?string $tradeId,
    ) {
        $this->paymentAmount      = $paymentAmount;
        $this->firstPaymentAmount = $firstPaymentAmount;
        $this->loanPeriodInMonths = $loanPeriodInMonths;
        $this->loanType           = $loanType;
        $this->tradeId            = $tradeId;
    }
}
