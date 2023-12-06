<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\QuantityTypeValidation;

/**
 * Szárazföldi közlekedési eszköz további adatai.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class VehicleType extends BaseType
{
    public function __construct(
        /**
         * @var float Hengerűrtartalom köbcentiméterben.
         */
        #[QuantityTypeValidation]
        public float $engineCapacity,

        /**
         * @var float Teljesítmény kW-ban.
         */
        #[QuantityTypeValidation]
        public float $enginePower,

        /**
         * @var float Futott kilométerek száma.
         */
        #[QuantityTypeValidation]
        public float $kms,
    ) {
        parent::__construct();
    }
}
