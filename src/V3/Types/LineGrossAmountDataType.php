<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\FloatValidation;

/**
 * Tétel bruttó adatok.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class LineGrossAmountDataType extends BaseType
{
    /**
     * @var float Tétel bruttó értéke a számla pénznemében. ÁFA tartalmú különbözeti adózás esetén az ellenérték.
     */
    #[FloatValidation(totalDigits: 18, fractionDigits: 2)]
    public float $lineGrossAmountNormal;

    /**
     * @var float Tétel bruttó értéke forintban.
     */
    #[FloatValidation(totalDigits: 18, fractionDigits: 2)]
    public float $lineGrossAmountNormalHUF;
}
