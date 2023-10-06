<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Response;

enum BankDecision: int
{
    case IN_PROCESSING = -1;

    case DENIED = 0;

    case APPROVED = 1;

    case ERROR = 2;

    case REQUIRED_ADDITIONAL_FILLING_OUT = 4;

    case REQUIRED_CORRECTION_DATA_OR_DOCUMENTS = 5;
}
