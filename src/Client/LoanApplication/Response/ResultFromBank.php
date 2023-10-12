<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Response;

use Symfony\Component\Serializer\Annotation\SerializedPath;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\BankDecision;
use Vanta\Integration\B2posSoapClient\Infrastructure\Struct\SignType;

final class ResultFromBank
{
    #[SerializedPath('[ns1:signType]')]
    public readonly SignType $signTypeAvailableForLoanApplicationAndBank;

    #[SerializedPath('[ns1:signedType]')]
    public readonly SignType $signType;

    #[SerializedPath('[ns1:signedTypeStatus]')]
    public readonly bool $isSesSigned; // Simple Electronic Signature

    /**
     * @var numeric-string|null
     */
    #[SerializedPath('[ns1:bank]')]
    public readonly ?string $bankId;

    #[SerializedPath('[ns1:decision]')]
    public readonly ?BankDecision $decision;

    /**
     * @var non-empty-string|null
     */
    #[SerializedPath('[ns1:error_text]')]
    public readonly ?string $errorText;

    /**
     * @var numeric-string|null
     */
    #[SerializedPath('[ns1:selectedVariant]')]
    public readonly ?string $chosenBankProductId;

    #[SerializedPath('[ns1:authStatus]')]
    public readonly ?bool $isLoanAgreementAuthorized;

    /**
     * @var non-empty-string|null
     */
    #[SerializedPath('[ns1:contractNumber]')]
    public readonly ?string $loanAgreementNumber;

    /**
     * @var non-empty-string|null
     */
    #[SerializedPath('[ns1:authCode]')]
    public readonly ?string $authorizationCode;

    #[SerializedPath('[ns1:requestCancel]')]
    public readonly ?bool $isLoanApplicationCanceled;

    #[SerializedPath('[ns1:authCancel]')]
    public readonly ?bool $isLoanAgreementAuthorizationCancel;

    #[SerializedPath('[ns1:increasedLimit]')]
    public readonly ?bool $isIncreasedLimitApproved;

    #[SerializedPath('[ns1:offer]')]
    public readonly ?Offer $offer;

    /**
     * @var non-empty-string|null
     */
    #[SerializedPath('[ns1:branchCode]')]
    public readonly ?string $branchCode;

    /**
     * @var non-empty-string|null
     */
    #[SerializedPath('[ns1:authUserCode]')]
    public readonly ?string $authorizationUserCode;

    #[SerializedPath('[ns1:isActiveSES]')]
    public readonly ?bool $sesAvailable; // Simple Electronic Signature

    #[SerializedPath('[ns1:isOldClientSES]')]
    public readonly ?bool $isOldClientSes;

    /**
     * @var array<int, Insurance>
     */
    #[SerializedPath('[ns1:insurances][ns1:insurance]')]
    public readonly array $insurances;

    /**
     * @param numeric-string|null   $bankId
     * @param non-empty-string|null $errorText
     * @param numeric-string|null   $chosenBankProductId
     * @param non-empty-string|null $loanAgreementNumber
     * @param non-empty-string|null $authorizationCode
     * @param non-empty-string|null $branchCode
     * @param non-empty-string|null $authorizationUserCode
     * @param array<int, Insurance> $insurances
     */
    public function __construct(
        SignType $signTypeAvailableForLoanApplicationAndBank,
        SignType $signType,
        bool $isSesSigned,
        ?string $bankId = null,
        ?BankDecision $decision = null,
        ?string $errorText = null,
        ?string $chosenBankProductId = null,
        ?bool $isLoanAgreementAuthorized = null,
        ?string $loanAgreementNumber = null,
        ?string $authorizationCode = null,
        ?bool $isLoanApplicationCanceled = null,
        ?bool $isLoanAgreementAuthorizationCancel = null,
        ?bool $isIncreasedLimitApproved = null,
        ?Offer $offer = null,
        ?string $branchCode = null,
        ?string $authorizationUserCode = null,
        ?bool $sesAvailable = null,
        ?bool $isOldClientSes = null,
        array $insurances = [],
    ) {
        $this->signTypeAvailableForLoanApplicationAndBank = $signTypeAvailableForLoanApplicationAndBank;
        $this->signType                                   = $signType;
        $this->isSesSigned                                = $isSesSigned;
        $this->bankId                                     = $bankId;
        $this->decision                                   = $decision;
        $this->errorText                                  = $errorText;
        $this->chosenBankProductId                        = $chosenBankProductId;
        $this->isLoanAgreementAuthorized                  = $isLoanAgreementAuthorized;
        $this->loanAgreementNumber                        = $loanAgreementNumber;
        $this->authorizationCode                          = $authorizationCode;
        $this->isLoanApplicationCanceled                  = $isLoanApplicationCanceled;
        $this->isLoanAgreementAuthorizationCancel         = $isLoanAgreementAuthorizationCancel;
        $this->isIncreasedLimitApproved                   = $isIncreasedLimitApproved;
        $this->offer                                      = $offer;
        $this->branchCode                                 = $branchCode;
        $this->authorizationUserCode                      = $authorizationUserCode;
        $this->sesAvailable                               = $sesAvailable;
        $this->isOldClientSes                             = $isOldClientSes;
        $this->insurances                                 = $insurances;
    }
}
