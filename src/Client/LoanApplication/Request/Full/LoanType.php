<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\Full;

enum LoanType: int
{
    case LOAN = 1;

    case INSTALLMENT = 2;
}
