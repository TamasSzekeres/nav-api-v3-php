# Nav Online Számla V3 PHP-Kliens

Api-kliens komponens Nav Api használatához.

## Telepítés

Composer használatával:

``` bash
$ composer require light-side-software/nav-api-v3-php
```

## Használat

``` php
use LightSideSoftware/NavApi/V3/Client;

$client = new Client([
    'login' => 'xxxxxxxxxxxxxxx',
    'password' => 'xxxxxxxxxxxxxxx',
    'xmlSignKey' => 'xx-xxxx-xxxxxxxxxxxxxxxxxxxxxxxx',
    'taxNumber' => 'xxxxxxxx',
]);

$response = $client->tokenExchange(...);
```

## Változásnapló

A legutóbbi változások megtalálhatók [CHANGELOG](CHANGELOG.md) fájlban.

## Tesztelés

``` bash
$ composer test
```

## Kódolási stílus javítás

A kódolási stílusbeli hibák javíthatók a `composer cs-fix` paranccsal, vagy ellenőrizhetők a kód módosítása nélkül
a `composer cs-check` paranccsal.

## Közreműködtek

- [szekerest][link-author]

[link-author]: https://github.com/TamasSzekeres
