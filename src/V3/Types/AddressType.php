<?php

namespace LightSideSoftware\NavApi\V3\Types;

/**
 * Cím típus, amely vagy egyszerű, vagy részletes címet tartalmaz.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class AddressType extends BaseType
{
    /**
     * @var SimpleAddressType Egyszerű cím.
     */
    public $simpleAddress;

    /**
     * @var DetailedAddressType Részletes cím.
     */
    public $detailedAddress;
}
