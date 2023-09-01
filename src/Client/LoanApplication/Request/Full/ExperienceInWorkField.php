<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\Full;

enum ExperienceInWorkField: int
{
    case UP_TO_3_YEARS = 1;

    case FROM_3_TO_5_YEARS = 2;

    case MORE_THAN_5_YEARS = 3;
}
