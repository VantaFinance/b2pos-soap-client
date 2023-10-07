<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient;

use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\Full\NewLoanApplicationRequest as NewLoanApplicationRequestFull;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\GetLoanApplicationStatusRequest;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\Short\NewLoanApplicationRequest as NewLoanApplicationRequestShort;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Response\GetLoanApplicationStatusResponse;

interface LoanApplicationClient
{
    /**
     * @return numeric-string
     * @throws B2PosSoapClientException
     */
    public function newLoanApplicationShort(NewLoanApplicationRequestShort $request): string;

    /**
     * @return numeric-string
     * @throws B2PosSoapClientException
     */
    public function newLoanApplicationFull(NewLoanApplicationRequestFull $request): string;

    /**
     * @throws B2PosSoapClientException
     */
    public function getLoanApplicationStatus(GetLoanApplicationStatusRequest $request): GetLoanApplicationStatusResponse;
}
