<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Full;

enum ForeignCapitalEnterpriceStatus: int
{
    case WITH_FOREIGN_CAPITAL = 1;

    case WITHOUT_FOREIGN_CAPITAL = 2;
}
