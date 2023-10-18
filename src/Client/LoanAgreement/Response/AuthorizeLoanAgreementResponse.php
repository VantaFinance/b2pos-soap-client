<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanAgreement\Response;

use Symfony\Component\Serializer\Annotation\SerializedPath;

final class AuthorizeLoanAgreementResponse
{
    /**
     * @var numeric-string
     */
    #[SerializedPath('[soapenv:Body][ns1:AuthOptyResponse][ns1:profileID]')]
    public readonly string $profileId;

    #[SerializedPath('[soapenv:Body][ns1:AuthOptyResponse][ns1:success]')]
    public readonly bool $isResultSuccess;

    // @todo $loanAgreementId? Выяснить после тестирования/появления документации
    /**
     * @var non-empty-string|null
     */
    #[SerializedPath('[soapenv:Body][ns1:AuthOptyResponse][ns1:agreementNumber]')]
    public readonly ?string $loanAgreementNumber;

    /**
     * @var non-empty-string|null
     */
    #[SerializedPath('[soapenv:Body][ns1:AuthOptyResponse][ns1:authCode]')]
    public readonly ?string $authorizationCode;

    /**
     * @param numeric-string        $profileId
     * @param non-empty-string|null $loanAgreementNumber
     * @param non-empty-string|null $authorizationCode
     */
    public function __construct(
        string $profileId,
        bool $isResultSuccess,
        ?string $loanAgreementNumber,
        ?string $authorizationCode,
    ) {
        $this->profileId           = $profileId;
        $this->isResultSuccess     = $isResultSuccess;
        $this->loanAgreementNumber = $loanAgreementNumber;
        $this->authorizationCode   = $authorizationCode;
    }
}
