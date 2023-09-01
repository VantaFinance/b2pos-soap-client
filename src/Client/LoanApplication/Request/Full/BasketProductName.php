<?php

declare(strict_types=1);

namespace Vanta\Integration\B2posSoapClient\Client\LoanApplication\Request\Full;

enum BasketProductName: string
{
    case WASHING_MACHINE = 'Стиральная машина';

    case DISHWASHER = 'Посудомоечная машина';

    case FRIDGE_FREEZER = 'Холодильник/морозильная камера';

    case TV = 'Телевизор';

    case VIDEO_AUDIO_CD_DVD_EQUIPMENT = 'Видео/аудио/CD/DVD-техника';

    case GAS_ELECTRIC_STOVE = 'Газовая/электрическая плита';

    case PRODUCTS_FOR_PHOTO_VIDEO_SHOOTING = 'Товары для фото/видео съемки';

    case PLASM_PANEL_HOUSE_CINEMA_TV = 'Плазм. панель/дом. кинотеатр/телевизор';

    case MOBILE_PHONE = 'Мобильный телефон';

    case HOOD = 'Вытяжка';

    case GROUP_A_TECHNIQUE = 'Техника группы А';

    case SET_LIVING_ROOM_CHILDREN_S_ROOM = 'Гарнитур: гостиная, детская';

    case SET_HALLWAY_BUILT_IN_CLOSET = 'Гарнитур: прихожая, встр. шкаф';

    case BEDROOM_SET = 'Спальный гарнитур';

    case SOFA = 'Диван';

    case KITCHEN_SET = 'Кухонный гарнитур';

    case AIR_CONDITIONER = 'Кондиционер';

    case HEATING_DEVICE = 'Обогревательный прибор';

    case SEWING_MACHINE = 'Швейная машинка';

    case LAWNMOWER = 'Газонокосилка';

    case TOOLS_DRILLS_OTHER = 'Инструменты: дрели, другое';

    case WINDOW_GLAZED_UNIT = 'Окно/стеклопакет';

    case DOOR = 'Дверь';

    case DECORATION_MATERIALS = 'Отделочные материалы';

    case FLOOR_COVERINGS = 'Напольные покрытия';

    case WALL_COVERINGS = 'Настенные покрытия';

    case CEILING = 'Потолок';

    case INTERIOR = 'Интерьер';

    case PLUMBING = 'САНТЕХНИКА';

    case COMPUTER_SYSTEM_UNIT_MONITOR = 'Компьютер: системный блок, монитор';

    case LAPTOP = 'Ноутбук';

    case ACCESSORIES = 'Комплектующие';

    case OFFICE_EQUIPMENT_PHOTOCOPIER_FAX = 'Оргтехника: ксерокс, факс';

    case PRINTER_SCANNER_MODEM = 'Принтер, сканер, модем';

    case MATTRESS = 'Матрац';

    case BICYCLES_EXERCISE_BIKES = 'Велосипеды, велотренажеры';

    case TIRES = 'Автошины';

    case ELECTRIC_TOYS = 'Электроигрушки';

    case COT = 'Детская кроватка';

    case PLASTIC_POOL = 'Бассейн пластиковый';

    case ALARM_SYSTEM_FOR_APARTMENTS_SAFE = 'Сигнализация для квартир, сейф';

    case SCOOTER_MOPED = 'Скутер, мопед';

    case HUNTING_FISHING_GOODS = 'Товары для охоты/рыбалки';

    case SPORTS_EQUIPMENT = 'Спорт-инвентарь';

    case BABY_STROLLER_CHAIR = 'Детская коляска, кресло';

    case FUR_AND_LEATHER_PRODUCTS = 'Изделия из меха и кожи';

    case TOURISM = 'Туризм';

    case CHILDREN_S_FURNITURE_ITEMS = 'Предметы детской мебели';

    case DECORATIVE_INTERIOR = 'Декоративный интерьер';

    case ROOFING_MATERIAL = 'Кровельный материал';

    case MUSICAL_INSTRUMENTS = 'Музыкальные инструменты';

    case HEATING_SYSTEMS = 'Отопительные системы';

    case CONSTRUCTION_EQUIPMENT = 'Строительное оборудование';

    case AUTO_PARTS = 'Автозапчасти';

    case AUDIO_VIDEO_SYSTEMS_FOR_CARS = 'Аудио/видео системы для авто';

    case GAS_EQUIPMENT = 'Газобалонное оборудование';

    case VACUUM_CLEANERS = 'ПЫЛЕСОСЫ';

    case TELEPHONES_AND_FAXES = 'ТЕЛЕФОНЫ И ФАКСЫ';

    case OFFICE_FURNITURE = 'ОФИСНАЯ МЕБЕЛЬ';

    case BATHS = 'ВАННЫ';

    case SHOWER_CABINS = 'ДУШЕВЫЕ КАБИНЫ';

    case JEWELRY = 'ЮВЕЛИРНЫЕ ИЗДЕЛИЯ';

    case WRIST_WATCH = 'НАРУЧНЫЕ ЧАСЫ';

    case FOREIGN_LANGUAGE_COURSES = 'КУРСЫ ИНОСТРАННЫХ ЯЗЫКОВ';

    case OTHER_SERVICES = 'ДРУГИЕ УСЛУГИ';

    case CARAVAN = 'Автоприцеп';

    case FUR_PRODUCTS = 'Изделия из меха';

    case LEATHER_PRODUCTS = 'Изделия из кожи';

    case BLENDER = 'БЛЕНДЕР';

    case PANCAKE_MAKER = 'БЛИННИЦА';

    case BOILER = 'БОЙЛЕР';

    case PAPER = 'БУМАГА';

    case HOUSEHOLD_CHEMICALS = 'БЫТОВАЯ ХИМИЯ';

    case FAN = 'ВЕНТИЛЯТОР';

    case SCALES = 'ВЕСЫ';

    case AIR_CLEANER = 'ВОЗДУХООЧИСТИТЕЛЬ';

    case JOYSTICK = 'ДЖОЙСТИК';

    case DICTAPHONE = 'ДИКТОФОН';

    case YOGURT_MAKER = 'ЙОГУРТНИЦА';

    case CABLE = 'КАБЕЛЬ';

    case CALCULATOR = 'КАЛЬКУЛЯТОР';

    case CARTRIDGE = 'КАРТРИДЖ';

    case POT = 'КАСТРЮЛЯ';

    case KEYBOARD = 'КЛАВИАТУРА';

    case CAR_SPEAKERS = 'КОЛОНКИ АВТОМОБИЛЬНЫЕ';

    case COFFEE_MAKER = 'КОФЕВАРКА';

    case COFFEE_GRINDER = 'КОФЕМОЛКА';

    case CLOTHES_CLEANING_MACHINE = 'МАШИНКА ДЛЯ ЧИСТКИ ОДЕЖДЫ';

    case MICROPHONE = 'МИКРОФОН';

    case MIXER = 'МИКСЕР';

    case MODEM = 'МОДЕМ';

    case MONITOR = 'МОНИТОР';

    case MOUSE = 'МЫШЬ';

    case MEAT_GRINDER = 'МЯСОРУБКА';

    case HEADPHONES = 'НАУШНИКИ';

    case KNIFE = 'НОЖ';

    case HEATER = 'ОБОГРЕВАТЕЛЬ';

    case DISHES = 'ПОСУДА';

    case A_PRINTER = 'ПРИНТЕР';

    case REMOTE_CONTROLLER = 'ПУЛЬТ';

    case JUICER = 'СОКОВЫЖИМАЛКА';

    case THERMOS = 'ТЕРМОС';

    case TOASTER = 'ТОСТЕР';

    case IRON = 'УТЮГ';

    case FILTER = 'ФИЛЬТР';

    case FRYER = 'ФРИТЮРНИЦА';

    case FRIDGE = 'ХОЛОДИЛЬНИК';

    case TRIPOD = 'ШТАТИВ';

    case EPILATOR = 'ЭПИЛЯТОР';

    case FUR_COAT = 'ШУБА';

    case CEMENT = 'ЦЕМЕНТ';

    case CAR_RADIO = 'АВТОМАГНИТОЛА';

    case BIKE = 'ВЕЛОСИПЕД';

    case CURTAINS = 'ШТОРЫ';

    case CARPET = 'КОВРОЛИН';

    case LAWN_MOWER = 'ГАЗОНОКОСИЛКА';

    case COAT = 'ПАЛЬТО';

    case DYE = 'КРАСКА';

    case JACKET = 'КУРТКА';

    case TROUSERS = 'БРЮКИ';

    case BED = 'КРОВАТЬ';

    case SYNTHESIZER = 'СИНТЕЗАТОР';

    case PLAYER = 'ПЛЕЕР';

    case VIDEO_CARD = 'ВИДЕОКАРТА';

    case MONO_BLOCK = 'МОНОБЛОК';

    case RADIO = 'МАГНИТОЛА';

    case RECORD_PLAYER = 'МАГНИТОФОН';

    case SEWING_MACHINE2 = 'МАШИНА ШВЕЙНАЯ';

