# Nav Online Számla V3 PHP-Kliens

Api-kliens komponens Nav Api használatához.

[![Build](https://github.com/TamasSzekeres/nav-api-v3-php/actions/workflows/action.yml/badge.svg?branch=master&event=push)](https://github.com/TamasSzekeres/nav-api-v3-php/actions/workflows/action.yml)
[![Test Coverage](https://raw.githubusercontent.com/Hi-Folks/array/main/badge-coverage.svg)](https://packagist.org/packages/hi-folks/array)

## Telepítés

Composer használatával:

``` bash
composer require light-side-software/nav-api-v3-php
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
composer test
```

## Közreműködtek

- [Szekeres Tamás][link-author]

[link-author]: https://github.com/TamasSzekeres
