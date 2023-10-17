<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\Document\Response;

use Symfony\Component\Serializer\Annotation\SerializedPath;
use Vanta\Integration\B2posSoapClient\Client\Document\Struct\LoanApplicationBankCheckStatus;

final class GetDocumentsCheckResultResponse
{
    /**
     * @var numeric-string
     */
    #[SerializedPath('[soapenv:Body][ns1:CheckScansOptyResponse][ns1:profileID]')]
    public readonly string $loanApplicationId;

    #[SerializedPath('[soapenv:Body][ns1:CheckScansOptyResponse][ns1:result]')]
    public readonly LoanApplicationBankCheckStatus $checkStatus;

    /**
     * @var array<int, DocumentCheckStatus>
     */
    #[SerializedPath('[soapenv:Body][ns1:CheckScansOptyResponse][ns1:documents][ns1:document]')]
    public readonly array $documentCheckStatuses;

    /**
     * @param numeric-string                  $loanApplicationId
     * @param array<int, DocumentCheckStatus> $documentCheckStatuses
     */
    public function __construct(
        string $loanApplicationId,
        LoanApplicationBankCheckStatus $checkStatus,
        array $documentCheckStatuses = [],
    ) {
        $this->loanApplicationId     = $loanApplicationId;
        $this->checkStatus           = $checkStatus;
        $this->documentCheckStatuses = $documentCheckStatuses;
    }
}
