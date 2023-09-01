<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request;

use Symfony\Component\Serializer\Annotation\SerializedPath;

final class GetLoanApplicationStatusRequest
{
    /**
     * @var numeric-string
     */
    #[SerializedPath('[soapenv:Body][api:StatusOptyRequest][api:profileID]')]
    public readonly string $loanApplicationId;

    /**
     * @param numeric-string $loanApplicationId
     */
    public function __construct(string $loanApplicationId)
    {
        $this->loanApplicationId = $loanApplicationId;
    }
}
