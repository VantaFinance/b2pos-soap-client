<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Full;

enum StateOwnedEnterpriceStatus: int
{
    case STATE_OWNED = 1;

    case NOT_STATE_OWNED = 2;
}
