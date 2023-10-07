<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\Short;

use Brick\PhoneNumber\PhoneNumber;
use Brick\PhoneNumber\PhoneNumberType;
use Symfony\Component\Serializer\Annotation\Context;
use Symfony\Component\Serializer\Annotation\SerializedPath;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Short\LoanType;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\PhoneNumberNormalizer;
use Vanta\Integration\B2posSoapClient\Infrastructure\Struct\MoneyPositiveOrZero;
use Vanta\Integration\B2posSoapClient\Infrastructure\Struct\RussianPassportDocument;

final class NewLoanApplicationRequest
{
    /**
     * @var non-empty-string
     */
    #[SerializedPath('[env:Body][ns1:SendShortOptyRequest][ns1:userINN]')]
    public readonly string $userInn;

    /**
     * @var non-empty-string
     */
    #[SerializedPath('[env:Body][ns1:SendShortOptyRequest][ns1:lastName]')]
    public readonly string $lastname;

    /**
     * @var non-empty-string
     */
    #[SerializedPath('[env:Body][ns1:SendShortOptyRequest][ns1:firstName]')]
    public readonly string $firstname;

    /**
     * @var non-empty-string
     */
    #[SerializedPath('[env:Body][ns1:SendShortOptyRequest][ns1:surName]')]
    public readonly string $secondname;

    #[SerializedPath('[env:Body][ns1:SendShortOptyRequest][ns1:mobilePhone]')]
    #[Context(context: [PhoneNumberNormalizer::PHONE_NUMBER_TYPE => PhoneNumberType::MOBILE])]
    public readonly PhoneNumber $phoneNumber;

    #[SerializedPath('[env:Body][ns1:SendShortOptyRequest][ns1:comment]')]
    public readonly string $comment;

    #[SerializedPath('[env:Body][ns1:SendShortOptyRequest][ns1:firstPayment]')]
    public readonly MoneyPositiveOrZero $firstPaymentAmount;

    #[SerializedPath('[env:Body][ns1:SendShortOptyRequest][ns1:passport]')]
    public readonly RussianPassportDocument $russianPassportDocument;

    /**
     * @var positive-int
     */
    #[SerializedPath('[env:Body][ns1:SendShortOptyRequest][ns1:period]')]
    public readonly int $loanPeriodInMonths;

    /**
     * @var non-empty-string
     */
    #[SerializedPath('[env:Body][ns1:SendShortOptyRequest][ns1:requestID]')]
    public readonly string $requestId;

    /**
     * @var numeric-string
     */
    #[SerializedPath('[env:Body][ns1:SendShortOptyRequest][ns1:tradeID]')]
    public readonly string $pointOfSaleId;

    #[SerializedPath('[env:Body][ns1:SendShortOptyRequest][ns1:creditCondition]')]
    public readonly LoanType $loanType;

    /**
     * @var non-empty-array<int, BasketProduct>
     */
    #[SerializedPath('[env:Body][ns1:SendShortOptyRequest][ns1:goodParams][article]')]
    public readonly array $basketProducts;

    /**
     * @param non-empty-string               $userInn
     * @param non-empty-string               $lastname
     * @param non-empty-string               $firstname
     * @param non-empty-string               $secondname
     * @param positive-int                   $loanPeriodInMonths
     * @param non-empty-string               $requestId
     * @param numeric-string                 $pointOfSaleId
     * @param non-empty-array<BasketProduct> $basketProducts
     */
    public function __construct(
        string $userInn,
        string $lastname,
        string $firstname,
        string $secondname,
        PhoneNumber $phoneNumber,
        string $comment,
        MoneyPositiveOrZero $firstPaymentAmount,
        RussianPassportDocument $russianPassportDocument,
        int $loanPeriodInMonths,
        string $requestId,
        string $pointOfSaleId,
        LoanType $loanType,
        array $basketProducts,
    ) {
        $this->userInn                 = $userInn;
        $this->lastname                = $lastname;
        $this->firstname               = $firstname;
        $this->secondname              = $secondname;
        $this->phoneNumber             = $phoneNumber;
        $this->comment                 = $comment;
        $this->firstPaymentAmount      = $firstPaymentAmount;
        $this->russianPassportDocument = $russianPassportDocument;
        $this->loanPeriodInMonths      = $loanPeriodInMonths;
        $this->requestId               = $requestId;
        $this->pointOfSaleId           = $pointOfSaleId;
        $this->loanType                = $loanType;
        $this->basketProducts          = $basketProducts;
    }
}
