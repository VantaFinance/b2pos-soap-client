<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\Full;

use Brick\PhoneNumber\PhoneNumber;
use Brick\PhoneNumber\PhoneNumberType;
use DateTimeImmutable;
use Symfony\Component\Serializer\Annotation\Context;
use Symfony\Component\Serializer\Annotation\SerializedPath;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Full\AdditionalService;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Full\ChildrenCount;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Full\CommercialEnterpriceStatus;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Full\DeliveryType;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Full\DocumentType;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Full\Education;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Full\ExperienceInEnterprise;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Full\ExperienceInWorkField;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Full\FamilyStatus;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Full\ForeignCapitalEnterpriceStatus;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Full\Gender;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Full\IncomeType;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Full\Industry;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Full\LoanType;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Full\OrganizationalLegalForm;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Full\RealPropertyType;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Full\StateOwnedEnterpriceStatus;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Full\WorkField;
use Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Full\WorkPosition;
use Vanta\Integration\B2posSoapClient\Infrastructure\Serializer\PhoneNumberNormalizer;
use Vanta\Integration\B2posSoapClient\Infrastructure\Struct\Base64;
use Vanta\Integration\B2posSoapClient\Infrastructure\Struct\DivisionCode;
use Vanta\Integration\B2posSoapClient\Infrastructure\Struct\Email;
use Vanta\Integration\B2posSoapClient\Infrastructure\Struct\MoneyPositiveOrZero;
use Vanta\Integration\B2posSoapClient\Infrastructure\Struct\RussianPassportNumber;
use Vanta\Integration\B2posSoapClient\Infrastructure\Struct\RussianPassportSeries;