    case CHANDELIER = 'ЛЮСТРА';

    case AMPLIFIER = 'УСИЛИТЕЛЬ';

    case UNINTERRUPTIBLE_POWER_SUPPLY = 'БЛОК БЕСПЕРЕБОЙНОГО ПИТАНИЯ';

    case PHOTO_BAG = 'ФОТОСУМКА';

    case CPU = 'ПРОЦЕССОР';

    case WRISTWATCH = 'ЧАСЫ НАРУЧНЫЕ';

    case NIGHT_LIGHT = 'НОЧНИК';

    case DISHWASHER2 = 'МАШИНА ПОСУДОМОЕЧНАЯ';

    case WATER_HEATER = 'ВОДОНАГРЕВАТЕЛЬ';

    case COMPUTER = 'КОМПЬЮТЕР';

    case KITCHEN = 'КУХНЯ';

    case RADIO2 = 'РАДИО';

    case BRA = 'БРА';

    case BATH = 'ВАННА';

    case WAFFLE_MAKER = 'ВАФЕЛЬНИЦА';

    case FIREPLACE = 'КАМИН';

    case DRESSER = 'КОМОД';

    case LAMP = 'ЛАМПА';

    case WALLPAPER = 'ОБОИ';

    case CURTAINS2 = 'ПОРТЬЕРЫ';

    case GRINDER = 'ИЗМЕЛЬЧИТЕЛЬ';

    case BOARD = 'ДОСКА';

    case TONOMETER = 'ТОНОМЕТР';

    case GRILL = 'ГРИЛЬ';

    case SHEEPSKIN_COAT = 'ДУБЛЕНКА';

    case COMPUTER_SPEAKERS = 'КОЛОНКИ КОМПЬЮТЕРНЫЕ';

    case WASHING = 'МОЙКА';

    case BAKE = 'ПЕЧЬ';

    case SOFTWARE = 'ПРОГРАММНОЕ ОБЕСПЕЧЕНИЕ';

    case CAR_VACUUM_CLEANER = 'ПЫЛЕСОС АВТОМОБИЛЬНЫЙ';

    case SAFE = 'СЕЙФ';

    case MIXER2 = 'СМЕСИТЕЛЬ';

    case DENTISTRY = 'СТОМАТОЛОГИЯ';

    case OFFICE_CHAIR = 'СТУЛ ОФИСНЫЙ';

    case FLOOR_LAMP = 'ТОРШЕР';

    case BREAD_MAKER = 'ХЛЕБОПЕЧЬ';

    case LORD_CLOCK = 'ЧАСЫ НАПОЛЬНЫЕ';

    case WALL_CLOCK = 'ЧАСЫ НАСТЕННЫЕ';

    case DENTISTRY_TREATMENT = 'Стоматология-лечение';

    case DENTISTRY_ORTHOPEDICS = 'Стоматология-ортопедия';

    case DENTISTRY_SURGERY = 'Стоматология-хирургия';

    case GREENHOUSE = 'Теплица';

    case HEADDRESS = 'Головной убор';

    case JACKET2 = 'Жакет';

    case JACKET_DOWN_JACKET = 'Куртка/Пуховик';

    case VACUUM_CLEANER = 'Пылесос';

    case MICROWAVE_GRILL_ETC = 'Микроволновка/Гриль, др.';

    case FOOD_PROCESSOR_JUICER_ETC = 'Кух.комбайн/Соковыжималка, др.';

    case IRONER_IRON = 'Гладильный аппарат/Утюг';

    case LANDLINE_PHONE = 'Стационарный телефон';

    case EXTENDED_1_YEAR_WARRANTY = 'Продленная гарантия на 1 г.';

    case EXTENDED_WARRANTY_FOR_2_YEARS = 'Продленная гарантия на 2 г.';

    case EXTENDED_3_YEAR_WARRANTY = 'Продленная гарантия на 3 г.';

    case KITCHEN_TO_ORDER = 'Кухня на заказ';

    case KITCHEN_READY = 'Кухня готовая';

    case SMARTPHONE_COMMUNICATOR_PDA = 'Смартфон/Коммуникатор/КПК';

    case LAPTOP_ACCESSORIES = 'Аксессуары для ноутбука';

    case NETBOOK = 'Нетбук';

    case COFFEE_MACHINE = 'Кофемашина';

    case CLOSET = 'Шкаф';

    case VIDEO_PROJECTOR_SCREEN = 'Видеопроектор/Экран';

    case GAME_CONSOLE = 'Игровая приставка';

    case BOOMERANG_SERVICE = 'Услуга \'Бумеранг\'';

    case ACCESSORIES_CLOTHING = 'Аксессуары (одежда)';

    case JUMPER_JACKET = 'Джемпер/Кофта';

    case SUIT_JACKET_VEST = 'Костюм/Пиджак/Жилет';

    case SHOES = 'Обувь';

    case DRESS_SKIRT = 'Платье/Юбка';

    case CLOAK = 'Плащ';

    case EQUIPMENT_INSTALLATION = 'Установка оборудования';

    case HARVESTING_EQUIPMENT = 'Уборочная техника';

    case AUTO_REPAIR_TUNING = 'Авто ремонт, тюнинг';

    case ALARM_AND_ANTI_THEFT_SYSTEMS = 'Сигнал-ция и противоуг.системы';

    case INSTALLATION_OF_ADDITIONAL_EQUIPMENT = 'Установка дополн.оборудования';

    case EBOOK = 'Электронная книга';

    case TABLET = 'Планшет';

    case CONSTRUCTION_MATERIALS = 'Строительные материалы';

    case GENERATOR_PUMPING_STATION = 'Генератор/Насосная станция';

    case LOG_HOUSE_HOUSE_COTTAGE = 'Сруб (дом/коттедж)';

    case LOG_HOUSE_SAUNA_GARDEN_HOUSE = 'Сруб (баня/садовый дом)';

    case COSMETICS = 'Косметика';

    case FURNITURE_KITCHEN_INSTALLATION = 'Установка мебели/кухни';

    case ADD_SERVICE_FOR_SMALL_EQUIPMENT = 'Доп. сервис для мелкой техники';

    case ADDITIONAL_INSURANCE_SERVICES = 'Дополнительные страховые услуги';

    case FITNESS = 'Фитнес';

    case EDUCATION_FOREIGN_LANGUAGE = 'Образование (ин.яз.)';

    case BEDROOM_FURNITURE = 'МЕБЕЛЬ ДЛЯ СПАЛЬНИ';

    case CARPET2 = 'КОВЕР';

    case TOILET = 'УНИТАЗ';

    case GLUE = 'КЛЕЙ';

    case TEXTILE = 'ТЕКСТИЛЬ';

    case PAINTING = 'КАРТИНА';

    case TAKHTA = 'ТАХТА';

    case LAMP2 = 'СВЕТИЛЬНИК';

    case PILLOW = 'ПОДУШКА';

    case SOFA2 = 'СОФА';

    case LAMINATE = 'ЛАМИНАТ';

    case LINOLEUM = 'ЛИНОЛЕУМ';

    case DOUBLE_BOILER = 'ПАРОВАРКА';

    case BATH_SET = 'КОМПЛЕКТ ДЛЯ ВАННЫ';

    case PHOTO_FLASH = 'ФОТОВСПЫШКА';

    case SANITARY = 'САНФАЯНС';

    case CENTRIFUGE = 'ЦЕНТРИФУГА';

    case TILE = 'ПЛИТКА';

    case MEMORY_CARD = 'КАРТА ПАМЯТИ';

    case HALL_FURNITURE = 'МЕБЕЛЬ ДЛЯ ПРИХОЖЕЙ';

    case PETROL_MOWER = 'БЕНЗОКОСА';

    case OVEN = 'ДУХОВКА';

    case MEMORY_MODULE = 'МОДУЛЬ ПАМЯТИ';

    case SINK = 'РАКОВИНА';

    case SKIRT = 'ЮБКА';

    case DRIVE = 'ДИСКОВОД';

    case LENS = 'ОБЪЕКТИВ';

    case AIR_GRILL = 'АЭРОГРИЛЬ';

    case SET_OF_COMPONENTS = 'НАБОР КОМПЛЕКТУЮЩИХ';

    case TOWEL_RAILER = 'ПОЛОТЕНЦЕСУШИТЕЛЬ';

    case COOKING_PROCESSOR = 'КОМБАЙН КУХОННЫЙ';

    case BOAT = 'ЛОДКА';

    case BLAZER = 'ПИДЖАК';

    case MASSAGER = 'МАССАЖЕР';

    case THERMOS_BAG = 'СУМКА-ТЕРМОС';

    case VIDEO_INPUT_CARD = 'ПЛАТА ВИДЕОВВОДА';

    case BLINDS = 'ЖАЛЮЗИ';

    case VEGETABLE_CUTTER = 'ОВОЩЕРЕЗКА';

    case IRONING_BOARD = 'ДОСКА ГЛАДИЛЬНАЯ';

    case CONNECTOR = 'РАЗЪЕМ';

