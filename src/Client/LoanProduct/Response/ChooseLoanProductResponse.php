<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanProduct\Response;

use Symfony\Component\Serializer\Annotation\SerializedPath;
use Vanta\Integration\B2posSoapClient\Infrastructure\Struct\Base64;

final class ChooseLoanProductResponse
{
    /**
     * @var numeric-string
     */
    #[SerializedPath('[soapenv:Body][api:AcceptOptyResponse][api:profileID]')]
    public readonly string $profileId;

    #[SerializedPath('[soapenv:Body][api:AcceptOptyResponse][api:success]')]
    public readonly bool $isResultSuccess;

    #[SerializedPath('[soapenv:Body][api:AcceptOptyResponse][api:contract]')]
    public readonly Base64 $loanAgreement;

    /**
     * @var non-empty-string|null
     */
    #[SerializedPath('[soapenv:Body][api:AcceptOptyResponse][api:agreementNumber]')]
    public readonly ?string $loanAgreementNumber;

    /**
     * @var non-empty-string|null
     */
    #[SerializedPath('[soapenv:Body][api:AcceptOptyResponse][api:accountNumber]')]
    public readonly ?string $accountNumber;

    /**
     * @var array<int, AdditionalDocument>
     */
    #[SerializedPath('[soapenv:Body][api:AcceptOptyResponse][api:additionalDocuments][api:document]')]
    public readonly array $additionalDocuments;

    /**
     * @param numeric-string                 $profileId
     * @param non-empty-string|null          $loanAgreementNumber
     * @param non-empty-string|null          $accountNumber
     * @param array<int, AdditionalDocument> $additionalDocuments
     */
    public function __construct(
        string $profileId,
        bool $isResultSuccess,
        Base64 $loanAgreement,
        ?string $loanAgreementNumber = null,
        ?string $accountNumber = null,
        array $additionalDocuments = [],
    ) {
        $this->profileId           = $profileId;
        $this->isResultSuccess     = $isResultSuccess;
        $this->loanAgreement       = $loanAgreement;
        $this->loanAgreementNumber = $loanAgreementNumber;
        $this->accountNumber       = $accountNumber;
        $this->additionalDocuments = $additionalDocuments;
    }
}
