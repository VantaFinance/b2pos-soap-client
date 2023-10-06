<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanAgreement\Response;

use Symfony\Component\Serializer\Annotation\SerializedPath;

final class AuthorizeLoanAgreementResponse
{
    /**
     * @var numeric-string
     */
    #[SerializedPath('[soapenv:Body][api:AuthOptyResponse][api:profileID]')]
    public readonly string $loanApplicationId;

    #[SerializedPath('[soapenv:Body][api:AuthOptyResponse][api:success]')]
    public readonly bool $isResultSuccess;

    // @todo $loanAgreementId? Выяснить после тестирования/появления документации
    /**
     * @var non-empty-string
     */
    #[SerializedPath('[soapenv:Body][api:AuthOptyResponse][api:agreementNumber]')]
    public readonly string $loanAgreementNumber;

    /**
     * @var non-empty-string
     */
    #[SerializedPath('[soapenv:Body][api:AuthOptyResponse][api:authCode]')]
    public readonly string $authorizationCode;

    /**
     * @param numeric-string   $loanApplicationId
     * @param non-empty-string $loanAgreementNumber
     * @param non-empty-string $authorizationCode
     */
    public function __construct(
        string $loanApplicationId,
        bool $isResultSuccess,
        string $loanAgreementNumber,
        string $authorizationCode,
    ) {
        $this->loanApplicationId   = $loanApplicationId;
        $this->isResultSuccess     = $isResultSuccess;
        $this->loanAgreementNumber = $loanAgreementNumber;
        $this->authorizationCode   = $authorizationCode;
    }
}