    case HAIR_CLIPPER = 'МАШИНКА ДЛЯ СТРИЖКИ ВОЛОС';

    case WASH_BASIN = 'УМЫВАЛЬНИК';

    case SANDWICH_MAKER = 'БУТЕРБРОДНИЦА';

    case COMPONENTS = 'КОМПЛЕКТУЮЩИЕ';

    case HOSE = 'ШЛАНГ';

    case SHELF = 'ПОЛКА';

    case WEBCAM = 'ВЕБ-КАМЕРА';

    case IMPLANTATION = 'ИМПЛАНТАЦИЯ';

    case CD_PLAYER_WITH_KARAOKE = 'CD-ПРОИГРЫВАТЕЛЬ С КАРАОКЕ';

    case PHOTO_ALBUM = 'ФОТОАЛЬБОМ';

    case BOILER2 = 'КОТЕЛ';

    case TENT = 'ПАЛАТКА';

    case PAPER_SHREDDER = 'УНИЧТОЖИТЕЛЬ БУМАГИ';

    case LATOFLEX = 'ЛАТОФЛЕКС';

    case GUITAR = 'ГИТАРА';

    case COSTUME = 'КОСТЮМ';

    case LOW_BOOTS = 'ПОЛУБОТИНКИ';

    case CHECKPOINT = 'КПП';

    case HAT = 'ШЛЯПА';

    case LOCK = 'ЗАМОК';

    case CALL = 'ЗВОНОК';

    case A_CAP = 'ШАПКА';

    case WORK_CHAIR = 'КРЕСЛО РАБОЧЕЕ';

    case AUTOMOTIVE_ENGINE = 'ДВИГАТЕЛЬ АВТОМОБИЛЬНЫЙ';

    case EDUCATION = 'ОБУЧЕНИЕ';

    case UPHOLSTERED_FURNITURE_SET = 'КОМПЛЕКТ МЯГКОЙ МЕБЕЛИ';

    case TIE = 'ГАЛСТУК';

    case SWITCH = 'ВЫКЛЮЧАТЕЛЬ';

    case BRA2 = 'БЮСТГАЛТЕР';

    case HANGER = 'ВЕШАЛКА';

    case KNIVE_SET = 'НАБОР НОЖЕЙ';

    case BOOTS = 'БОТИНКИ';

    case PANCHO = 'ПАНЧО';

    case POWER_COAT = 'ПОЛУПАЛЬТО';

    case JUMPER = 'ДЖЕМПЕР';

    case BOOTS2 = 'САПОГИ';

    case COVER = 'ПОКРЫВАЛО';

    case LIVING_ROOM = 'ГОСТИНАЯ';

    case THE_WIRE = 'ПРОВОД';

    case ADDITIONAL_WARRANTY_INSURANCE = 'ДОПОЛНИТЕЛЬНАЯ ГАРАНТИЯ / СТРАХОВКА';

    case CAMERA = 'ФОТОКАМЕРА';

    case LATTICE = 'РЕШЕТКА';

    case LEATHER_CLOAK = 'ПЛАЩ КОЖАНЫЙ';

    case PC_CASE = 'КОРПУС ПК';

    case MOBILE_PHONE2 = 'ТЕЛЕФОН МОБИЛЬНЫЙ';

    case BLANKET = 'ОДЕЯЛО';

    case HEADPHONES_WITH_MICROPHONE = 'НАУШНИКИ С МИКРОФОНОМ';

    case STEAM_GENERATOR = 'ПАРОГЕНЕРАТОР';

    case GENERATOR = 'ГЕНЕРАТОР';

    case LADDER = 'ЛЕСТНИЦА';

    case PUMP = 'НАСОС';

    case FUR_COAT2 = 'ПОЛУШУБОК';

    case MANTO = 'МАНТО';

    case CAMERA_CASE = 'ЧЕХОЛ ДЛЯ КАМЕРЫ';

    case CASE_FOR_THE_CAMERA = 'ЧЕХОЛ ДЛЯ ФОТОАППАРАТА';

    case PIPE = 'ТРУБА';

    case GROUT = 'ЗАТИРКА';

    case CAR_SPEAKERS2 = 'ДИНАМИКИ АВТОКОЛОНКИ';

    case CASE = 'ЧЕХОЛ';

    case VIDEO_PROJECTOR = 'ВИДЕОПРОЕКТОР';

    case MOUSE_PAD = 'КОВРИК ДЛЯ МЫШИ';

    case STROLLER = 'КОЛЯСКА';

    case CHILDREN_S_CLOTHING_SET = 'КОМПЛЕКТ ДЕТСКОЙ ОДЕЖДЫ';

    case TOY = 'ИГРУШКА';

    case LASER_PRINTER = 'ПРИНТЕР ЛАЗЕРНЫЙ';

    case THRESHOLD = 'ПОРОГ';

    case JOYSTICK_STEERING_STEERING = 'ДЖОЙСТИК-РУЛЬ';

    case DVD_PLAYER = 'DVD-ПЛЕЕР';

    case SORAFAN = 'САРАФАН';

    case VEST = 'ЖИЛЕТ';

    case SKIS = 'ЛЫЖИ';

    case MAINS_FILTER = 'ФИЛЬТР СЕТЕВОЙ';

    case MAP_VIDEO = 'КАРТА ВИДЕО';

    case PLUMBING_SET = 'КОМПЛЕКТ САНТЕХНИКИ';

    case MICROWAVE_WARE = 'ПОСУДА ДЛЯ СВЧ';

    case SNOWBOARD = 'СНОУБОРД';

    case ELECTRIC_OVEN = 'ЭЛЕКТРОПЕЧЬ';

    case ELECTRIC_HEATING_HATTER = 'ЭЛЕКТРОГРЕЛКА';

    case COOLING_CHAMBER = 'ХОЛОДИЛЬНАЯ КАМЕРА';

    case BIDET = 'БИДЕ';

    case GRATER = 'ТЕРКА';

    case DRESS = 'ПЛАТЬЕ';

    case HUNTING_RIFLE = 'РУЖЬЕ ОХОТНИЧЬЕ';

    case FUR_COAT3 = 'ПАЛЬТО МЕХОВОЕ';

    case PHOTO_ACCESSORIES = 'ФОТОАКСЕССУАРЫ';

    case GYPSOCARDBOARD = 'ГИПСОКАРТОН';

    case CABINET = 'КАБИНЕТ';

    case COT2 = 'РАСКЛАДУШКА';

    case TOOL = 'ИНСТРУМЕНТ';

    case TREATMENT = 'ЛЕЧЕНИЕ';

    case GOLD_WATCH = 'ЧАСЫ ЗОЛОТЫЕ';

    case EARRINGS = 'СЕРЬГИ';

    case PULLOVER = 'ПУЛОВЕР';

    case PROJECTOR = 'ПРОЕКТОР';

    case KITCHEN_CORNER = 'УГОЛ КУХОННЫЙ';

    case AUTO_DISCS = 'АВТОДИСКИ';

    case FRENCH = 'ФРЕНЧ';

    case SHOT = 'ЭТАЖЕРКА';

    case TIRE = 'ШИНА';

    case WINDOW = 'ОКНО';

    case VASE = 'ВАЗА';

    case PAN_SET = 'НАБОР СКОВОРОДОК';

    case SUITCASE = 'ЧЕМОДАН';

    case UNDERWEAR = 'БЕЛЬЕ';

    case ACOUSTIC_SET = 'КОМПЛЕКТ АККУСТИКИ';

    case FUR_HIDE = 'ШКУРА МЕХОВАЯ';

    case TONER = 'ТОНЕР';

    case WATER_TREATMENT_SYSTEM = 'СИСТЕМА ВОДООЧИСТКИ';

    case SAUNA_SET = 'КОМПЛЕКТ САУНЫ';

    case POWER_TOOLS = 'ЭЛЕКТРОИНСТРУМЕНТ';

    case ELECTRICAL_EQUIPMENT = 'ЭЛЕКТРООБОРУДОВАНИЕ';

    case NATURAL_STONE = 'КАМЕНЬ ПРИРОДНЫЙ';

    case STONE_PRODUCTS = 'ИЗДЕЛИЕ ИЗ КАМНЯ';

    case POOL = 'БАССЕЙН';

    case ROOFING_MATERIAL2 = 'МАТЕРИАЛ КРОВЕЛЬНЫЙ';

    case VIDEO_SURVEILLANCE_AND_ACCESS_CONTROL_SYSTEM = 'СИСТЕМА ВИДЕОНАБЛЮДЕНИЯ И КОНТРОЛЯ ДОСТУПА';

    case HEATING_SYSTEM_KIT_WARM_FLOOR = 'КОМПЛЕКТ СИСТЕМЫ ОБОГРЕВА ТЕПЛЫЙ ПОЛ';

    case BUFFET = 'БУФЕТ';

    case CHILDREN_S_BED = 'КРОВАТЬ ДЕТСКАЯ';

    case SHOWER_CABIN = 'КАБИНА ДУШЕВАЯ';

