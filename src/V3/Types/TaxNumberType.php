<?php

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
    public $taxpayerId;

    /**
     * @var string ÁFA kód az adóalanyiság típusának jelzésére. Egy számjegy.
     */
    public $vatCode;

    /**
     * @var string Megyekód, két számjegy.
     */
    public $countyCode;
}
