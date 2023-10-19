<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\Full;

use Symfony\Component\Serializer\Annotation\SerializedPath;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Full\LoanType;
use Vanta\Integration\B2posSoapClient\Infrastructure\Struct\MoneyPositiveOrZero;

final class SelectedBank
{
    /**
     * @var numeric-string
     */
    #[SerializedPath('[api:id]')]
    public readonly string $id;

    /**
     * @var numeric-string|null
     */
    #[SerializedPath('[api:productID]')]
    public readonly ?string $productId;

    /**
     * @var positive-int|null
     */
    #[SerializedPath('[api:duration]')]
    public readonly ?int $loanPeriodInMonths;

    #[SerializedPath('[api:type]')]
    public readonly ?LoanType $loanType;

    #[SerializedPath('[api:firstPayment]')]
    public readonly MoneyPositiveOrZero $firstPaymentAmount;

    /**
     * @param numeric-string      $id
     * @param numeric-string|null $productId
     * @param positive-int|null   $loanPeriodInMonths
     */
    public function __construct(
        string $id,
        ?string $productId = null,
        ?int $loanPeriodInMonths = null,
        ?LoanType $loanType = null,
        MoneyPositiveOrZero $firstPaymentAmount = new MoneyPositiveOrZero('0'),
    ) {
        $this->id                 = $id;
        $this->productId          = $productId;
        $this->loanPeriodInMonths = $loanPeriodInMonths;
        $this->loanType           = $loanType;
        $this->firstPaymentAmount = $firstPaymentAmount;
    }
}
