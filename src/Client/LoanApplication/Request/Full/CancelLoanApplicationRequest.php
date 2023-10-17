<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\Full;

use Symfony\Component\Serializer\Annotation\SerializedPath;

final class CancelLoanApplicationRequest
{
    /**
     * @var numeric-string
     */
    #[SerializedPath('[soapenv:Body][api:CancelOptyRequest][api:profileID]')]
    public readonly string $loanApplicationId;

    /**
     * @var numeric-string
     */
    #[SerializedPath('[soapenv:Body][api:CancelOptyRequest][api:acceptBank]')]
    public readonly string $bankId;

    /**
     * @param numeric-string $loanApplicationId
     * @param numeric-string $bankId
     */
    public function __construct(string $loanApplicationId, string $bankId)
    {
        $this->loanApplicationId = $loanApplicationId;
        $this->bankId            = $bankId;
    }
}
