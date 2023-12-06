<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\MonetaryTypeValidation;

/**
 * Tétel nettó adatok.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class LineNetAmountDataType extends BaseType
{
    public function __construct(
        /**
         * @var float Tétel nettó összege a számla pénznemében.
         * ÁFA tartalmú különbözeti adózás esetén az ellenérték áfa összegével csökkentett értéke a számla pénznemében.
         */
        #[MonetaryTypeValidation]
        public float $lineNetAmount,

        /**
         * @var float Tétel nettó összege forintban.
         * ÁFA tartalmú különbözeti adózás esetén az ellenérték áfa összegével csökkentett értéke forintban.
         */
        #[MonetaryTypeValidation]
        public float $lineNetAmountHUF,
    ) {
        parent::__construct();
    }
}