    case TILE2 = 'КАФЕЛЬ';

    case KARAOKE_SYSTEM = 'СИСТЕМА КАРАОКЕ';

    case CABINET_FURNITURE = 'МЕБЕЛЬ КОРПУСНАЯ';

    case MIRROR = 'ЗЕРКАЛО';

    case BIOTOILET = 'БИОТУАЛЕТ';

    case THERMOMETER = 'ТЕРМОМЕТР';

    case CHANGER = 'ЧЕЙНДЖЕР';

    case LAPTOP_BAG = 'СУМКА ДЛЯ НОУТБУКА';

    case WATER_FILTER = 'ФИЛЬТР ДЛЯ ВОДЫ';

    case PLASTIC_PANEL = 'ПАНЕЛЬ ПЛАСТИКОВАЯ';

    case SUSPENDED_CEILING = 'ПОТОЛОК НАВЕСНОЙ';

    case ELECTRIC_GRILL = 'ЭЛЕКТРОГРИЛЬ';

    case CD_PLAYER = 'CD ПРОИГРЫВАТЕЛЬ';

    case PRESSURE_COOKER = 'СКОРОВАРКА';

    case WALLPAPER_SET = 'КОМПЛЕКТ ОБОЕВ';

    case SPRAYER = 'ОПРЫСКИВАТЕЛЬ';

    case ARMCHAIR = 'КРЕСЛО';

    case PHOTO_PAPER = 'ФОТОБУМАГА';

    case SHIRT = 'СОРОЧКА';

    case ELECTRIC_CULTIVATOR = 'ЭЛЕКТРОКУЛЬТИВАТОР';

    case CAR_SPEAKERS3 = 'АВТОДИНАМИКИ';

    case FURNITURE_SET_FOR_DINING_AREA = 'НАБОР МЕБЕЛИ ДЛЯ ОБЕДЕННОЙ ЗОНЫ';

    case ELECTRICAL_BOARD = 'ЭЛЕКТРОЩИТОК';

    case SLATE = 'ШИФЕР';

    case CLIPPING = 'ВАГОНКА';

    case CEILING_TILES = 'ПЛИТКА ПОТОЛОЧНАЯ';

    case PLASTIC_SKIRTING_BOARD = 'ПЛИНТУС ПЛАСТИКОВЫЙ';

    case WALL_PANEL = 'ПАНЕЛЬ СТЕНОВАЯ';

    case FORGED_PORCH = 'КРЫЛЬЦО КОВАНОЕ';

    case CRYSTAL = 'НАЛИЧНИК';

    case TILE_GLUE = 'КЛЕЙ ПЛИТОЧНЫЙ';

    case LADDER2 = 'СТРЕМЯНКА';

    case CAR_AUDIO_KIT = 'АВТОАУДИОКОМПЛЕКТ';

    case COUCH = 'КУШЕТКА';

    case BRUS = 'БРУС';

    case EDGED_BOARD = 'ДОСКА ОБРЕЗНАЯ';

    case OFFICE_FURNITURE2 = 'МЕБЕЛЬ ДЛЯ ОФИСА';

    case CAMERA_TRIPOD = 'ШТАТИВ ДЛЯ ВИДЕОКАМЕРЫ';

    case ELECTRIC_MOTOR_UNIT = 'ЭЛЕКТРОМОТОБЛОК';

    case GAME_CONSOLE2 = 'ПРИСТАВКА ИГРОВАЯ';

    case REPAIR_SERVICE = 'УСЛУГА ПО РЕМОНТУ';

    case COLLAR = 'ВОРОТНИК';

    case DOWN_JACKET = 'ПУХОВИК';

    case SERVICE_SUBSCRIPTION = 'АБОНЕМЕНТ НА ОКАЗАНИЕ УСЛУГ';

    case FUR_COAT4 = 'ШУБА-ДУБЛЕНКА';

    case AGRICULTURAL_EQUIPMENT = 'С/Х ТЕХНИКА';

    case BLOUSE = 'БЛУЗКА';

    case WORK_CABINET = 'ШКАФ РАБОЧИЙ';

    case SWEATER = 'КОФТА';

    case SET_OF_PVC_PRODUCTS = 'КОМПЛЕКТ ИЗДЕЛИЙ ИЗ ПВХ';

    case GLASS_UNIT = 'СТЕКЛОПАКЕТ';

    case FUR_JACKET = 'КУРТКА МЕХОВАЯ';

    case KITCHEN_FURNITURE = 'МЕБЕЛЬ КУХОННАЯ';

    case ACCESSORIES_FOR_SUSPENDED_CEILINGS = 'КОМПЛЕКТУЮЩИЕ К ПОДВЕСНОМУ ПОТОЛКУ';

    case SHIRT2 = 'РУБАШКА';

    case SWEATER2 = 'СВИТЕР';

    case INFLATABLE_BOAT = 'ЛОДКА НАДУВНАЯ';

    case FUR_PRODUCTS2 = 'ИЗДЕЛИЕ ИЗ МЕХА';

    case MUSICAL_CENTER = 'ЦЕНТР МУЗЫКАЛЬНЫЙ';

    case TIMER = 'ТАЙМЕР';

    case BAG_FOR_THE_CAMERA = 'СУМКА ДЛЯ ФОТОАППАРАТА';

    case SKI_MOUNTING = 'КРЕПЛЕНИЕ ГОРНОЛЫЖНОЕ';

    case SNOWBOARD_MOUNTING = 'КРЕПЛЕНИЕ СНОУБОРДИЧЕСКОЕ';

    case DOOR_HANDLES = 'РУЧКИ ДВЕРНЫЕ';

    case BOILER3 = 'КИПЯТИЛЬНИК';

    case JEANS = 'ДЖИНСЫ';

    case GAS_METER = 'СЧЕТЧИК ГАЗОВЫЙ';

    case SHOES2 = 'ТУФЛИ';

    case DDR_MEMORY = 'ПАМЯТЬ DDR';

    case CLOSET2 = 'ШКАФ - КУПЕ';

    case CLOAK_COAT = 'ПЛАЩ ПАЛЬТО';

    case LEATHER_JACKET = 'КУРТКА КОЖАНАЯ';

    case SHOWER_TRAY_CABINS = 'ПОДДОН ДЛЯ ДУШ. КАБИНЫ';

    case SET_OF_FITTINGS = 'КОМПЛЕКТ НАЛИЧНИКОВ';

    case PC_COMPONENTS = 'КОМПЛЕКТУЮЩИЕ К ПК';

    case MIXER_SET = 'КОМПЛЕКТ СМЕСИТЕЛЕЙ';

    case LEATHER_POWER_COAT = 'ПОЛУПАЛЬТО КОЖ.';

    case DINING_AREA = 'ЗОНА ОБЕДЕННАЯ';

    case TROUSERS2 = 'ШТАНЫ';

    case WINDBREAK = 'ВЕТРОВКА';

    case STEAM_CLEANER = 'ПАРООЧИСТИТЕЛЬ';

    case NAVIGATOR = 'НАВИГАТОР';

    case CART = 'ТЕЛЕЖКА';

    case SET_OF_BUILT_IN_EQUIPMENT = 'КОМПЛЕКТ ВСТРАИВАЕМОЙ ТЕХНИКИ';

    case SANDWICH_TOASTER = 'СЭНДВИЧ-ТОСТЕР';

    case GARDEN_FURNITURE = 'МЕБЕЛЬ ДЛЯ ДАЧИ';

    case SDRAM_MEMORY = 'ПАМЯТЬ SDRAM';

    case LAPTOP_MEMORY = 'ПАМЯТЬ ДЛЯ НОУТБУКА';

    case ENAMEL = 'ЭМАЛЬ';

    case PUTTY = 'ШПАТЛЕВКА';

    case SERVER = 'СЕРВЕР';

    case CAR_TV = 'ТЕЛЕВИЗОР АВТОМОБИЛЬНЫЙ';

    case ELECTRIC_METER = 'ЭЛЕКТРОСЧЁТЧИК';

    case KITCHEN_SOFA = 'ДИВАН КУХОННЫЙ';

    case PHOTO_VIDEO_CAMERA = 'ФОТОВИДЕОКАМЕРА';

    case CURTAIN_FABRIC = 'ТКАНЬ ПОРТЬЕРНАЯ';

    case RADIATOR = 'РАДИАТОР ОТОПЛЕНИЯ';

    case BLACK_METAL = 'МЕТАЛЛОПРОКАТ ЧЕРНЫЙ';

    case UNDERBOARD_FOR_PARQUET = 'ПОДЛОЖКА ПОД ПАРКЕТ';

    case FAUX_FUR_COAT = 'ПАЛЬТО ИЗ ИСКУСТВЕННОГО МЕХА';

    case SET_OF_COOKWARE_FOR_MICROWAVE = 'НАБОР ПОСУДЫ ДЛЯ СВЧ';

    case SET_OF_DISHES = 'НАБОР ПОСУДЫ';

    case BEDROOM_SET2 = 'ГАРНИТУР СПАЛЬНЫЙ';

