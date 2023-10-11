<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\Struct;

enum SignType: int
{
    case PAPER = 0;

    case SES = 1; // Simple Electronic Signature

    case SES_REPEATED = 2;
}
