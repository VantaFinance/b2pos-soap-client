<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanProduct\Response;

use Symfony\Component\Serializer\Annotation\SerializedPath;
use Vanta\Integration\B2posSoapClient\Infrastructure\Struct\Base64;

final class ChooseLoanProductResponse
{
    #[SerializedPath('[soapenv:Body][api:AcceptOptyResponse][api:success]')]
    public readonly bool $isResultSuccess;

    #[SerializedPath('[soapenv:Body][api:AcceptOptyResponse][api:contract]')]
    public readonly Base64 $loanAgreement;

    /**
     * @var numeric-string|null
     */
    #[SerializedPath('[soapenv:Body][api:AcceptOptyResponse][api:profileID]')]
    public readonly ?string $loanApplicationId;

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
     * @var non-empty-array<int, AdditionalDocument>
     */
    #[SerializedPath('[soapenv:Body][api:AcceptOptyResponse][api:additionalDocuments][api:document]')]
    public readonly ?array $additionalDocument;

    /**
     * @param numeric-string|null                      $loanApplicationId
     * @param non-empty-string|null                    $loanAgreementNumber
     * @param non-empty-string|null                    $accountNumber
     * @param non-empty-array<int, AdditionalDocument> $additionalDocument
     */
    public function __construct(
        bool $isResultSuccess,
        Base64 $loanAgreement,
        ?string $loanApplicationId = null,
        ?string $loanAgreementNumber = null,
        ?string $accountNumber = null,
        ?array $additionalDocument = null,
    ) {
        $this->isResultSuccess     = $isResultSuccess;
        $this->loanAgreement       = $loanAgreement;
        $this->loanApplicationId   = $loanApplicationId;
        $this->loanAgreementNumber = $loanAgreementNumber;
        $this->accountNumber       = $accountNumber;
        $this->additionalDocument  = $additionalDocument;
    }
}
