<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request;

use Symfony\Component\Serializer\Annotation\SerializedPath;

final class GetLoanApplicationStatusRequest
{
    /**
     * @var numeric-string
     */
    #[SerializedPath('[soapenv:Body][api:StatusOptyRequest][api:profileID]')]
    public readonly string $profileId;

    /**
     * @param numeric-string $profileId
     */
    public function __construct(string $profileId)
    {
        $this->profileId = $profileId;
    }
}
