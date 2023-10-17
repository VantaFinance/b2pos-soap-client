<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\Document\Request;

use Symfony\Component\Serializer\Annotation\SerializedPath;

final class GetDocumentsCheckResultRequest
{
    /**
     * @var numeric-string
     */
    #[SerializedPath('[soapenv:Body][api:CheckScansOptyRequest][api:profileID]')]
    public readonly string $loanApplicationId;

    /**
     * @var numeric-string
     */
    #[SerializedPath('[soapenv:Body][api:CheckScansOptyRequest][api:acceptBank]')]
    public readonly string $bankId;

    /**
     * @param numeric-string $loanApplicationId
     * @param numeric-string $bankId
     */
    public function __construct(
        string $loanApplicationId,
        string $bankId,
    ) {
        $this->loanApplicationId = $loanApplicationId;
        $this->bankId            = $bankId;
    }
}
