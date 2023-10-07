<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanProduct\Struct;

enum AdditionalDocumentFileType: string
{
    case PRODUCT_SPECIFICATION = 'SPECIFICATION';

    case REMINDER_ON_REGISTRATION = 'MEMO';
}
