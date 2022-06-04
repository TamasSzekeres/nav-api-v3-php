<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\FloatValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\ProductFeeMeasuringUnitType;

/**
 * Termékdíj adatok.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class ProductFeeDataType extends BaseType
{
    /**
     * @var ProductCodeType Termékdíj kód (Kt vagy Csk).
     */
    public ProductCodeType $productFeeCode;

    /**
     * @var float A termékdíjjal érintett termék mennyisége.
     */
    #[FloatValidation(totalDigits: 22, fractionDigits: 10)]
    public float $productFeeQuantity;

    /**
     * @var ProductFeeMeasuringUnitType A díjtétel egysége (kg vagy darab).
     */
    public ProductFeeMeasuringUnitType $productFeeMeasuringUnit;

    /**
     * @var float A termékdíj díjtétele (HUF/egység).
     */
    #[FloatValidation(totalDigits: 18, fractionDigits: 2)]
    public float $productFeeRate;

    /**
     * @var float Termékdíj összege forintban.
     */
    #[FloatValidation(totalDigits: 18, fractionDigits: 2)]
    public float $productFeeAmount;
}
