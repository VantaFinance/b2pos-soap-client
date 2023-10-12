<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Response;

use Symfony\Component\Serializer\Annotation\SerializedPath;

final class GetLoanApplicationStatusResponse
{
    /**
     * @var numeric-string|null
     */
    #[SerializedPath('[soapenv:Body][ns1:StatusOptyResponse][ns1:profileID]')]
    public readonly ?string $loanApplicationId;

    /**
     * @var numeric-string|null
     */
    #[SerializedPath('[soapenv:Body][ns1:StatusOptyResponse][ns1:codeAgentMarket]')]
    public readonly ?string $employeeCodeInShop;

    /**
     * @var non-empty-array<int, ResultFromBank>|null
     */
    #[SerializedPath('[soapenv:Body][ns1:StatusOptyResponse][ns1:results][ns1:result]')]
    public readonly ?array $resultFromBanks;

    /**
     * @param numeric-string|null                       $loanApplicationId
     * @param numeric-string|null                       $employeeCodeInShop
     * @param non-empty-array<int, ResultFromBank>|null $resultFromBanks
     */
    public function __construct(
        ?string $loanApplicationId = null,
        ?string $employeeCodeInShop = null,
        ?array $resultFromBanks = null,
    ) {
        $this->loanApplicationId  = $loanApplicationId;
        $this->employeeCodeInShop = $employeeCodeInShop;
        $this->resultFromBanks    = $resultFromBanks;
    }
}
