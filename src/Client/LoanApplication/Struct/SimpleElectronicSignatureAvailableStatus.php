<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct;

enum SimpleElectronicSignatureAvailableStatus: int
{
    case NOT_AVAILABLE = 0;

    case AVAILABLE = 1;

    // @todo выяснить откуда 2, в доке нет

    case TODO = 2;
}
