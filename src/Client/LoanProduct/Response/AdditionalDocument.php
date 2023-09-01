<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanProduct\Response;

use Symfony\Component\Serializer\Annotation\SerializedPath;
use Vanta\Integration\B2posSoapClient\Infrastructure\Request\Base64;

final class AdditionalDocument
{
    #[SerializedPath('[api:fileType]')]
    public readonly AdditionalDocumentFileType $documentType;

    #[SerializedPath('[api:fileData]')]
    public readonly Base64 $documentContent;

    public function __construct(
        AdditionalDocumentFileType $documentType,
        Base64 $documentContent,
    ) {
        $this->documentType    = $documentType;
        $this->documentContent = $documentContent;
    }
}
