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
     * @throws B2PosSoapClientException
     *
     * @return numeric-string
     */
    public function newLoanApplicationShort(NewLoanApplicationRequestShort $request): string;

    /**
     * @throws B2PosSoapClientException
     *
     * @return numeric-string
     */
    public function newLoanApplicationFull(NewLoanApplicationRequestFull $request): string;

    /**
     * @param numeric-string $profileId
     *
     * @throws B2PosSoapClientException
     */
    public function getLoanApplicationStatus(string $profileId): GetLoanApplicationStatusResponse;
}
