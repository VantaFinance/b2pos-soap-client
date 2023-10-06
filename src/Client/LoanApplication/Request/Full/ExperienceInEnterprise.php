<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\Full;

enum ExperienceInEnterprise: int
{
    case UP_TO_1_YEARS = 1;

    case FROM_1_TO_3_YEARS = 2;

    case MORE_THAN_3_YEARS = 3;
}
