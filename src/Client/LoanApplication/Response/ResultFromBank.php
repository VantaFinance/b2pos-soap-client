<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Response;

use Symfony\Component\Serializer\Annotation\SerializedPath;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\BankDecision;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\SimpleElectronicSignatureAvailableStatus;
use Vanta\Integration\B2posSoapClient\Client\LoanProduct\Struct\SignType;
use Vanta\Integration\B2posSoapClient\Infrastructure\Struct\MoneyPositiveOrZero;

final class ResultFromBank
{
    /**
     * @var numeric-string
     */
    #[SerializedPath('[ns1:bank]')]
    public readonly string $bankId;

    #[SerializedPath('[ns1:signType]')]
    public readonly SimpleElectronicSignatureAvailableStatus $sesAvailableForLoanApplicationAndBank;

    #[SerializedPath('[ns1:signedType]')]
    public readonly SignType $signTye;

    #[SerializedPath('[ns1:signedTypeStatus]')]
    public readonly bool $isSimpleElectronicSignatureSigned;

    #[SerializedPath('[ns1:decision]')]
    public readonly ?BankDecision $decision;

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

    /**
     * @var numeric-string|null
     */
    #[SerializedPath('[ns1:offer][ns1:variantID]')]
    public readonly ?string $loanProductId;

    /**
     * @var non-empty-string|null
     */
    #[SerializedPath('[ns1:offer][ns1:product]')]
    public readonly ?string $loanProductName;

    #[SerializedPath('[ns1:offer][ns1:amount]')]
    public readonly ?MoneyPositiveOrZero $paymentAmount;

    /**
     * @var positive-int|null
     */
    #[SerializedPath('[ns1:offer][ns1:terms]')]
    public readonly ?int $periodToInMonths;

    #[SerializedPath('[ns1:offer][ns1:firstPayment]')]
    public readonly ?MoneyPositiveOrZero $initialPaymentAmount;

    #[SerializedPath('[ns1:offer][ns1:monthlyAmount]')]
    public readonly ?MoneyPositiveOrZero $paymentAmountInMonth;

    #[SerializedPath('[ns1:offer][ns1:insuranceAmount]')]
    public readonly ?MoneyPositiveOrZero $insuranceAmount;

    #[SerializedPath('[ns1:offer][ns1:otherAmount]')]
    public readonly ?MoneyPositiveOrZero $otherProductsAmount;

    #[SerializedPath('[ns1:offer][ns1:rate]')]
    public readonly ?float $loanRate;

    #[SerializedPath('[ns1:offer][ns1:rebate]')]
    public readonly ?float $discount;

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
    public readonly ?SimpleElectronicSignatureAvailableStatus $sesAvailable;

    #[SerializedPath('[ns1:isOldClientSES]')]
    public readonly ?bool $isOldClientSimpleElectronicSignature;

    /**
     * @var array<int, Insurance>
     */
    #[SerializedPath('[ns1:insurances][ns1:insurance]')]
    public readonly array $insurances;

    /**
     * @param numeric-string        $bankId
     * @param non-empty-string|null $errorText
     * @param numeric-string|null   $chosenBankProductId
     * @param non-empty-string|null $loanAgreementNumber
     * @param non-empty-string|null $authorizationCode
     * @param numeric-string|null   $loanProductId
     * @param non-empty-string|null $loanProductName
     * @param positive-int|null     $periodToInMonths
     * @param array<int, Insurance> $insurances
     * @param non-empty-string|null $branchCode
     * @param non-empty-string|null $authorizationUserCode
     */
    public function __construct(
        string $bankId,
        SimpleElectronicSignatureAvailableStatus $sesAvailableForLoanApplicationAndBank,
        SignType $signTye,
        bool $isSimpleElectronicSignatureSigned,
        ?BankDecision $decision,
        ?string $errorText,
        ?string $chosenBankProductId,
        ?bool $isLoanAgreementAuthorized,
        ?string $loanAgreementNumber,
        ?string $authorizationCode,
        ?bool $isLoanApplicationCanceled,
        ?bool $isLoanAgreementAuthorizationCancel,
        ?bool $isIncreasedLimitApproved,
        ?string $loanProductId,
        ?string $loanProductName,
        ?MoneyPositiveOrZero $paymentAmount,
        ?int $periodToInMonths,
        ?MoneyPositiveOrZero $initialPaymentAmount,
        ?MoneyPositiveOrZero $paymentAmountInMonth,
        ?MoneyPositiveOrZero $insuranceAmount,
        ?MoneyPositiveOrZero $otherProductsAmount,
        ?float $loanRate,
        ?float $discount,
        ?string $branchCode,
        ?string $authorizationUserCode,
        ?SimpleElectronicSignatureAvailableStatus $sesAvailable,
        ?bool $isOldClientSimpleElectronicSignature,
        array $insurances = [],
    ) {
        $this->bankId                                = $bankId;
        $this->sesAvailableForLoanApplicationAndBank = $sesAvailableForLoanApplicationAndBank;
        $this->signTye                               = $signTye;
        $this->isSimpleElectronicSignatureSigned     = $isSimpleElectronicSignatureSigned;
        $this->decision                              = $decision;
        $this->errorText                             = $errorText;
        $this->chosenBankProductId                   = $chosenBankProductId;
        $this->isLoanAgreementAuthorized             = $isLoanAgreementAuthorized;
        $this->loanAgreementNumber                   = $loanAgreementNumber;
        $this->authorizationCode                     = $authorizationCode;
        $this->isLoanApplicationCanceled             = $isLoanApplicationCanceled;
        $this->isLoanAgreementAuthorizationCancel    = $isLoanAgreementAuthorizationCancel;
        $this->isIncreasedLimitApproved              = $isIncreasedLimitApproved;
        $this->loanProductId                         = $loanProductId;
        $this->loanProductName                       = $loanProductName;
        $this->paymentAmount                         = $paymentAmount;
        $this->periodToInMonths                      = $periodToInMonths;
        $this->initialPaymentAmount                  = $initialPaymentAmount;
        $this->paymentAmountInMonth                  = $paymentAmountInMonth;
        $this->insuranceAmount                       = $insuranceAmount;
        $this->otherProductsAmount                   = $otherProductsAmount;
        $this->loanRate                              = $loanRate;
        $this->discount                              = $discount;
        $this->branchCode                            = $branchCode;
        $this->authorizationUserCode                 = $authorizationUserCode;
        $this->sesAvailable                          = $sesAvailable;
        $this->isOldClientSimpleElectronicSignature  = $isOldClientSimpleElectronicSignature;
        $this->insurances                            = $insurances;
    }
}
