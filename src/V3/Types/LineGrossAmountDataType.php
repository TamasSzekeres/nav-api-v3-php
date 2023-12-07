<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\MonetaryTypeValidation;

/**
 * Tétel bruttó adatok.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class LineGrossAmountDataType extends BaseType
{
    public function __construct(
        /**
         * @var float Tétel bruttó értéke a számla pénznemében. ÁFA tartalmú különbözeti adózás esetén az ellenérték.
         */
        #[MonetaryTypeValidation]
        public float $lineGrossAmountNormal,

        /**
         * @var float Tétel bruttó értéke forintban.
         */
        #[MonetaryTypeValidation]
        public float $lineGrossAmountNormalHUF,
    ) {
        parent::__construct();
    }
}
