<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\Full;

use Brick\PhoneNumber\PhoneNumber;
use Symfony\Component\Serializer\Annotation\SerializedPath;

final class Contact
{
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

    /**
     * @var non-empty-string
     */
    #[SerializedPath('[api:lastName]')]
    public readonly string $lastname;

    #[SerializedPath('[api:mobilePhone]')]
    public readonly PhoneNumber $phoneNumber;

    /**
     * @param non-empty-string $firstname
     * @param non-empty-string $secondname
     * @param non-empty-string $lastname
     */
    public function __construct(
        string $firstname,
        string $secondname,
        string $lastname,
        PhoneNumber $phoneNumber,
    ) {
        $this->firstname   = $firstname;
        $this->secondname  = $secondname;
        $this->lastname    = $lastname;
        $this->phoneNumber = $phoneNumber;
    }
}
