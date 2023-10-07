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

    #[SerializedPath('[api:firstPayment]')]
    public readonly ?MoneyPositiveOrZero $firstPaymentAmount;

    #[SerializedPath('[api:type]')]
    public readonly ?LoanType $loanType;

    /**
     * @param numeric-string      $id
     * @param numeric-string|null $productId
     * @param positive-int|null   $loanPeriodInMonths
     */
    public function __construct(
        string $id,
        ?string $productId = null,
        ?int $loanPeriodInMonths = null,
        ?MoneyPositiveOrZero $firstPaymentAmount = null,
        ?LoanType $loanType = null,
    ) {
        $this->id                 = $id;
        $this->productId          = $productId;
        $this->loanPeriodInMonths = $loanPeriodInMonths;
        $this->firstPaymentAmount = $firstPaymentAmount;
        $this->loanType           = $loanType;
    }
}
