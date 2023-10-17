<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanAgreement\Response;

use Symfony\Component\Serializer\Annotation\SerializedPath;

final class AuthorizeLoanAgreementResponse
{
    #[SerializedPath('[soapenv:Body][api:AuthOptyResponse][api:success]')]
    public readonly bool $isResultSuccess;

    /**
     * @var numeric-string
     */
    #[SerializedPath('[soapenv:Body][api:AuthOptyResponse][api:profileID]')]
    public readonly string $profileId;

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
     * @param numeric-string        $profileId
     * @param non-empty-string|null $loanAgreementNumber
     * @param non-empty-string|null $authorizationCode
     */
    public function __construct(
        bool $isResultSuccess,
        string $profileId,
        ?string $loanAgreementNumber,
        ?string $authorizationCode,
    ) {
        $this->isResultSuccess     = $isResultSuccess;
        $this->profileId           = $profileId;
        $this->loanAgreementNumber = $loanAgreementNumber;
        $this->authorizationCode   = $authorizationCode;
    }
}
