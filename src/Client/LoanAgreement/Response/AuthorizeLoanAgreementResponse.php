<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanAgreement\Response;

use Symfony\Component\Serializer\Annotation\SerializedPath;

final class AuthorizeLoanAgreementResponse
{
    #[SerializedPath('[soapenv:Body][api:AuthOptyResponse][api:success]')]
    public readonly bool $isResultSuccess;

    /**
     * @var numeric-string|null
     */
    #[SerializedPath('[soapenv:Body][api:AuthOptyResponse][api:profileID]')]
    public readonly ?string $loanApplicationId;

    // @todo $loanAgreementId? Выяснить после тестирования/появления документации
    /**
     * @var non-empty-string|null
     */
    #[SerializedPath('[soapenv:Body][api:AuthOptyResponse][api:agreementNumber]')]
    public readonly ?string $loanAgreementNumber;

    /**
     * @var non-empty-string|null
     */
    #[SerializedPath('[soapenv:Body][api:AuthOptyResponse][api:authCode]')]
    public readonly ?string $authorizationCode;

    /**
     * @param numeric-string|null   $loanApplicationId
     * @param non-empty-string|null $loanAgreementNumber
     * @param non-empty-string|null $authorizationCode
     */
    public function __construct(
        bool $isResultSuccess,
        ?string $loanApplicationId,
        ?string $loanAgreementNumber,
        ?string $authorizationCode,
    ) {
        $this->isResultSuccess     = $isResultSuccess;
        $this->loanApplicationId   = $loanApplicationId;
        $this->loanAgreementNumber = $loanAgreementNumber;
        $this->authorizationCode   = $authorizationCode;
    }
}
