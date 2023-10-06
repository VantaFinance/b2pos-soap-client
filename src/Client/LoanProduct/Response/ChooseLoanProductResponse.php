<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanProduct\Response;

use Symfony\Component\Serializer\Annotation\SerializedPath;
use Vanta\Integration\B2posSoapClient\Infrastructure\Request\Base64;

final class ChooseLoanProductResponse
{
    /**
     * @var numeric-string
     */
    #[SerializedPath('[soapenv:Body][api:AcceptOptyResponse][api:profileID]')]
    public readonly string $loanApplicationId;

    #[SerializedPath('[soapenv:Body][api:AcceptOptyResponse][api:success]')]
    public readonly bool $isResultSuccess;

    #[SerializedPath('[soapenv:Body][api:AcceptOptyResponse][api:contract]')]
    public readonly Base64 $loanAgreement;

    /**
     * @var non-empty-string
     */
    #[SerializedPath('[soapenv:Body][api:AcceptOptyResponse][api:agreementNumber]')]
    public readonly string $loanAgreementNumber;

    /**
     * @var non-empty-string
     */
    #[SerializedPath('[soapenv:Body][api:AcceptOptyResponse][api:accountNumber]')]
    public readonly string $accountNumber;

    /**
     * @var array<int, AdditionalDocument>
     */
    #[SerializedPath('[soapenv:Body][api:AcceptOptyResponse][api:additionalDocuments][api:document]')]
    public readonly array $additionalDocument;

    /**
     * @param numeric-string                 $loanApplicationId
     * @param non-empty-string               $loanAgreementNumber
     * @param non-empty-string               $accountNumber
     * @param array<int, AdditionalDocument> $additionalDocument
     */
    public function __construct(
        string $loanApplicationId,
        bool $isResultSuccess,
        Base64 $loanAgreement,
        string $loanAgreementNumber,
        string $accountNumber,
        array $additionalDocument,
    ) {
        $this->loanApplicationId   = $loanApplicationId;
        $this->isResultSuccess     = $isResultSuccess;
        $this->loanAgreement       = $loanAgreement;
        $this->loanAgreementNumber = $loanAgreementNumber;
        $this->accountNumber       = $accountNumber;
        $this->additionalDocument  = $additionalDocument;
    }
}
