<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

/**
 * Adószám típus.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class TaxNumberType extends BaseType
{
    /**
     * @var string Az adóalany adó törzsszáma. Csoportos adóalany esetén csoportazonosító szám.
     */
    public string $taxpayerId;

    /**
     * @var string ÁFA kód az adóalanyiság típusának jelzésére. Egy számjegy.
     */
    public ?string $vatCode;

    /**
     * @var string Megyekód, két számjegy.
     */
    public ?string $countyCode;
}
