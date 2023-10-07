<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Full;

enum Industry: int
{
    case MILITARY_ESTABLISHMENT = 1;

    case EXTRACTIVE_INDUSTRY_EXEPECT_FEC = 2;

    case PUBLIC_HEALTH = 3;

    case PRIVATE_HEALTH = 4;

    case PUBLISHING = 5;

    case INFORMATICS_AND_TELECOMMUNICATIONS = 6;

    case UTILITIES_SERVICES_ROAD_SERVICES = 7;

    case LIGHT_AND_FOOD_INDUSTRY = 8;

    case MECHANICAL_ENGINEERING_AND_METALWORKING = 9;

    case SCIENCE_AND_CULTURE = 10;

    case PUBLIC_EDUCATION = 11;

    case PRIVATE_EDUCATION = 12;

    case CATERING = 13;

    case LAW_ENFORCEMENT = 14;

    case ADVERTISING_PR_AGENCIES_MEDIA = 15;

    case RESTAURANTS = 16;

    case BEAUTY_AND_HEALTH_SALONS = 17;

    case ASSEMBLY_PRODUCTION = 18;

    case AGRICULTURE = 19;

    case CONSTRUCTION_PRODUCTION_OF_BUILDING_MATERIALS = 20;

    case WHOLESALE_TRADE = 21;

    case RETAIL_TRADE = 22;

    case TRANSPORT_AND_COMMUNICATIONS = 23;

    case TOURISM = 24;

    case FEC = 25;

    case SHOW_BUSINESS = 26;

    case FEDERAL_AND_MUNICIPAL_CONTROL = 27;

    case FINANCE_BANKING = 28;

    case CHEMISTRY_PERFUMERY_PHARMACEUTICALS = 29;

    case PRIVATE_DETECTIVE_SECURITY_COMPANY = 30;

    case LEGAL_AND_NOTARIAL_SERVICES = 31;

    case OTHER = 32;
}