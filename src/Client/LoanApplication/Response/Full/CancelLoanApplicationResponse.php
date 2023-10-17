<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Response\Full;

use Symfony\Component\Serializer\Annotation\SerializedPath;

final class CancelLoanApplicationResponse
{
    /**
     * @var numeric-string
     */
    #[SerializedPath('[soapenv:Body][ns1:CancelOptyResponse][api:profileID]')]
    public readonly string $profileId;

    #[SerializedPath('[soapenv:Body][api:CancelOptyResponse][api:success]')]
    public readonly bool $isResultSuccess;

    /**
     * @param numeric-string $profileId
     */
    public function __construct(string $profileId, bool $isResultSuccess)
    {
        $this->profileId       = $profileId;
        $this->isResultSuccess = $isResultSuccess;
    }
}
