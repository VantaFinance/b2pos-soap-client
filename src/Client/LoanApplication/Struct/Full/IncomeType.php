<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Full;

enum IncomeType: string
{
    case SALARY = 'SALARY';

    case BUSINESS = 'BUSINESS';

    case RENT = 'RENT';

    case STUDENT = 'STUDENT';

    case PENSION = 'PENSION';

    case OTHER = 'OTHER';
}
