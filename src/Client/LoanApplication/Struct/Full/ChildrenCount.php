<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Full;

enum ChildrenCount: int
{
    case ZERO = 1;

    case ONE = 2;

    case TWO = 3;

    case THREE = 4;

    case THREE_OR_MORE = 5;
}
