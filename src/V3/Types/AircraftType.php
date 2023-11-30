<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\FloatValidation;

/**
 * Légi közlekedési eszköz.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class AircraftType extends BaseType
{
    public function __construct(
        /**
         * @var float Felszállási tömeg kilogrammban.
         */
        #[FloatValidation(totalDigits: 22, fractionDigits: 10)]
        public float $takeOffWeight,

        /**
         * @var bool Értéke true ha a jármű az ÁFA tv. 259.§ 25. c) szerinti kivétel alá tartozik.
         */
        public bool $airCargo,

        /**
         * @var float Repült órák száma.
         */
        #[FloatValidation(totalDigits: 22, fractionDigits: 10)]
        public float $operationHours,
    ) {
        parent::__construct();
    }
}
