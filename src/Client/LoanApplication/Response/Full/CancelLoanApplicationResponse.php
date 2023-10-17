<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Response\Full;

use Symfony\Component\Serializer\Annotation\SerializedPath;

final class CancelLoanApplicationResponse
{
    /**
     * @var numeric-string
     */
    #[SerializedPath('[soapenv:Body][ns1:CancelOptyResponse][api:profileID]')]
    public readonly string $loanApplicationId;

    #[SerializedPath('[soapenv:Body][api:CancelOptyResponse][api:success]')]
    public readonly bool $isResultSuccess;

    /**
     * @param numeric-string $loanApplicationId
     */
    public function __construct(string $loanApplicationId, bool $isResultSuccess)
    {
        $this->loanApplicationId = $loanApplicationId;
        $this->isResultSuccess   = $isResultSuccess;
    }
}
