<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\Full;

enum PurchaseType: string
{
    case NEW_ONE = 'PURCHASE_NEW_ONE';

    case SECOND_HAND = 'PURCHASE_SECOND_HAND';

    case GIFT = 'INHERITANCE';
}
