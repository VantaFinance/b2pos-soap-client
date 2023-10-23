<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\Document\Response;

use Symfony\Component\Serializer\Annotation\SerializedPath;
use Vanta\Integration\B2posSoapClient\Client\Document\Struct\LoanApplicationBankVerificationStatus;

final class GetDocumentsCheckResultResponse
{
    /**
     * @var numeric-string
     */
    #[SerializedPath('[soapenv:Body][ns1:CheckScansOptyResponse][ns1:profileID]')]
    public readonly string $profileId;

    #[SerializedPath('[soapenv:Body][ns1:CheckScansOptyResponse][ns1:result]')]
    public readonly LoanApplicationBankVerificationStatus $checkStatus;

    /**
     * @var array<int, DocumentCheckStatus>
     */
    #[SerializedPath('[soapenv:Body][ns1:CheckScansOptyResponse][ns1:documents][ns1:document]')]
    public readonly array $documentCheckStatuses;

    /**
     * @param numeric-string                  $profileId
     * @param array<int, DocumentCheckStatus> $documentCheckStatuses
     */
    public function __construct(
        string $profileId,
        LoanApplicationBankVerificationStatus $checkStatus,
        array $documentCheckStatuses = [],
    ) {
        $this->profileId             = $profileId;
        $this->checkStatus           = $checkStatus;
        $this->documentCheckStatuses = $documentCheckStatuses;
    }
}
