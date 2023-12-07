<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\MonetaryTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\QuantityTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\ProductFeeMeasuringUnitType;

/**
 * Termékdíj adatok.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class ProductFeeDataType extends BaseType
{
    public function __construct(
        /**
         * @var ProductCodeType Termékdíj kód (Kt vagy Csk).
         */
        public ProductCodeType $productFeeCode,

        /**
         * @var float A termékdíjjal érintett termék mennyisége.
         */
        #[QuantityTypeValidation]
        public float $productFeeQuantity,

        /**
         * @var ProductFeeMeasuringUnitType A díjtétel egysége (kg vagy darab).
         */
        public ProductFeeMeasuringUnitType $productFeeMeasuringUnit,

        /**
         * @var float A termékdíj díjtétele (HUF/egység).
         */
        #[MonetaryTypeValidation]
        public float $productFeeRate,

        /**
         * @var float Termékdíj összege forintban.
         */
        #[MonetaryTypeValidation]
        public float $productFeeAmount,
    ) {
        parent::__construct();
    }
}
