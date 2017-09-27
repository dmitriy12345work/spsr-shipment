# SPSR PHP WRAPPER

This project aims to provide a PHP wrapper for [SPSR API](http://www.spsr.ru/en/).

## Installation

The preferred way to install is through [composer](http://getcomposer.org/download/).

Either run

```
composer require "stp/spsr-shipment *"
```

or add

```json
{
    "require": {
        "stp/spsr-shipment": "*"
    }
}
```

to the require section of your composer.json.


## Usage

### Constructing the Client

```php
use stp\spsr\SpsrApi;

$api = new SpsrApi($login, $password, $icn);
```

### Create request
Every API method has the same variable name as in official documentation.

```php

use stp\spsr\message\GetCitiesMessage,
    stp\spsr\response\City;

$msg = new GetCitiesMessage();
$msg->CityName = 'Москва';

/** @var City[] $cities */
$cities = $api->request($msg);
```

For more information, see [USAGE.md](USAGE.md)

## Implemented API Methods

- [x] [Tariff Calculation](message/TariffMessage.php)
- [x] [WACreateOrder](message/CreateOrderMessage.php)
- [x] [WAXmlConverter](message/InvoiceMessage.php)
- [x] [WAGetInvoiceInfo 1.1](message/GetInvoiceInfoMessage.php)
- [x] [WAMonitorInvoiceInfo 1.3](message/MonitorInvoiceInfoMessage.php)
- [x] [WABindOrderToInvoice](message/BindOrderToInvoiceMessage.php)
- [x] [WAGetActiveOrders](message/GetActiveOrdersMessage.php)
- [x] [WAGetAddress](message/GetAddressMessage.php)
- [x] [WAGetCities](message/GetCitiesMessage.php)
- [ ] WANewInvoicesByFile
- [ ] WAInvSessionInfo
- [ ] WAGetExtMon
- [x] [WAGetServices](message/GetServicesMessage.php)
- [ ] WAGetStreet
- [ ] WAGetEncloseType
- [x] [WAAddAddress](message/AddAddressMessage.php)
- [ ] WAEditAddress
- [x] [WADelAddress](message/DelAddressMessage.php)
- [ ] WAGetOrders
- [ ] WACancelOrder
- [ ] WACheckGetQuotaByAddress
- [ ] WAReservQuota
- [ ] WAReservQuotaDelete


## Pull requests are very welcome!

Documentation russian:
[SPSR.WebApi.IntegrationDocs.v.1.3.38.zip](http://www.filehosting.org/file/details/696061/SPSR.WebApi.IntegrationDocs.v.1.3.38.zip)
Documentation english:
[SPSR.WebApi.IntegrationDocs.v.1.3.38Eng.zip](http://www.filehosting.org/file/details/696060/SPSR.WebApi.IntegrationDocs.v.1.3.38Eng.zip)
