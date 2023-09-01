<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanProduct\Response;

enum AdditionalDocumentFileType: string
{
    case PRODUCT_SPECIFICATION = 'SPECIFICATION';

    case REMINDER_ON_REGISTRATION = 'MEMO';
}
