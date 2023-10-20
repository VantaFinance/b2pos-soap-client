<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\Document\Struct;

enum DocumentVerificationStatus: int
{
    case SUCCESS = 1;

    case IN_PROGRESS = 0;

    case ERROR = 2;
}
