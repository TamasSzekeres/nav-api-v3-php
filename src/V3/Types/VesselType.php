<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\FloatValidation;

/**
 * Vízi jármű adatai.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class VesselType extends BaseType
{
    public function __construct(
        /**
         * @var float Hajó hossza méterben.
         */
        #[FloatValidation(totalDigits: 22, fractionDigits: 10)]
        public float $length,

        /**
         * @var bool Értéke true, ha a jármű az ÁFA tv. 259.§ 25. b) szerinti kivétel alá tartozik.
         */
        public bool $activityReferred,

        /**
         * @var float Hajózott órák száma.
         */
        #[FloatValidation(totalDigits: 22, fractionDigits: 10)]
        public float $sailedHours,
    ) {
        parent::__construct();
    }
}
