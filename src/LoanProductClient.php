<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient;

use Psr\Http\Client\ClientExceptionInterface as ClientException;
use Vanta\Integration\B2posSoapClient\Client\LoanProduct\Request\ChooseLoanProductRequest;
use Vanta\Integration\B2posSoapClient\Client\LoanProduct\Request\GetAvailableLoanProductsRequest;
use Vanta\Integration\B2posSoapClient\Client\LoanProduct\Response\Bank;
use Vanta\Integration\B2posSoapClient\Client\LoanProduct\Response\ChooseLoanProductResponse;

interface LoanProductClient
{
    /**
     * @return non-empty-array<int, Bank>|null
     * @throws ClientException
     */
    public function getAvailableLoanProducts(GetAvailableLoanProductsRequest $request): ?array;

    /**
     * @throws ClientException
     */
    public function chooseLoanProduct(ChooseLoanProductRequest $request): ChooseLoanProductResponse;
}
