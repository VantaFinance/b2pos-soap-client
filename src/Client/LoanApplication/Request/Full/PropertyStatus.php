<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\Full;

enum PropertyStatus: int
{
    case OWNERSHIP = 174001;

    case RENTING = 174002;

    case LIVING_WITH_RELATIVES_OR_FRIENDS = 174003;

    case PRIVATIZATION_OR_MUNICIPAL_PROPERTY = 174004;

    case OTHER = 174005;
}
