<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanProduct\Request;

use Symfony\Component\Serializer\Annotation\SerializedPath;

final class ChooseLoanProductRequest
{
    /**
     * @var numeric-string
     */
    #[SerializedPath('[soapenv:Body][api:AcceptOptyRequest][api:profileID]')]
    public readonly string $loanApplicationId;

    /**
     * @var numeric-string
     */
    #[SerializedPath('[soapenv:Body][api:AcceptOptyRequest][api:acceptBank]')]
    public readonly string $chooseBankId;

    #[SerializedPath('[soapenv:Body][api:AcceptOptyRequest][api:signType]')]
    public readonly SignType $signType;

    /**
     * @var non-empty-string|null
     */
    #[SerializedPath('[soapenv:Body][api:AcceptOptyRequest][api:acceptVariant]')]
    public readonly ?string $chooseLoanProduct;

    /**
     * @param numeric-string        $loanApplicationId
     * @param numeric-string        $chooseBankId
     * @param non-empty-string|null $chooseLoanProduct
     */
    public function __construct(
        string $loanApplicationId,
        string $chooseBankId,
        SignType $signType,
        ?string $chooseLoanProduct = null,
    ) {
        $this->loanApplicationId = $loanApplicationId;
        $this->chooseBankId      = $chooseBankId;
        $this->signType          = $signType;
        $this->chooseLoanProduct = $chooseLoanProduct;
    }
}
