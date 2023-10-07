<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanAgreement\Request;

use Symfony\Component\Serializer\Annotation\SerializedPath;
use Vanta\Integration\B2posSoapClient\Infrastructure\Struct\Base64;

final class Document
{
    /**
     * @var non-empty-string
     */
    #[SerializedPath('[api:fileName]')]
    public readonly string $fileName;

    /**
     * @var non-empty-string
     */
    #[SerializedPath('[api:fileExt]')]
    public readonly string $fileExtension;

    /**
     * @var non-empty-string
     */
    #[SerializedPath('[api:fileType]')]
    public readonly string $fileType;

    #[SerializedPath('[api:fileData]')]
    public readonly Base64 $fileContent;

    /**
     * @param non-empty-string $fileName
     * @param non-empty-string $fileExtension
     * @param non-empty-string $fileType
     */
    public function __construct(
        string $fileName,
        string $fileExtension,
        string $fileType,
        Base64 $fileContent,
    ) {
        $this->fileName      = $fileName;
        $this->fileExtension = $fileExtension;
        $this->fileType      = $fileType;
        $this->fileContent   = $fileContent;
    }
}
