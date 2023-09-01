<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanProduct\Request;

enum SignType: int
{
    case PAPER = 0;

    case SIMPLE_ELECTRONIC_SIGNATURE = 1;

    // @todo выяснить что за 2

    case TODO = 2;
}
