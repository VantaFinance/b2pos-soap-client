<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient;

use Exception;
use Psr\Http\Client\ClientExceptionInterface as ClientException;

abstract class B2PosSoapClientException extends Exception implements ClientException
{
}
