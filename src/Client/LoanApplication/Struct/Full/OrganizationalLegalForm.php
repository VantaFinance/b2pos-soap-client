<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Struct\Full;

/**
 * Организационно правовая форма
 */
enum OrganizationalLegalForm: int
{
    case NO_DATA = 0; // нет данных

    case LIMITED_LIABILITY_COMPANY = 2; // ООО (общество с ограниченной ответственностью)

    case CLOSED_JOINT_STOCK_TYPE_COMPANY = 3; // АОЗТ (акционерное общество закрытого типа)

    case ENTREPRENEUR_WITHOUT_LEGAL_ENTITY = 5; // ПБОЮЛ (предприниматель без образования юридического лица)

    case OPEN_JOINT_STOCK_COMPANY = 6; // ОАО (открытое акционерное общество)

    case CLOSED_JOINT_STOCK_COMPANY = 7; // ЗАО (закрытое акционерное общество)

    case LIFE_INSURANCE = 8; // страхование жизни

    case NON_STATE_EDUCATIONAL_INSTITUTION = 9; // НОУ (негосударственное образовательное учреждение)

    case ENTREPRENEUR = 13; // ИП (индивидуальный предприниматель)

    case SELF_EMPLOYED = 14; // ЧП (частный предприниматель)

    case INDIVIDUAL_ENTREPRENEUR = 15; // ФЛ-П (физическое лицо предприниматель)

    case AUTONOMOUS_NON_PROFIT_ORGANIZATION_OF_PRESCHOOL_EDUCATION = 16; // АНО ДО (автономная некоммерческая организация дошкольного образования)

    case MUNICIPAL_HEALTH_CARE_INSTITUTION = 17; // МУЗ (муниципальное учреждение здравоохранения)

    case STATE_EDUCATIONAL_INSTITUTION_OF_HIGHER_PROFESSIONAL_EDUCATION = 18; // ГОУ ВПО (государственное образовательное учреждение высшего профессионального образования)

    case LIMITED_COMPANY = 19; // командитное общество

    case JUDICIAL_INSTANCE = 21; // судебная инстанция

    case JOINT_STOCK_COMPANY_OF_WORKERS_NATIONAL_ENTERPRISE = 22; // АО(акционерное общество) работников народное предприятие

    case JOINT_STOCK_PRODUCTION_AND_COMMERCIAL_PUBLIC_ASSOCIATION = 23; // акционерное производственно коммерческое ОО (общественное объединение)

    case AUTONOMOUS_NON_PROFIT_EDUCATIONAL_ORGANIZATION = 24; // АНОО, автономная некоммерческая образовательная организация

    case ARTEL_OF_MINERS = 25; // артель старателей

    case AUTONOMOUS_NON_PROFIT_ORGANIZATION = 26; // АНО (автономная некоммерческая организация)

    case ASSOCIATION = 27; // ассоциация

    case ASSOCIATION_OF_PEASANT_FARMS = 28; // ассоциация крестьянских хозяйств

    case HEALTH_RESORT_ASSOCIATION = 29; // ассоциация санаторно курортное объединение

    case HOMEOWNERS_ASSOCIATION = 30; // ассоциация товариществ собственников жилья

    case MAIN_DIRECTORATE_OF_THE_FEDERAL_PENITENTIARY_SERVICE = 31; // ГУ ФСИН (главное управление федеральной службы исполнения наказаний)

    case STATE_PUBLIC_SCIENTIFIC_ASSOCIATION = 32; // ГОНО (государственно-общественное научное объединение)

    case STATE_PUBLIC_ENTERPRISE = 33; // государственное казенное предприятие

    case STATE_ENTERPRISE = 34; // ГП (государственное предприятие)

    case GAS_PROCESSING_PLANT = 35; // ГПП (газоперерабатывающее предприятие)

    case STATE_UNITARY_ENTERPRISE = 36; // ГУП (государственное унитарное предприятие)

    case GOVERNMENT_AGENCY = 37; // ГУ (государственное учреждение)

    case LAND_RESOURCES_DEPARTMENT = 38; // департамент земельных ресурсов

    case SUBSIDIARY_OPEN_JOINT_STOCK_COMPANY = 39; // ДОАО (дочернее открытое акционерное общество)

    case HOUSING_CONSTRUCTION_COOPERATIVE = 40; // ЖСК (жилищно-строительный кооператив)

    case GOVERNMENT_ENTERPRISE = 41; // казенное предприятие

    case COLLEGIUM_OF_ADVOCATES = 42; // коллегия адвокатов

    case COLLECTIVE_FARM = 43; // колхоз

    case COMMITTEE_ON_HOUSING_COMMUNAL_SERVICES_AND_PUBLIC_SERVICES = 45; // комитет по ЖКХ(жилищно-коммунальное хозяйство) и обслуживанию населения

    case LIMITED_PARTNERSHIP = 46; // коммандитное товарищество

    case PEASANT_FARMING = 47; // крестьянское фермерское хозяйство

    case MEDICAL_PREVENTIVE_INSTITUTION = 48; // лечебно профилактическое учреждение

    case INTERNATIONAL_CENTER = 49; // международный центр

