<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Full;

enum Education: int
{
    case PRIMARY_OR_INCOMPLETE_SECONDARY = 1;

    case SECONDARY = 2;

    case SECONDARY_OR_SPECIAL = 3;

    case INCOMPLETE_HIGHER = 4;

    case HIGHER = 5;

    case TWO_OR_MORE_HIGHER = 6;

    case ACADEMIC_DEGREE = 7;
}