final class NewLoanApplicationRequest
{
    /**
     * @var non-empty-array<int, SelectedBank>
     */
    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:selectedBanks][api:bank]')]
    public readonly array $selectedBanks;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:firstPayment]')]
    public readonly MoneyPositiveOrZero $firstPaymentAmount;

    /**
     * @var positive-int
     */
    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:duration]')]
    public readonly int $loanPeriodInMonths;

    /**
     * @var non-empty-string
     */
    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:lastName]')]
    public readonly string $lastname;

    /**
     * @var non-empty-string
     */
    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:firstName]')]
    public readonly string $firstname;

    /**
     * @var non-empty-string
     */
    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:surName]')]
    public readonly string $secondname;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:sex]')]
    public readonly Gender $gender;

    /**
     * @var non-empty-string
     */
    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:birthPlace]')]
    public readonly string $birthPlace;

    #[Context(
        normalizationContext: [
            DateTimeNormalizer::FORMAT_KEY => 'd.m.Y',
        ],
    )]
    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:birthDate]')]
    public readonly DateTimeImmutable $birthAt;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:educationID]')]
    public readonly Education $education;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:familyStatus]')]
    public readonly FamilyStatus $familyStatus;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:childrens]')]
    public readonly ChildrenCount $childrenCount;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:docSerial]')]
    public readonly RussianPassportSeries $passportSeries;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:docNumber]')]
    public readonly RussianPassportNumber $passportNumber;

    /**
     * @var non-empty-string
     */
    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:docIssuirer]')]
    public readonly string $passportIssuedBy;

    #[Context(
        normalizationContext: [
            DateTimeNormalizer::FORMAT_KEY => 'd.m.Y',
        ],
    )]
    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:docDate]')]
    public readonly DateTimeImmutable $passportIssuedAt;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:docCode]')]
    public readonly DivisionCode $passportDivisionCode;

    #[Context(context: [PhoneNumberNormalizer::PHONE_NUMBER_TYPE => PhoneNumberType::MOBILE])]
    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:homePhone]')]
    public readonly PhoneNumber $phoneNumberHome;

    #[Context(context: [PhoneNumberNormalizer::PHONE_NUMBER_TYPE => PhoneNumberType::MOBILE])]
    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:mobilePhone]')]
    public readonly PhoneNumber $phoneNumberMobile;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:contactPerson]')]
    public readonly Contact $contact;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:regAddress]')]
    public readonly RegisterAddress $registrationAddress;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:postMatch]')]
    public readonly bool $factualAddressSame;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:priceMonth]')]
    public readonly MoneyPositiveOrZero $monthIncome;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:otherIncome]')]
    public readonly MoneyPositiveOrZero $additionalIncome;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:priceFamily]')]
    public readonly MoneyPositiveOrZero $familyMonthIncome;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:isSalary]')]
    public readonly bool $isSalary;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:isBusiness]')]
    public readonly bool $isBusiness;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:isRent]')]
    public readonly bool $isRent;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:isStudent]')]
    public readonly bool $isStudent;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:isPension]')]
    public readonly bool $isPension;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:isOtherPrice]')]
    public readonly bool $isOtherIncome;

    /**
     * @var non-empty-string
     */
    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:codeWord]')]
    public readonly string $codeWord;

    /**
     * @var non-empty-array<int, BasketProduct>
     */
    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:goodsProperty][api:good]')]
    public readonly array $basketProducts;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:isHome]')]
    public readonly ?bool $isHome;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:isFlat]')]
    public readonly ?bool $isFlat;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:isVilla]')]
    public readonly ?bool $isVilla;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:isEstate]')]
    public readonly ?bool $isEstate;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:isGarage]')]
    public readonly ?bool $isGarage;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:isVehicle]')]
    public readonly ?bool $isVehicle;

    /**
     * @var non-empty-string|null
     */
    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:nameChangedOld]')]
    public readonly ?string $oldLastName;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:nameChanged]')]
    public readonly ?bool $lastNameChanged;

    /**
     * @var int<0, 6>|null
     */
    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:dependents]')]
    public readonly ?int $dependentCount;

    /**
     * @var array<int, AdditionalService>
     */
    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:selectedServices][api:service][api:id]')]
    public readonly array $selectedAdditionalServices;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:photo]')]
    public readonly ?Base64 $clientPhoto;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:calculatorType]')]
    public readonly ?LoanType $loanType;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:spouce]')]
    public readonly ?Spouce $spouce;

    #[Context(context: [PhoneNumberNormalizer::PHONE_NUMBER_TYPE => PhoneNumberType::MOBILE])]
    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:workPhone]')]
    public readonly ?PhoneNumber $phoneNumberWork;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:email]')]
    public readonly ?Email $email;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:postAddress]')]
    public readonly ?FactualAddress $factualAddress;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:pensioner]')]
    public readonly ?bool $isPensioner;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:workType]')]
    public readonly ?OrganizationalLegalForm $workOrganizationalLegalForm;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:workName]')]
    public readonly ?string $workName;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:workBranch]')]
    public readonly ?Industry $workIndustry;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:workType1]')]
    public readonly ?StateOwnedEnterpriceStatus $stateOwnedEnterprise;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:workType2]')]
    public readonly ?CommercialEnterpriceStatus $commercialEnterprise;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:workType3]')]
    public readonly ?ForeignCapitalEnterpriceStatus $foreignCapitalEnterprise;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:workField]')]
    public readonly ?WorkField $workField;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:workPosition]')]
    public readonly ?WorkPosition $workPosition;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:workFieldTime]')]
    public readonly ?ExperienceInWorkField $experienceInWorkField;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:workTime]')]
    public readonly ?ExperienceInEnterprise $experienceInEnterprise;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:workAddress]')]
    public readonly ?WorkAddress $workAddress;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:additionalDoc]')]
    public readonly ?DocumentType $additionalDocumentType;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:additionalDocName]')]
    public readonly ?string $documentDetails;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:carProperty]')]
    public readonly ?Vehicle $vehicle;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:passport_main]')]
    public readonly ?Base64 $passportMainPage;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:passport_reg]')]
    public readonly ?Base64 $passportRegister;

    /**
     * @var non-empty-string|null
     */
    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:orderID]')]
    public readonly ?string $orderIdInShop;

    /**
     * @var numeric-string|null
     */
    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:tradeID]')]
    public readonly ?string $pointOfSaleId;

    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:deliveryType]')]
    public readonly ?DeliveryType $deliveryType;

    /**
     * @var numeric-string|null
     */
    #[SerializedPath('[soapenv:Body][api:CreateOptyRequest][api:oldProfileID]')]
    public readonly ?string $previousProfileId;

    /**
     * @param non-empty-array<int, SelectedBank>  $selectedBanks
     * @param positive-int                        $loanPeriodInMonths
     * @param non-empty-string                    $lastname
     * @param non-empty-string                    $firstname
     * @param non-empty-string                    $secondname
     * @param non-empty-string                    $birthPlace
     * @param non-empty-string                    $passportIssuedBy
     * @param non-empty-string                    $codeWord
     * @param non-empty-array<int, BasketProduct> $basketProducts
     * @param non-empty-string|null               $oldLastName
     * @param int<0, 6>|null                      $dependentCount
     * @param array<int, AdditionalService>       $selectedAdditionalServices
     * @param non-empty-string|null               $workName
     * @param non-empty-string|null               $documentDetails
     * @param non-empty-string|null               $orderIdInShop
     * @param numeric-string|null                 $pointOfSaleId
     * @param numeric-string|null                 $previousProfileId
     */
    public function __construct(
        array $selectedBanks,
        MoneyPositiveOrZero $firstPaymentAmount,
        int $loanPeriodInMonths,
        string $lastname,
        string $firstname,
        string $secondname,
        Gender $gender,
        string $birthPlace,
        DateTimeImmutable $birthAt,
        Education $education,
        FamilyStatus $familyStatus,
        ChildrenCount $childrenCount,
        RussianPassportSeries $passportSeries,
        RussianPassportNumber $passportNumber,
        string $passportIssuedBy,
        DateTimeImmutable $passportIssuedAt,
        DivisionCode $passportDivisionCode,
        PhoneNumber $phoneNumberHome,
        PhoneNumber $phoneNumberMobile,
        Contact $contact,
        RegisterAddress $registrationAddress,
        MoneyPositiveOrZero $monthIncome,
        MoneyPositiveOrZero $additionalIncome,
        MoneyPositiveOrZero $familyMonthIncome,
        IncomeType $incomeType,
        string $codeWord,
        array $basketProducts,
        ?RealPropertyType $realPropertyType = null,
        ?string $oldLastName = null,
        ?int $dependentCount = null,
        array $selectedAdditionalServices = [],
        ?Base64 $clientPhoto = null,
        ?LoanType $loanType = null,
        ?Spouce $spouce = null,
        ?PhoneNumber $phoneNumberWork = null,
        ?Email $email = null,
        ?FactualAddress $factualAddress = null,
        ?bool $isPensioner = null,
        ?OrganizationalLegalForm $workOrganizationalLegalForm = null,
        ?string $workName = null,
        ?Industry $workIndustry = null,
        ?StateOwnedEnterpriceStatus $stateOwnedEnterprise = null,
        ?CommercialEnterpriceStatus $commercialEnterprise = null,
        ?ForeignCapitalEnterpriceStatus $foreignCapitalEnterprise = null,
        ?WorkField $workField = null,
        ?WorkPosition $workPosition = null,
        ?ExperienceInWorkField $experienceInWorkField = null,
        ?ExperienceInEnterprise $experienceInEnterprise = null,
        ?WorkAddress $workAddress = null,
        ?DocumentType $additionalDocumentType = null,
        ?string $documentDetails = null,
        ?Vehicle $vehicle = null,
        ?Base64 $passportMainPage = null,
        ?Base64 $passportRegister = null,
        ?string $orderIdInShop = null,
        ?string $pointOfSaleId = null,
        ?DeliveryType $deliveryType = null,
        ?string $previousProfileId = null,
    ) {
        $this->selectedBanks        = $selectedBanks;
        $this->firstPaymentAmount   = $firstPaymentAmount;
        $this->loanPeriodInMonths   = $loanPeriodInMonths;
        $this->lastname             = $lastname;
        $this->firstname            = $firstname;
        $this->secondname           = $secondname;
        $this->gender               = $gender;
        $this->birthPlace           = $birthPlace;
        $this->birthAt              = $birthAt;
        $this->education            = $education;
        $this->familyStatus         = $familyStatus;
        $this->childrenCount        = $childrenCount;
        $this->passportSeries       = $passportSeries;
        $this->passportNumber       = $passportNumber;
        $this->passportIssuedBy     = $passportIssuedBy;
        $this->passportIssuedAt     = $passportIssuedAt;
        $this->passportDivisionCode = $passportDivisionCode;
        $this->phoneNumberHome      = $phoneNumberHome;
        $this->phoneNumberMobile    = $phoneNumberMobile;
        $this->contact              = $contact;
        $this->registrationAddress  = $registrationAddress;
        $this->factualAddressSame   = null === $factualAddress || $registrationAddress->isEqual($factualAddress);
        $this->monthIncome          = $monthIncome;
        $this->additionalIncome     = $additionalIncome;
        $this->familyMonthIncome    = $familyMonthIncome;
        $this->isSalary             = IncomeType::SALARY == $incomeType;
        $this->isBusiness           = IncomeType::BUSINESS == $incomeType;
        $this->isRent               = IncomeType::RENT == $incomeType;
        $this->isStudent            = IncomeType::STUDENT == $incomeType;
        $this->isPension            = IncomeType::PENSION == $incomeType;
        $this->isOtherIncome        = IncomeType::OTHER == $incomeType;
        $this->codeWord             = $codeWord;
        $this->basketProducts       = $basketProducts;
        if (null !== $realPropertyType) {
            $this->isHome    = RealPropertyType::HOME->value == $realPropertyType->value;
            $this->isFlat    = RealPropertyType::FLAT->value == $realPropertyType->value;
            $this->isVilla   = RealPropertyType::VILLA->value == $realPropertyType->value;
            $this->isEstate  = RealPropertyType::ESTATE->value == $realPropertyType->value;
            $this->isGarage  = RealPropertyType::GARAGE->value == $realPropertyType->value;
            $this->isVehicle = RealPropertyType::VEHICLE->value == $realPropertyType->value;
        } else {
            $this->isHome    = null;
            $this->isFlat    = null;
            $this->isVilla   = null;
            $this->isEstate  = null;
            $this->isGarage  = null;
            $this->isVehicle = null;
        }
        $this->oldLastName                 = $oldLastName;
        $this->lastNameChanged             = null !== $oldLastName && $lastname !== $oldLastName;
        $this->dependentCount              = $dependentCount;
        $this->selectedAdditionalServices  = $selectedAdditionalServices;
        $this->clientPhoto                 = $clientPhoto;
        $this->loanType                    = $loanType;
        $this->spouce                      = $spouce;
        $this->phoneNumberWork             = $phoneNumberWork;
        $this->email                       = $email;
        $this->factualAddress              = $factualAddress;
        $this->isPensioner                 = $isPensioner;
        $this->workOrganizationalLegalForm = $workOrganizationalLegalForm;
        $this->workName                    = $workName;
        $this->workIndustry                = $workIndustry;
        $this->stateOwnedEnterprise        = $stateOwnedEnterprise;
        $this->commercialEnterprise        = $commercialEnterprise;
        $this->foreignCapitalEnterprise    = $foreignCapitalEnterprise;
        $this->workField                   = $workField;
        $this->workPosition                = $workPosition;
        $this->experienceInWorkField       = $experienceInWorkField;
        $this->experienceInEnterprise      = $experienceInEnterprise;
        $this->workAddress                 = $workAddress;
        $this->additionalDocumentType      = $additionalDocumentType;
        $this->documentDetails             = $documentDetails;
        $this->vehicle                     = $vehicle;
        $this->passportMainPage            = $passportMainPage;
        $this->passportRegister            = $passportRegister;
        $this->orderIdInShop               = $orderIdInShop;
        $this->pointOfSaleId               = $pointOfSaleId;
        $this->deliveryType                = $deliveryType;
        $this->previousProfileId           = $previousProfileId;
    }
}
