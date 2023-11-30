<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

/**
 * Cím típus, amely vagy egyszerű, vagy részletes címet tartalmaz.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class AddressType extends BaseType
{
    public function __construct(
        /**
         * @var SimpleAddressType Egyszerű cím.
         */
        public SimpleAddressType $simpleAddress,

        /**
         * @var DetailedAddressType Részletes cím.
         */
        public DetailedAddressType $detailedAddress,
    ) {
        parent::__construct();
    }
}
