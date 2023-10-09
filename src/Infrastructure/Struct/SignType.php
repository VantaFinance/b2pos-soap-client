<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\Struct;

enum SignType: int
{
    case PAPER = 0;

    case SIMPLE_ELECTRONIC_SIGNATURE = 1;

    case SIMPLE_ELECTRONIC_SIGNATURE_REPEATED = 2;
}
