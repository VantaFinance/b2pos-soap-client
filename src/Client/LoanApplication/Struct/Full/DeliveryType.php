<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Full;

enum DeliveryType: int
{
    case SELF_PICKUP = 1;

    case COURIER = 2;
}
