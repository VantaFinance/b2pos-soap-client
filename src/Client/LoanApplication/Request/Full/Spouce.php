<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\Full;

use DateTimeImmutable;
use Symfony\Component\Serializer\Annotation\Context;
use Symfony\Component\Serializer\Annotation\SerializedPath;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Full\Occupation;

final class Spouce
{
    /**
     * @var non-empty-string
     */
    #[SerializedPath('[api:lastName]')]
    public readonly string $lastname;

    /**
     * @var non-empty-string
     */
    #[SerializedPath('[api:firstName]')]
    public readonly string $firstname;

    /**
     * @var non-empty-string
     */
    #[SerializedPath('[api:surName]')]
    public readonly string $secondname;

    #[SerializedPath('[api:occupation]')]
    public readonly Occupation $occupation;

    /**
     * @var non-empty-string
     */
    #[SerializedPath('[api:workName]')]
    public readonly string $workName;

    #[Context(
        normalizationContext: [
            DateTimeNormalizer::FORMAT_KEY => 'd.m.Y',
        ],
    )]
    #[SerializedPath('[api:birthDate]')]
    public readonly DateTimeImmutable $birthAt;

    /**
     * @param non-empty-string $lastname
     * @param non-empty-string $firstname
     * @param non-empty-string $secondname
     * @param non-empty-string $workName
     */
    public function __construct(
        string $lastname,
        string $firstname,
        string $secondname,
        Occupation $occupation,
        string $workName,
        DateTimeImmutable $birthAt,
    ) {
        $this->lastname   = $lastname;
        $this->firstname  = $firstname;
        $this->secondname = $secondname;
        $this->occupation = $occupation;
        $this->workName   = $workName;
        $this->birthAt    = $birthAt;
    }
}
