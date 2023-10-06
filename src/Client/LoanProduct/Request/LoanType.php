<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanProduct\Request;

enum LoanType: int
{
    case LOAN = 1;

    case INSTALLMENT = 2;
}
