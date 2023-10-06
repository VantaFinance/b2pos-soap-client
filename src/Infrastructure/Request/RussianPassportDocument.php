<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Infrastructure\Request;

final class RussianPassportDocument
{
    public function __construct(
        public readonly RussianPassportSeries $series,
        public readonly RussianPassportNumber $number,
    ) {
    }
}