    case VIDEO_SURVEILLANCE_SYSTEM = 'СИСТЕМА ВИДЕОНАБЛЮДЕНИЯ';

    case LOW_BOOTS2 = 'ПОЛУСАПОГИ';

    case CARDIGAN = 'КАРДИГАН';

    case HALF_CLOAK_OF_LEATHER = 'ПОЛУПЛАЩ КОЖ';

    case WINDOWSILL = 'ПОДОКОННИК';

    case CEILING_PLATE = 'ПЛИТА ПОТОЛОЧНАЯ';

    case UNDERPANTS = 'ТРУСЫ';

    case SKI_SET = 'КОМПЛЕКТ ЛЫЖНЫЙ';

    case MDF_PANEL = 'ПАНЕЛЬ МДФ';

    case CD_DRIVE = 'CD-ПРИВОД';

    case COMPUTER_MEMORY = 'ПАМЯТЬ КОМПЬЮТЕРНАЯ';

    case SCREEN_FOR_VIDEO_PROJECTOR = 'ЭКРАН ДЛЯ ВИДЕОПРОЕКТОРА';

    case FUR_COLLAR = 'ВОРОТНИК МЕХОВОЙ';

    case LEADER_S_CHAIR = 'КРЕСЛО РУКОВОДИТЕЛЯ';

    case A_DEVICE_FOR_MEASURING_PRESSURE = 'ПРИБОР ДЛЯ ИЗМЕРЕНИЯ ДАВЛЕНИЯ';

    case OFFICE_FURNITURE_SET = 'КОМПЛЕКТ ОФИСНОЙ МЕБЕЛИ';

    case PLASTER = 'ШТУКАТУРКА';

    case CONSTRUCTION_NET = 'СЕТКА СТРОИТЕЛЬНАЯ';

    case KNITTING_MACHINE = 'МАШИНА ВЯЗАЛЬНАЯ';

    case SKI_SET2 = 'НАБОР ГОРНОЛЫЖНЫЙ';

    case COFFEE_MACHINE2 = 'КОФЕ-МАШИНА';

    case CHEST_OF_DESK = 'ТУМБА КОМОД';

    case USB_CORD = 'ШНУР USB';

    case SET_OF_CASH = 'НАБОР НАЛИЧНИКОВ';

    case MOUNTING_FOAM = 'ПЕНА МОНТАЖНАЯ';

    case COVERING_PLATE = 'ПЛИТА ОБЛИЦОВОЧНАЯ';

    case GUN = 'ПИСТОЛЕТ';

    case RAM_MEMORY = 'ПАМЯТЬ ОПЕРАТИВНАЯ';

    case DECORATIVE_COATING = 'ПОКРЫТИЕ ДЕКОРАТИВНОЕ';

    case WATER_PURIFIER = 'ВОДООЧИСТИТЕЛЬ';

    case GALVANIZED_SHEET = 'ЛИСТ ОЦИНКОВАНЫЙ';

    case FUR_COAT5 = 'ПОЛУПАЛЬТО МЕХОВОЕ';

    case WATCH_BRACELET = 'БРАСЛЕТ ДЛЯ ЧАСОВ';

    case IONIZER = 'ИОНИЗАТОР';

    case BATH_PANEL = 'ПАНЕЛЬ ДЛЯ ВАННЫ';

    case CEILING_PANEL = 'ПАНЕЛЬ ПОТОЛОЧНАЯ';

    case SKIRTING_BOARD_SET = 'КОМПЛЕКТ ПЛИНТУСА';

    case TOILET_WITH_ACCESSORIES = 'УНИТАЗ С КОМПЛЕКТУЮЩИМИ';

    case PVC_CONSTRUCTIONS = 'КОНСТРУКЦИИ ПВХ';

    case MOSQUITO_NET = 'СЕТКА МОСКИТНАЯ';

    case PLASTIC_PANELS_SET = 'ПАНЕЛИ ПЛАСТИКОВЫЕ КОМПЛЕКТ';

    case PRINTER_COPIER_SCAN_FAX = 'ПРИНТЕР/КОПИР/СКАНЕР/ФАКС';

    case FUR_CLOAK = 'ПЛАЩ НА МЕХУ';

    case LEATHER_COAT = 'ПАЛЬТО КОЖАНОЕ';

    case OFFICE_TABLE = 'СТОЛ ОФИСНЫЙ';

    case P_JUMPSUIT = 'П/КОМБИНЕЗОН';

    case GUITAR_CASE = 'ЧЕХОЛ ДЛЯ ГИТАРЫ';

    case USB_DRIVE = 'НАКОПИТЕЛЬ USB';

    case FILING_CABINETS = 'ШКАФ ДЛЯ ДОКУМЕНТОВ';

    case WATER_METER = 'СЧЕТЧИК ВОДЫ';

    case VIDECAM = 'КАМЕРА ВИДЕО НАБЛЮДЕНИЯ';

    case SYSTEM_BLOCK = 'БЛОК СИСТЕМНЫЙ';

    case PENOPLEX_INSULATION = 'УТЕПЛИТЕЛЬ ПЕНОПЛЕКС';

    case TIRES_WHEEL_SET = 'ШИНЫ КОЛЕСНЫЕ КОМПЛЕКТ';

    case ROLLER_SHUTTERS = 'РОЛЬСТАВНИ';

    case CEILING_SKIRTING_BOARD = 'ПЛИНТУС ПОТОЛОЧНЫЙ';

    case UPHOLSTERED_FURNITURE_SET2 = 'ГАРНИТУР МЯГКОЙ МЕБЕЛИ';

    case SET_OF_WINDOWS_AND_DOORS = 'КОМПЛЕКТ ОКОН И ДВЕРЕЙ';

    case BUILDING_MATERIALS = 'СТРОЙ-МАТЕРИАЛЫ';

    case FOAM_BLOCK = 'ПЕНОБЛОК';

    case ACOUSTIC_SYSTEM = 'СИСТЕМА АККУСТИЧЕСКАЯ';

    case SANDALS = 'БОСОНОЖКИ';

    case HIGH_PRESSURE_WASHER = 'МОЙКА ВЫСОКОГО ДАВЛЕНИЯ';

    case GUITAR_STRINGS = 'СТРУНЫ ДЛЯ ГИТАРЫ';

    case RABITZ = 'СЕТКА-РАБИЦА';

    case SLIPPERS = 'ТАПОЧКИ';

    case GARDEN_CART = 'ТЕЛЕЖКА САДОВАЯ';

    case BATH_CURTAIN = 'ЗАНАВЕСКА ДЛЯ ВАННЫ';

    case CHIPBOARD_FURNITURE = 'ДСП МЕБЕЛЬНОЕ';

    case PNEUMATIC_TOOLS = 'ПНЕВМОИНСТРУМЕНТ';

    case ENTRANCE_DOOR = 'ДВЕРЬ ВХОДНАЯ';

    case GREENHOUSE_GARDEN = 'ТЕПЛИЦА САДОВАЯ';

    case WATER_HEATING_COLUMN = 'КОЛОНКА ВОДОНОГРЕВАТЕЛЬНАЯ';

    case LIVING_ROOM_FURNITURE_SET = 'НАБОР МЕБЕЛИ ДЛЯ ГОСТИНОЙ';

    case ELECTRONIC_LOCK = 'ЭЛЕКТРОЗАМОК';

    case WOODEN_SKIRTINTH = 'ПЛИНТУС ДЕРЕВЯННЫЙ';

    case STYROFOAM = 'ПЕНОПЛАСТ';

    case WARDROBE = 'ГАРДЕРОБНАЯ';

    case BEDROOM_FURNITURE_SET = 'КОМПЛЕКТ СПАЛЬНОЙ МЕБЕЛИ';

    case ACCESSORIES_FOR_UPHOLSTERED_FURNITURE = 'КОМПЛЕКТУЮЩИЕ ДЛЯ МЯГКОЙ МЕБЕЛИ';

    case GALVANIZED_CORPORATE_SHEET = 'ПРОФНАСТИЛ ОЦИНКОВАННЫЙ';

    case SOFT_OTTOMAN = 'ТАХТА МЯГКАЯ';

    case OFFICE_STANDARD = 'ТУМБА ОФИСНАЯ';

    case KITCHEN_UTENSILS_SET = 'НАБОР КУХОННЫХ ПРИНАДЛЕЖНОСТЕЙ';

    case COMPUTER_PERIPHERALS = 'ПЕРИФЕРИЯ ДЛЯ КОМПЬЮТЕРА';

    case WALLPAPER_GLUE = 'КЛЕЙ ОБОЙНЫЙ';

    case VIDEO_DOORPHONE = 'ВИДЕОДОМОФОН';

    case SET_OF_PLATES = 'НАБОР ТАРЕЛОК';

    case WATER_SUPPLY_SYSTEM = 'СИСТЕМА ВОДОСНАБЖЕНИЯ';

    case BEDDING_SET = 'КОМПЛЕКТ ПОСТЕЛЬНОГО БЕЛЬЯ';

