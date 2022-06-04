<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\FloatValidation;

/**
 * Tétel ÁFA adatok.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class LineVatDataType extends BaseType
{
    /**
     * @var float Tétel ÁFA összege a számla pénznemében.
     */
    #[FloatValidation(totalDigits: 18, fractionDigits: 2)]
    public float $lineVatAmount;

    /**
     * @var float Tétel ÁFA összege forintban.
     */
    #[FloatValidation(totalDigits: 18, fractionDigits: 2)]
    public float $lineVatAmountHUF;
}