    case MULTI_INDUSTRY_PRODUCTION_ASSOCIATION = 50; // многоотраслевое производственное объединение

    case SMALL_BUSINESS = 51; // МП (малое предприятие)

    case MUNICIPAL_UNITARY_ENTERPRISE = 52; // МУП (муниципальное унитарное предприятие)

    case MUNICIPAL_INSTITUTION = 53; // МУ (муниципальное учреждение)

    case NON_PROFIT_ORGANIZATION = 54; // некоммерческая организация

    case NON_COMMERCIAL_PARTNERSHIP = 55; // некоммерческое партнерство

    case SEPARATE_DIVISION = 56; // обособленное подразделение

    case SEPARATE_DIVISION_LIMITED_LIABILITY_COMPANIES = 57; // обособленное подразделение ООО (общества с ограниченной ответственностью)

    case EDUCATIONAL_INSTITUTION = 58; // образовательное учреждение

    case ALL_RUSSIAN_SOCIAL_MOVEMENT = 59; // ООД (общероссийское общественное движение)

    case PUBLIC_ORGANIZATION = 60; // общественная организация

    case COMPANY_WITH_ADDITIONAL_LIABILITY = 61; // общество с дополнительной ответственностью

    case PUBLIC_NON_GOVERNMENTAL_ORGANIZATION = 62; // ОНО (общественная неправительственная организация)

    case DEPARTMENT_OF_THE_ORGANIZATION = 63; // отделение организации

    case GENERAL_PARTNERSHIP = 64; // полное товарищество

    case CONSUMER_HOUSING_CONSTRUCTION_COOPERATIVE = 65; // потребительский жилищно-строительный кооператив

    case CONSUMER_SOCIETY = 66; // потребительское общество

    case PRODUCTION_ARTEL_OF_PRODUCERS = 67; // производственная артель старателей

    case PRODUCTION_COMMERCIAL_CLOSED_JOINT_STOCK_COMPANY = 68; // производственно коммерческое АОЗТ (акционерное общество закрытого типа)

    case PRODUCTION_CONSTRUCTION_COOPERATIVE = 69; // производственно строительный кооператив

    case PRODUCTION_COOPERATIVE = 70; // производственный кооператив

    case PRODUCTION_AGRICULTURAL_COOPERATIVE = 71; // производственный сельскохозяйственный кооператив

    case FISHING_ARTEL = 72; // рыболовецкая артель

    case SANATORIUM_RESORT_INSTITUTION = 73; // санаторно курортное учреждение

    case AGRICULTURAL_ARTEL = 74; // сельскохозяйственная артель

    case AGRICULTURAL_COOPERATIVE = 75; // сельскохозяйственный кооператив

    case UNION_OF_CONSUMER_SOCIETIES = 76; // союз потребительских обществ

    case PARTNERSHIP_ON_FAITH = 77; // товарищество на вере

    case PARTNERSHIP_ON_FAITH_LIMITED_PARTNERSHIP = 78; // товарищество на вере коммандитное товарищество

    case PARTNERSHIP_ON_FAITH_OPEN_JOINT_STOCK_COMPANY = 79; // товарищество на вере ОАО (открытое акционерное общество)

    case PARTNERSHIP_HOMEOWNERS_ASSOCIATION = 80; // ТСЖ (товарищество собственников жилья)

    case CHAMBER_OF_COMMERCE_AND_INDUSTRY = 81; // торгово-промышленная палата

    case UNITARY_ENTERPRISE = 82; // УП (унитарное предприятие)

    case INSTITUTION = 83; // учреждение

    case FEDERAL_BUDGETARY_INSTITUTION = 84; // федеральное бюджетное учреждение

    case FEDERAL_STATE_UNITARY_ENTERPRISE = 85; // ФГУП (федеральное государственное унитарное предприятие)

    case FEDERAL_STATE_INSTITUTION = 86; // федеральное государственное учреждение

    case FEDERAL_STATE_ENTERPRISE = 87; // федеральное казенное предприятие

    case FEDERAL_INSTITUTION = 88; // федеральное учреждение

    case BRANCH = 89; // филиал

    case BRANCH_STATE_UNITARY_ENTERPRISE = 90; // филиал ГУП (государственное унитарное предприятие)

    case BRANCH_CLOSED_JOINT_STOCK_COMPANY = 91; // ФИЛИАЛ ЗАО (закрытое акционерное общество)

    case BRANCH_OF_THE_REGIONAL_CONSUMER_SOCIETY = 92; // филиал областного потребительского общества

    case BRANCH_LIMITED_LIABILITY_COMPANY = 93; // филиал ООО (общество с ограниченной ответственностью)

    case BRANCH_OPEN_JOINT_STOCK_COMPANY = 94; // филиал ОАО (открытое акционерное общество)

    case BRANCH_FEDERAL_STATE_UNITARY_ENTERPRISE = 95; // филиал ФГУП (федеральное государственное унитарное предприятие)

    case LIMITED_LIABILITY_FIRM = 96; // фирма с ограниченной ответственностью

    case FUND = 97; // фонд

    case PRIVATE_INSTITUTION = 98; // частное учреждение

    case INSURANCE_COMPANY = 99; // страховая компания
}
