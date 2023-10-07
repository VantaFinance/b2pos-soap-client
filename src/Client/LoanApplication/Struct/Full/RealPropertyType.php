<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Full;

enum RealPropertyType: string
{
    case HOME = 'HOME';

    case FLAT = 'FLAT';

    case VILLA = 'VILLA';

    case ESTATE = 'ESTATE';

    case GARAGE = 'GARAGE';

    case VEHICLE = 'VEHICLE';
}