    case FASTENING_TO_THE_BOARD = 'КРЕПЁЖ К ПЛИНТУСУ';

    case AIR_CONDITIONER_INSTALLATION = 'УСТАНОВКА КОНДИЦИОНЕРА';

    case BIKE_ACCESSORIES = 'ВЕЛОАКСЕССУАРЫ';

    case DVD_RW_DISC = 'ДИСК DVD+RW';

    case DELIVERY = 'ДОСТАВКА';

    case HOME_CINEMA_SYSTEM = 'СИСТЕМА ДОМАШНЕГО КИНОТЕАТРА';

    case PVC_FLOOR_SKIRTING_BOARD = 'ПЛИНТУС НАПОЛЬНЫЙ ПХВ';

    case BATHROOM_FURNITURE_SET = 'КОМПЛЕКТ МЕБЕЛИ ДЛЯ ВАННОЙ';

    case CAMERA_BAG = 'СУМКА ДЛЯ ВИДЕОКАМЕРЫ';

    case DOORS_SET = 'ДВЕРИ (КОМПЛЕКТ)';

    case MEDICAL_SET = 'КОМПЛЕКТ МЕДИЦИНСКИЙ';

    case ACCESSORY_FOR_MOBILE_PHONE = 'АКСЕССУАР ДЛЯ МОБИЛЬНОГО ТЕЛЕФОНА';

    case MDF_PANELS_SET = 'ПАНЕЛИ МДФ (КОМПЛЕКТ)';

    case ROLLER_SHUTTERS_SET = 'РОЛЬСТАВНИ (КОМПЛЕКТ)';

    case RAZOR = 'БРИТВА';

    case SETUP = 'НАСТРОЙКА';

    case ASSEMBLY = 'СБОРКА';

    case INSTALLATION = 'УСТАНОВКА';

    case CAR_ACCESSORIES = 'АВТОАКСЕССУАРЫ';

    case ADDITIONAL_AUTOMOTIVE_EQUIPMENT = 'АВТООБОРУДОВАНИЕ ДОПОЛНИТЕЛЬНОЕ';

    case AUDIO_KIT_FOR_HOME_CINEMA = 'АУДИОКОМПЛЕКТ ДЛЯ ДОМАШНЕГО КИНОТЕАТРА';

    case HIDROMASSAGE_BATH = 'ВАННА ГИДРОМАССАЖНАЯ';

    case VIDEO_EYE = 'ВИДЕОГЛАЗОК';

    case CURTAIN = 'ГАРДИНА';

    case CHILDREN_S_FURNITURE_SET = 'ГАРНИТУР ДЕТСКОЙ МЕБЕЛИ';

    case DINING_SET = 'ГАРНИТУР СТОЛОВЫЙ';

    case HYDROCYCLE = 'ГИДРОЦИКЛ';

    case CERAMIC_GRANITE = 'ГРАНИТ КЕРАМИЧЕСКИЙ';

    case BALCONY_DOOR = 'ДВЕРЬ БАЛКОННАЯ';

    case CAR_MOTORCYCLE_ENGINE = 'ДВИГАТЕЛЬ ДЛЯ АВТОМОБИЛЯ/МОТОЦИКЛА';

    case BOAT_ENGINE = 'ДВИГАТЕЛЬ ДЛЯ ЛОДКИ';

    case CORNER_KITCHEN_SOFA = 'ДИВАН УГЛОВОЙ КУХОННЫЙ';

    case DISC_CD = 'ДИСК CD';

    case DISC_CD_R = 'ДИСК CD-R';

    case HARD_DISK = 'ДИСК ЖЕСТКИЙ';

    case THERMAL_CURTAIN = 'ЗАВЕСА ТЕПЛОВАЯ';

    case STAINLESS_STEEL_PRODUCT = 'ИЗДЕЛИЕ ИЗ НЕРЖАВЕЮЩИХ СТАЛЕЙ';

    case CERAMIC_PRODUCT = 'ИЗДЕЛИЕ КЕРАМИЧЕСКОЕ';

    case CARPET_PRODUCT = 'ИЗДЕЛИЕ КОВРОВОЕ';

    case JEWELRY_PRODUCT = 'ИЗДЕЛИЕ ЮВЕЛИРНОЕ';

    case GARDEN_EQUIPMENT = 'ИНВЕНТАРЬ САДОВЫЙ';

    case MUSICAL_INSTRUMENT = 'ИНСТРУМЕНТ МУЗЫКАЛЬНЫЙ';

    case ACOUSTIC_CABLE = 'КАБЕЛЬ АККУСТИЧЕСКИЙ';

    case COMPUTER_CAMERA = 'КАМЕРА КОМПЬЮТЕРНАЯ';

    case FREEZER_COMPARTMENT = 'КАМЕРА МОРОЗИЛЬНАЯ';

    case CORNICE = 'КАРНИЗ';

    case SOUND_CARD = 'КАРТА ЗВУКОВАЯ';

    case BOAT2 = 'КАТЕР';

    case ATV = 'КВАДРОЦИКЛ';

    case BUILDING_BRICK = 'КИРПИЧ СТРОИТЕЛЬНЫЙ';

    case TILE_GLUE2 = 'КЛЕЙ ДЛЯ КАФЕЛЯ';

    case FORGED_VISOR = 'КОЗЫРЕК КОВАНЫЙ';

    case SHOWER_COLUMN = 'КОЛОНКА ДУШЕВАЯ';

    case ACOUSTIC_SPEAKERS = 'КОЛОНКИ АККУСТИЧЕСКИЕ';

    case CHILDREN_S_SPORTS_COMPLEX = 'КОМПЛЕКС ДЕТСКИЙ СПОРТИВНЫЙ';

    case VIDEO_DOORPHONE_SET = 'КОМПЛЕКТ ВИДЕОДОМОФОНА';

    case REMOTE_CONTROL_KIT = 'КОМПЛЕКТ ДИСТАНЦИОННОГО УПРАВЛЕНИЯ';

    case FURNITURE_SET_FOR_CHILDREN_S_ROOM = 'КОМПЛЕКТ МЕБЕЛИ ДЛЯ ДЕТСКОЙ';

    case MOUSE_KEYBOARD_SET = 'КОМПЛЕКТ МЫШЬ+КЛАВИАТУРА';

    case SET_OF_CLOTHES = 'КОМПЛЕКТ ОДЕЖДЫ';

    case COMPUTER_PERIPHERAL_SET = 'КОМПЛЕКТ ПЕРИФЕРИЙНЫЙ ДЛЯ КОМПЬЮТЕРА';

    case SLEEPING_SET = 'КОМПЛЕКТ СПАЛЬНЫЙ';

    case METAL_PLASTIC_STRUCTURES = 'КОНСТРУКЦИИ МЕТАЛЛОПЛАСТИКОВЫЕ';

    case WINDOW_CONSTRUCTION = 'КОНСТРУКЦИЯ ОКОННАЯ';

    case HEATING_BOILER = 'КОТЕЛ ОТОПИТЕЛЬНЫЙ';

    case COOLER = 'КУЛЕР';

    case FASTENING_MATERIAL = 'МАТЕРИАЛ КРЕПЕЖНЫЙ';

    case PAINT_MATERIALS = 'МАТЕРИАЛЫ ЛАКОКРАСОЧНЫЕ';

    case FINISHING_MATERIALS = 'МАТЕРИАЛЫ ОТДЕЛОЧНЫЕ';

    case IRONING_MACHINE = 'МАШИНА ГЛАДИЛЬНАЯ';

    case KITCHEN_MACHINE = 'МАШИНА КУХОННАЯ';

    case PRINTING_MACHINE = 'МАШИНА ПЕЧАТНАЯ';

    case CORNER_FURNITURE_FOR_KITCHEN = 'МЕБЕЛЬ УГЛОВАЯ ДЛЯ КУХНИ';

    case MOPED = 'МОПЕД';

    case CULTIVATOR = 'МОТОКУЛЬТИВАТОР';

    case BOAT_ENGINE2 = 'МОТОР ЛОДОЧНЫЙ';

    case SCOOTER = 'МОТОРОЛЛЕР';

    case MOTORBIKE = 'МОТОЦИКЛ';

    case TEA_SET = 'НАБОР ЧАЙНЫЙ';

    case POWER_TOOL_SET = 'НАБОР ЭЛЕКТРОИНСТРУМЕНТОВ';

    case DIGITAL_MEDIA = 'НОСИТЕЛЬ ЦИФРОВОЙ';

    case SECURITY_EQUIPMENT = 'ОБОРУДОВАНИЕ ОХРАННОЕ';

    case PERIPHERAL_EQUIPMENT = 'ОБОРУДОВАНИЕ ПЕРИФЕРИЙНОЕ';

    case SPORTS_EQUIPMENT2 = 'ОБОРУДОВАНИЕ СПОРТИВНОЕ';

    case SPORTS_CLOTHING = 'ОДЕЖДА СПОРТИВНАЯ';

    case INTERIOR_PARTITION = 'ПЕРЕГОРОДКА МЕЖКОМНАТНАЯ';

