<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\Full;

enum WorkPosition: int
{
    case GENERAL_MANAGER = 1; // Рук./ Зам. рук. организации

    case MANAGER = 2; // Рук./ Зам. рук. подразделения

    case WORKER = 3; // Неруководящий работник

    case INDIVIDUAL_ENTREPRENEUR = 4; // Индивидуальный предприниматель
}
