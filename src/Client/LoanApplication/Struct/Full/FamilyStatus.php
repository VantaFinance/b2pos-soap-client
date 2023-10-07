<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Full;

enum FamilyStatus: int
{
    case MARRIED = 1;

    case SINGLE = 2;

    case DIVORCED = 3;

    case WIDOW = 4;

    case CIVIL_MARRIAGE = 5;
}