    case MICROWAVE_OVEN = 'ПЕЧЬ МИКРОВОЛНОВАЯ';

    case PIANO = 'ПИАНИНО';

    case PAJAMAS = 'ПИЖАМА';

    case MOTHER_BOARD = 'ПЛАТА МАТЕРИНСКАЯ';

    case SYSTEM_BOARD = 'ПЛАТА СИСТЕМНАЯ';

    case FLOORING = 'ПОКРЫТИЕ НАПОЛЬНОЕ';

    case SELF_LEVELING_FLOOR = 'ПОЛ САМОВЫРАВНИВАЮЩИЙСЯ';

    case WARM_FLOOR = 'ПОЛ ТЕПЛЫЙ';

    case HALFCOAT = 'ПОЛУПЛАЩ';

    case CEILING_GLUE = 'ПОТОЛОК КЛЕЕВОЙ';

    case STRETCH_CEILING = 'ПОТОЛОК НАТЯЖНОЙ';

    case SUSPENDED_CEILING2 = 'ПОТОЛОК ПОДВЕСНОЙ';

    case SEWING_DEVICES = 'ПРИСПОСОБЛЕНИЯ ШВЕЙНЫЕ';

    case ALUMINUM_PROFILE = 'ПРОФИЛЬ АЛЛЮМИНЕВЫЙ';

    case HEAT_GUNS = 'ПУШКА ТЕПЛОВАЯ';

    case FINISHING_WORKS = 'РАБОТЫ ОТДЕЛОЧНЫЕ';

    case CONSTRUCTION_REPAIR = 'РЕМОНТ СТРОИТЕЛЬНЫЙ';

    case SEPARATOR = 'СЕПАРАТОР';

    case GOLD_EARRINGS = 'СЕРЬГИ ЗОЛОТЫЕ';

    case SECURITY_ALARM = 'СИГНАЛИЗАЦИЯ ОХРАННАЯ';

    case SHOWER_SYSTEM = 'СИСТЕМА ДУШЕВАЯ';

    case SCOOTER2 = 'СКУТЕР';

    case DRY_CONSTRUCTION_MIXTURE = 'СМЕСЬ СУХАЯ СТРОИТЕЛЬНАЯ';

    case SNOWMOBILE = 'СНЕГОХОД';

    case CLEANIFICATION_FACILITY = 'СООРУЖЕНИЕ ОЧИСТИТЕЛЬНОЕ';

    case BEDROOM = 'СПАЛЬНЯ';

    case LOBBY = 'СРУБ';

    case WATER_STATION = 'СТАНЦИЯ ВОДЯНАЯ';

    case PUMPING_STATION = 'СТАНЦИЯ НАСОСНАЯ';

    case STEAM_STERILIZER = 'СТЕРИЛИЗАТОР ПАРОВОЙ';

    case CD_PLAYER_BAG = 'СУМКА ДЛЯ CD-ПЛЕЕРА';

    case TV_LCD_DVD = 'ТЕЛЕВИЗОР-LCD + DVD';

    case MOBILE_PHONE_ACCESSORIES = 'ТЕЛЕФОН МОБИЛЬНЫЙ + АКСЕССУАРЫ';

    case THERMAL_UNDERWEAR = 'ТЕРМОБЕЛЬЕ';

    case SNOW_REMOVING_EQUIPMENT = 'ТЕХНИКА СНЕГОУБОРОЧНАЯ';

    case DIGITAL_EQUIPMENT = 'ТЕХНИКА ЦИФРОВАЯ';

    case PRODUCTS_FOR_CHILDREN = 'ТОВАР ДЛЯ ДЕТЕЙ';

    case TRACTOR_MINI = 'ТРАКТОР-МИНИ';

    case SPORTS_TRAINER = 'ТРЕНАЖЕР СПОРТИВНЫЙ';

    case HEADDRESS2 = 'УБОР ГОЛОВНОЙ';

    case GUITAR_AMPLIFIER = 'УСИЛИТЕЛЬ ДЛЯ ГИТАРЫ';

    case MEDICAL_SERVICES = 'УСЛУГИ МЕДИЦИНСКИЕ';

    case DRUM_INSTALLATION = 'УСТАНОВКА БАРАБАННАЯ';

    case ANTI_THEFT_DEVICE = 'УСТРОЙСТВО ПРОТИВОУГОННОЕ';

    case FLASH_MEMORY = 'ФЛЕШ-ПАМЯТЬ';

    case ROBE = 'ХАЛАТ';

    case WATCH_SMART_WATCH = 'ЧАСЫ (смарт часы)';

    case OVEN_CABINET = 'ШКАФ ДУХОВОЙ';

    case COMPUTER_CORD = 'ШНУР КОМПЬЮТЕРНЫЙ';

    case CONNECTING_CORD = 'ШНУР СОЕДИНИТЕЛЬНЫЙ';

    case FUR_COAT6 = 'ШУБА-ПАЛЬТО МЕХОВОЕ';

    case CRUSHED_STONE_GRAVEL = 'ЩЕБЕНЬ-ГРАВИЙ';

    case SKIRTINTH = 'ПЛИНТУС';

    case HAIRDRYER = 'ФЕН';

    case KETTLE = 'ЧАЙНИК';

    case PARQUET = 'ПАРКЕТ';

    case HI_FI_ACOUSTICS = 'HI FI АКУСТИКА';

    case BRACELET = 'БРАСЛЕТ';

    case FARBY = 'ФАРБИ';

    case PENDANT = 'КУЛОН';

    case CULTIVATOR2 = 'КУЛЬТИВАТОР';

    case LAC = 'ЛАК';

    case SIDING = 'САЙДИНГ';

    case MOTORCYCLE_WATER = 'МОТОЦИКЛ ВОДНЫЙ';

    case MOTOR_BOAT = 'ЛОДКА МОТОРНАЯ';

    case MINI_TRACTOR = 'МИНИ-ТРАКТОР';

    case CAR_TRAILER = 'ПРИЦЕП АВТОМОБИЛЬНЫЙ';

    case AUDIO_EQUIPMENT = 'АУДИОТЕХНИКА';

    case MUSIC_CENTERS = 'МУЗЫКАЛЬНЫЕ ЦЕНТРЫ';

    case RELATED_AV_PRODUCTS = 'СОПУТСТВУЮЩИЕ АВ ТОВАРЫ';

    case WASHING_MACHINES = 'СТИРАЛЬНЫЕ МАШИНЫ';

    case REFRIGERATORS = 'ХОЛОДИЛЬНИКИ';

    case MICROWAVE_OVEN2 = 'СВЧ ПЕЧИ';

    case FOOD_PROCESSORS = 'КУХОННЫЕ КОМБАЙНЫ';

    case AIR_CONDITIONERS = 'КОНДИЦИОНЕРЫ';

    case PLUMBING_EQUIPMENT = 'САНТЕХНИЧЕСКОЕ ОБОРУДОВАНИЕ';

    case UPHOLSTERED_FURNITURE_INCLUDING_SOFAS_SOFAS_CHAIRS = 'МЯГКАЯ МЕБЕЛЬ (В Т.Ч. ДИВАНЫ, СОФЫ, КРЕСЛА)';

    case SAFES = 'СЕЙФЫ';

    case RACKS_STANDS_BRACKETS = 'СТОЙКИ, ПОДСТАВКИ, КРОНШТЕЙНЫ';

    case CABINETS_DRESSERS = 'ШКАФЫ, КОМОДЫ';

    case TABLES_CHAIRS = 'СТОЛЫ, СТУЛЬЯ';

    case FIREPLACES_AND_STOVES = 'КАМИНЫ И ПЕЧИ';

    case CURTAINS_CORNICES_BLINDS = 'ШТОРЫ, КАРНИЗЫ, ЖАЛЮЗИ';

    case LIGHTING = 'ОСВЕТИТЕЛЬНЫЕ ПРИБОРЫ';

    case INTERIOR_ITEMS = 'ПРЕДМЕТЫ ИНТЕРЬЕРА';

    case SANITARY_FACILITIES_INCLUDING_TOILET_BASES_AND_SINKS = 'САНФАЯНС (В Т.Ч. УНИТАЗЫ И РАКОВИНЫ)';

    case HEATERS = 'ОБОГРЕВАTЕЛИ';

    case HOODS_AND_AIR_CLEANERS = 'ВЫТЯЖКИ И ВОЗДУХООЧИСТИТЕЛИ';

    case SPORTSWEAR_AND_SHOES = 'СПОРТИВНАЯ ОДЕЖДА И ОБУВЬ';

    case HABERDASHERY_AND_ACCESSORIES = 'ГАЛАНТЕРЕЯ И АКСЕССУАРЫ';

    case BAGS_BRIEFS = 'СУМКИ, ПОРТФЕЛИ';

    case COSMETIC_ACCESSORIES_AND_HYGIENE_PRODUCTS = 'КОСМЕТИЧЕСКИЕ АКСЕССУАРЫ И СРЕДСТВА ГИГИЕНЫ';

