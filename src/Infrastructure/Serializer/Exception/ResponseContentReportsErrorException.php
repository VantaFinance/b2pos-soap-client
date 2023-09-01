<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\Exception;

use Vanta\Integration\B2posSoapClient\B2PosSoapClientException;

final class ResponseContentReportsErrorException extends B2PosSoapClientException
{
    // @todo исправить, если окажется что будет массив ошибок

    public readonly ?string $errorCode;

    public readonly ?string $errorDescription;

    /**
     * @var array<string, mixed>
     */
    public readonly array $responseData;

    /**
     * @param array<string, mixed> $responseData
     */
    protected function __construct(
        ?string $errorCode,
        ?string $errorDescription,
        array $responseData,
    ) {
        $this->errorCode        = $errorCode;
        $this->errorDescription = $errorDescription;
        $this->responseData     = $responseData;

        parent::__construct('Response reports an error in one of [ns1:error] fields');
    }

    /**
     * @param array<string, mixed> $responseData
     */
    public static function create(?string $errorCode, ?string $errorDescription, array $responseData): self
    {
        return new self($errorCode, $errorDescription, $responseData);
    }
}
