<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Full;

enum CommercialEnterpriceStatus: int
{
    case COMMERCIAL = 1;

    case NOT_COMMERCIAL = 2;
}
