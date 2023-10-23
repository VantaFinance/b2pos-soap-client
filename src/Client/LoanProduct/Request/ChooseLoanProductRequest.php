<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanProduct\Request;

use Symfony\Component\Serializer\Annotation\SerializedPath;
use Vanta\Integration\B2posSoapClient\Infrastructure\Struct\SignType;

final class ChooseLoanProductRequest
{
    /**
     * @var numeric-string
     */
    #[SerializedPath('[soapenv:Body][api:AcceptOptyRequest][api:profileID]')]
    public readonly string $profileId;

    /**
     * @var numeric-string
     */
    #[SerializedPath('[soapenv:Body][api:AcceptOptyRequest][api:acceptBank]')]
    public readonly string $bankId;

    #[SerializedPath('[soapenv:Body][api:AcceptOptyRequest][api:signType]')]
    public readonly SignType $signType;

    /**
     * @var non-empty-string|null
     */
    #[SerializedPath('[soapenv:Body][api:AcceptOptyRequest][api:acceptVariant]')]
    public readonly ?string $chooseLoanProduct;

    /**
     * @param numeric-string        $profileId
     * @param numeric-string        $bankId
     * @param non-empty-string|null $chooseLoanProduct
     */
    public function __construct(
        string $profileId,
        string $bankId,
        SignType $signType,
        ?string $chooseLoanProduct = null,
    ) {
        $this->profileId         = $profileId;
        $this->bankId            = $bankId;
        $this->signType          = $signType;
        $this->chooseLoanProduct = $chooseLoanProduct;
    }
}
