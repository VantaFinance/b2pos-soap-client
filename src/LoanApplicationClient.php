<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient;

use Psr\Http\Client\ClientExceptionInterface as ClientException;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\Full\CancelLoanApplicationRequest;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\Full\NewLoanApplicationRequest as NewLoanApplicationRequestFull;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\Short\NewLoanApplicationRequest as NewLoanApplicationRequestShort;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Response\Full\CancelLoanApplicationResponse;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Response\GetLoanApplicationStatusResponse;

interface LoanApplicationClient
{
    /**
     * @return numeric-string
     * @throws ClientException
     */
    public function newLoanApplicationShort(NewLoanApplicationRequestShort $request): string;

    /**
     * @return numeric-string
     * @throws ClientException
     */
    public function newLoanApplicationFull(NewLoanApplicationRequestFull $request): string;

    /**
     * @param  numeric-string  $loanApplicationId
     * @throws ClientException
     */
    public function getLoanApplicationStatus(string $loanApplicationId): GetLoanApplicationStatusResponse;

    /**
     * @throws ClientException
     */
    public function cancelLoanApplicationFull(CancelLoanApplicationRequest $request): CancelLoanApplicationResponse;
}
