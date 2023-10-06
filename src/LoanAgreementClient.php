<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient;

use Symfony\Component\Serializer\Exception\UnexpectedValueException;
use Vanta\Integration\B2posSoapClient\Client\LoanAgreement\Request\AuthorizeLoanAgreementRequest;
use Vanta\Integration\B2posSoapClient\Client\LoanAgreement\Response\AuthorizeLoanAgreementResponse;

interface LoanAgreementClient
{
    /**
     * @throws B2PosSoapClientException
     * @throws UnexpectedValueException
     */
    public function authorizeLoanAgreement(AuthorizeLoanAgreementRequest $request): AuthorizeLoanAgreementResponse;
}
