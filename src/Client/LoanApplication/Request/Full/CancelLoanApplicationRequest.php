<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\Full;

use Symfony\Component\Serializer\Annotation\SerializedPath;

final class CancelLoanApplicationRequest
{
    /**
     * @var numeric-string
     */
    #[SerializedPath('[soapenv:Body][api:CancelOptyRequest][api:profileID]')]
    public readonly string $profileId;

    /**
     * @var numeric-string
     */
    #[SerializedPath('[soapenv:Body][api:CancelOptyRequest][api:acceptBank]')]
    public readonly string $bankId;

    /**
     * @param numeric-string $profileId
     * @param numeric-string $bankId
     */
    public function __construct(string $profileId, string $bankId)
    {
        $this->profileId = $profileId;
        $this->bankId    = $bankId;
    }
}
