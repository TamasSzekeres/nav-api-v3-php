<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\FloatValidation;

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
        #[FloatValidation(totalDigits: 22, fractionDigits: 10)]
        public float $engineCapacity,

        /**
         * @var float Teljesítmény kW-ban.
         */
        #[FloatValidation(totalDigits: 22, fractionDigits: 10)]
        public float $enginePower,

        /**
         * @var float Futott kilométerek száma.
         */
        #[FloatValidation(totalDigits: 22, fractionDigits: 10)]
        public float $kms,
    ) {
        parent::__construct();
    }
}
