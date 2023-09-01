<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient;

use Symfony\Component\Serializer\Exception\UnexpectedValueException;
use Vanta\Integration\B2posSoapClient\Client\LoanProduct\Request\ChooseLoanProductRequest;
use Vanta\Integration\B2posSoapClient\Client\LoanProduct\Request\GetAvailableLoanProductsRequest;
use Vanta\Integration\B2posSoapClient\Client\LoanProduct\Response\Bank;
use Vanta\Integration\B2posSoapClient\Client\LoanProduct\Response\ChooseLoanProductResponse;

interface LoanProductClient
{
    /**
     * @return array<int, Bank>
     * @throws B2PosSoapClientException
     * @throws UnexpectedValueException
     */
    public function getAvailableLoanProducts(GetAvailableLoanProductsRequest $request): array;

    /**
     * @throws B2PosSoapClientException
     * @throws UnexpectedValueException
     */
    public function chooseLoanProduct(ChooseLoanProductRequest $request): ChooseLoanProductResponse;
}
