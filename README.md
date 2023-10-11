# B2PosSoapClient

Клиент для интеграции с сервисом https://pos-credit.ru/

## Установка

Минимальная версия PHP: 8.1

1. Запустите команду ```composer require vanta/b2pos-soap-client```
2. Установите psr совместимый клиент

## Особенности работы с клиентом

1. Сервис работает только с 1 валютой - RUB
2. В параметр конструктора Money передаем суммы в копейках

## Пример использования:

```php
<?php

declare(strict_types=1);

$psr18Client = new Psr18Client();
$soapClientBuilder = SoapClientBuilder::create($psr18Client, 'yourUserId', 'yourUserToken');

$request = new NewLoanApplicationRequestShort(
    userInn: '123456789012',
    lastname: 'clientLastName',
    firstname: 'clientFirstName',
    secondname: 'clientSecondName',
    phoneNumber: PhoneNumber::parse('+79611234567'),
    comment: 'someComment',
    firstPaymentAmount: new MoneyPositiveOrZero('15000000'),
    russianPassportDocument: new RussianPassportDocument(
         new RussianPassportSeries('1234'),
         new RussianPassportNumber('123456'),
    ),
    loanPeriodInMonths: 10,
    requestId:'someRequestId',
    pointOfSaleId: '123',
    loanType: LoanTypeShort::LOAN,
    basketProducts: [new BasketProduct(
        'someBasketProductName',
        new MoneyPositiveOrZero('15000000'),
        'someBasketProductModel',
        'someBasketProductBrand',
    )],
);

$response = $soapClientBuilder
    ->createLoanApplicationClient()
    ->newLoanApplicationShort($request)
;
```
