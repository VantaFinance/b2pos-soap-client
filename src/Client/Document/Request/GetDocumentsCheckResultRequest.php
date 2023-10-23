<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\Document\Request;

use Symfony\Component\Serializer\Annotation\SerializedPath;

final class GetDocumentsCheckResultRequest
{
    /**
     * @var numeric-string
     */
    #[SerializedPath('[soapenv:Body][api:CheckScansOptyRequest][api:profileID]')]
    public readonly string $profileId;

    /**
     * @var numeric-string
     */
    #[SerializedPath('[soapenv:Body][api:CheckScansOptyRequest][api:acceptBank]')]
    public readonly string $bankId;

    /**
     * @param numeric-string $profileId
     * @param numeric-string $bankId
     */
    public function __construct(
        string $profileId,
        string $bankId,
    ) {
        $this->profileId = $profileId;
        $this->bankId    = $bankId;
    }
}
