<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\FloatValidation;

/**
 * Adott adómértékhez tartozó bruttó adatok.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class VatRateGrossDataType extends BaseType
{
    /**
     * @var float Az adott adómértékhez tartozó értékesítés vagy szolgáltatásnyújtás bruttó összege a számla pénznemében.
     */
    #[FloatValidation(totalDigits: 18, fractionDigits: 2)]
    public float $vatRateGrossAmount;

    /**
     * @var float Az adott adómértékhez tartozó értékesítés vagy szolgáltatásnyújtás bruttó összege forintban.
     */
    #[FloatValidation(totalDigits: 18, fractionDigits: 2)]
    public float $vatRateGrossAmountHUF;
}
