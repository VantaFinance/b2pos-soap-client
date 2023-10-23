<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanProduct\Response;

use Symfony\Component\Serializer\Annotation\SerializedPath;

final class CancelOfferResponse
{
    /**
     * @var numeric-string
     */
    #[SerializedPath('[soapenv:Body][ns1:CancelOptyResponse][ns1:profileID]')]
    public readonly string $profileId;

    #[SerializedPath('[soapenv:Body][ns1:CancelOptyResponse][ns1:success]')]
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
