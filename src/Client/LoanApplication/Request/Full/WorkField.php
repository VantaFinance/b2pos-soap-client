<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\Full;

enum WorkField: int
{
    case PARTICIPATION_IN_CORE_ACTIVITIES = 1;

    case ACCOUNTING_FINANCE_PLANNING = 2;

    case IT = 3;

    case SUPPORT_AND_TECHNICAL_STAFF = 4;

    case ADVERTISING_AND_MARKETING = 5;

    case ADMINISTRATIVE_ECONOMIC_AND_TRANSPORT_SERVICE = 6;

    case SUPPLY_AND_SALES = 7;

    case HR_DEPARTMENT_AND_SECRETARIAT = 8;

    case LEGAL_SERVICE = 9;

    case SECURITY_SERVICE = 10;
}
