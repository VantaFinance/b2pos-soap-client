<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanAgreement\Request;

use Symfony\Component\Serializer\Annotation\SerializedPath;

final class AuthorizeLoanAgreementRequest
{
    /**
     * @var numeric-string
     */
    #[SerializedPath('[soapenv:Body][api:AuthOptyRequest][api:profileID]')]
    public readonly string $loanApplicationId;

    /**
     * @var numeric-string
     */
    #[SerializedPath('[soapenv:Body][api:AuthOptyRequest][api:acceptBank]')]
    public readonly string $bankId;

    /**
     * @var array<int, Document>
     */
    #[SerializedPath('[soapenv:Body][api:AuthOptyRequest][api:documents][api:document]')]
    public readonly array $documents;

    /**
     * @param numeric-string       $loanApplicationId
     * @param numeric-string       $bankId
     * @param array<int, Document> $documents
     */
    public function __construct(
        string $loanApplicationId,
        string $bankId,
        array $documents = [],
    ) {
        $this->loanApplicationId = $loanApplicationId;
        $this->bankId            = $bankId;
        $this->documents         = $documents;
    }
}
