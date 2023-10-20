<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\Document\Struct;

enum LoanApplicationBankVerificationStatus: int
{
    case SUCCESS = 1;

    case IN_PROGRESS = 0;

    case ERROR_IN_DOCUMENTS = 2;

    case ERROR_IN_LOAN_AGREEMENT = 3;

    case ERROR_IN_LOAN_AGREEMENT_CANCELED_OR_BANK_REFUSAL = 4;
}
