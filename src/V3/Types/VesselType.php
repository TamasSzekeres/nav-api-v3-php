<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\QuantityTypeValidation;

/**
 * Vízi jármű adatai.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class VesselType extends BaseType
{
    public function __construct(
        /**
         * @var float Hajó hossza méterben.
         */
        #[QuantityTypeValidation]
        public float $length,

        /**
         * @var bool Értéke true, ha a jármű az ÁFA tv. 259.§ 25. b) szerinti kivétel alá tartozik.
         */
        public bool $activityReferred,

        /**
         * @var float Hajózott órák száma.
         */
        #[QuantityTypeValidation]
        public float $sailedHours,
    ) {
        parent::__construct();
    }
}
