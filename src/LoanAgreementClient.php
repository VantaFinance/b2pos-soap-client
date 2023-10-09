<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient;

use Psr\Http\Client\ClientExceptionInterface as ClientException;
use Vanta\Integration\B2posSoapClient\Client\LoanAgreement\Request\AuthorizeLoanAgreementRequest;
use Vanta\Integration\B2posSoapClient\Client\LoanAgreement\Response\AuthorizeLoanAgreementResponse;

interface LoanAgreementClient
{
    /**
     * @throws ClientException
     */
    public function authorizeLoanAgreement(AuthorizeLoanAgreementRequest $request): AuthorizeLoanAgreementResponse;
}
