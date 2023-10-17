<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\Document\Response;

use Symfony\Component\Serializer\Annotation\SerializedPath;
use Vanta\Integration\B2posSoapClient\Client\Document\Struct\DocumentCheckStatus as DocumentCheckStatusEnum;

final class DocumentCheckStatus
{
    /**
     * @var non-empty-string
     */
    #[SerializedPath('[ns1:fileType]')]
    public readonly string $fileType;

    #[SerializedPath('[ns1:response]')]
    public readonly DocumentCheckStatusEnum $checkStatus;

    /**
     * @var non-empty-string|null
     */
    #[SerializedPath('[ns1:reason]')]
    public readonly ?string $errorReason;

    /**
     * @param non-empty-string      $fileType
     * @param non-empty-string|null $errorReason
     */
    public function __construct(
        string $fileType,
        DocumentCheckStatusEnum $checkStatus,
        ?string $errorReason = null,
    ) {
        $this->fileType    = $fileType;
        $this->checkStatus = $checkStatus;
        $this->errorReason = $errorReason;
    }
}
