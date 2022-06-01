<?php

declare(strict_types=1);

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
    public SimpleAddressType $simpleAddress;

    /**
     * @var DetailedAddressType Részletes cím.
     */
    public DetailedAddressType $detailedAddress;
}