    case BED_DRESS = 'ПОСТЕЛЬНЫЕ ПРИНАДЛЕЖНОСТИ';

    case TOURIST_VACATIONS_AND_AIR_TICKETS = 'ТУРИСТИЧЕСКИЕ ПУТЕВКИ И АВИАБИЛЕТЫ';

    case MEDICINE = 'МЕДИЦИНА';

    case REPAIR = 'РЕМОНТ';

    case PLATES = 'ПЛИТЫ';

    case GAME_CONSOLES = 'ИГРОВЫЕ КОНСОЛИ';

    case OVENS = 'ДУХОВЫЕ ШКАФЫ';

    case LARGE_KITCHEN_APPLIANCES = 'КРУПНАЯ КУХОННАЯ ТЕХНИКА';

    case FREEZERS = 'МОРОЗИЛЬНИКИ';

    case MONO_BLOCKS = 'МОНОБЛОКИ';

    case PORTABLE_AV_EQUIPMENT = 'ПОРТАТИВНАЯ АВ ТЕХНИКА';

    case PROJECTORS = 'ПРОЕКТОРЫ';

    case SATELLITE_TELEVISION = 'СПУТНИКОВОЕ ТЕЛЕВИДЕНИЕ';

    case PHOTO_EQUIPMENT = 'ФОТОАППАРАТУРА';

    case CABINET_FURNITURE2 = 'КОРПУСНАЯ МЕБЕЛЬ';

    case RACKS = 'СТЕЛЛАЖИ';

    case WATER_HEATERS = 'ВОДОНАГРЕВАТЕЛИ';

    case CONSUMABLES = 'РАСХОДНЫЕ МАТЕРИАЛЫ';

    case ADVANCE_PAYMENT_FOR_SEWING = 'ПРЕДОПЛАТА ЗА ПОШИВ';

    case CAR_REPAIR = 'РЕМОНТ АВТОМОБИЛЯ';

    case CAR_SERVICE = 'АВТОУСЛУГА';

    case NETWORK_CARD = 'КАРТА СЕТЕВАЯ';

    case EXTRA_SERVICE_CARD = 'КАРТА ЕКСТРА-СЕРВИС';

    case ONLINE_PURCHASE_IND8 = 'ИНТЕРНЕТ- ПОКУПКА (IND8)';

    case TABLET_COMPUTER = 'КОМПЬЮТЕР ПЛАНШЕТНЫЙ';

    case VIDEO_CAMERAS = 'ВИДЕОКАМЕРЫ';

    case ELECTRONIC_BOOK = 'КНИГА ЭЛЕКТРОННАЯ';

    case VIDEO_RECORDER = 'ВИДЕОРЕГИСТРАТОР';

    case SMARTPHONE = 'СМАРТФОН';

    case SAMSUNG = 'Samsung';

    case CROSS = 'КРЕСТ';

    case CHAIN = 'ЦЕПЬ';

    case RING = 'КОЛЬЦО';

    case BROOCH = 'БРОШЬ';

    case PIN = 'БУЛАВКА';

    case BEADS = 'БУСЫ';

    case TIE_CLAMP = 'ЗАЖИМ ДЛЯ ГАЛСТУКА';

    case CUFFLINKS = 'ЗАПОНКИ';

    case NECKLACE = 'КОЛЬЕ';

    case MEDAL = 'МЕДАЛЬ';

    case SIGNET = 'ПЕЧАТКА';

    case SUSPENSION = 'ПОДВЕСКА';

    case DINING_SET2 = 'НАБОР СТОЛОВЫЙ';

    case COIN = 'МОНЕТА';

    case APPLE_IPHONE = 'APPLE IPHONE';

    case COSMETIC_SET = 'НАБОР КОСМЕТИЧЕСКИЙ';

    case MULTICOOKER = 'МУЛЬТИВАРКА';

    case HOOBS = 'ВАРОЧНЫЕ ПАНЕЛИ';

    case MOTOR_TOWING_TRUCK = 'МОТОБУКСИРОВЩИК';

    case CABINET2 = 'БЫТОВКА';

    case SMALL_HOUSEHOLD_APPLIANCES = 'МЕЛКАЯ БЫТОВАЯ ТЕХНИКА';

    case HOME_CINEMA = 'ДОМАШНИЙ КИНОТЕАТР';

    case VIDEO_PLAYERS = 'ПРОИГРЫВАТЕЛИ ВИДЕО';

    case COSMETOLOGICAL_SERVICES = 'УСЛУГИ КОСМЕТОЛОГИЧЕСКИЕ';

    case FITNESS_CLUB_SUBSCRIPTION = 'АБОНЕМЕНТ В ФИТНЕС-КЛУБ';

    case CONSCIENCE_CARD = 'КАРТА СОВЕСТЬ';

    case ANTENNA = 'АНТЕННА';

    case SPARE_PARTS_FOR_HOUSEHOLD_APPLIANCES = 'ЗАПАСНЫЕ ЧАСТИ ДЛЯ БЫТОВОЙ ТЕХНИКИ';

    case FURNITURE_GROUP_A = 'Мебель группы А';

    case GPS_SYSTEMS = 'Системы GPS';

    case ALPHA_CARD = 'КАРТА АЛЬФА';

    case ISSUANCE_OF_CARD = 'ВЫДАЧА КАРТЫ';

    case CREDIT_CARD_EUROPE_BANK = 'КАРТА КРЕДИТ ЕВРОПА БАНК';

    case HALVA_CARD = 'КАРТА ХАЛВА';

    case PHONE_MOBILE_SAMSUNG = 'ТЕЛЕФОН МОБИЛЬНЫЙ САМСУНГ';

    case COMPUTER_TABLET_SAMSUNG = 'КОМПЬЮТЕР ПЛАНШЕТНЫЙ САМСУНГ';

    case ALL_MAPS = 'ВСЕ КАРТЫ';

    case LAND_OF_SETTLEMENTS = 'ЗЕМЛИ НАСЕЛЕННЫХ ПУНКТОВ';

    case LAND_OF_INDUSTRY = 'ЗЕМЛИ ПРОМЫШЛЕННОСТИ';

    case AGRICULTURAL_LAND = 'ЗЕМЛИ СЕЛЬСКОХОЗЯЙСТВЕННОГО НАЗНАЧЕНИЯ';

    case HOUSE_HOUSE_CONSTRUCTION = 'ДОМ / ДОМОСТРОЕНИЕ';

    case EDUCATION2 = 'ОБРАЗОВАНИЕ';

    case MTS_CARD = 'КАРТА МТС';

    case SERVICE = 'Услуга';

    case MEGAFON_SUBSCRIPTION = 'АБОНЕМЕНТ МЕГАФОН';

    case JOINERY = 'СТОЛЯРНЫЕ ИЗДЕЛИЯ';

    case WATER_SUPPLY = 'ВОДОСНАБЖЕНИЕ';

    case ELECTRICAL_GOODS = 'ЭЛЕКТРОТОВАРЫ';

    case GARDEN = 'САД';

    case HARDWARE = 'СКОБЯНЫЕ ИЗДЕЛИЯ';

    case PAINTS = 'КРАСКИ';

    case DECORATIVE_AND_FINISHING_MATERIALS = 'ДЕКОРАТИВНЫЕ И ОТДЕЛОЧНЫЕ МАТЕРИАЛЫ';

    case LIGHTING2 = 'ОСВЕЩЕНИЕ';

    case STORAGE = 'ХРАНЕНИЕ';

    case SERVICES = 'УСЛУГИ';

    case SERVICE_MAINTENANCE = 'СЕРВИСНОЕ ОБСЛУЖИВАНИЕ';

    case CHAINSAW = 'БЕНЗОПИЛА';

    case MOTOBLOCK = 'МОТОБЛОК';

    case SAMSUNG_SMARTPHONE = 'Смартфон Samsung';

    case BATH2 = 'БАНЯ';

    case FRAME_BATH = 'КАРКАСНАЯ БАНЯ';

    case SERVICE_CARD = 'СЕРВИСНАЯ КАРТА';

    case STORAGE_ROOM = 'КЛАДОВОЕ ПОМЕЩЕНИЕ ';

    case PARKING_PLACE = 'МАШИНОМЕСТО ';

    case REPAIR_FROM_THE_DEVELOPER = 'РЕМОНТ ОТ ЗАСТРОЙЩИКА ';

    case LAND = 'ЗЕМЕЛЬНЫЙ УЧАСТОК';

    case ELECTRIC_SCOOTER = 'ЭЛЕКТРОСАМОКАТ';

    case HYROSCOOTER = 'ГИРОСКУТЕР';

    case STERIO_SYSTEMS = 'СТЕРИО-СИСТЕМЫ';

    case COURSE_OF_STUDY = 'КУРС ОБУЧЕНИЯ';

    case SEGWAY = 'СЕГВЕЙ';

    case ELECTROMOPED = 'ЭЛЕКТРОМОПЕД';

    case ELECTRIC_GAS_PLATES = 'ЭЛЕКТР./ГАЗ. ПЛИТЫ';
}
