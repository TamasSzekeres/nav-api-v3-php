<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\FloatValidation;

/**
 * Adott adómértékhez tartozó nettó adatok.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class VatRateNetDataType extends BaseType
{
    /**
     * @var float Az adott adómértékhez tartozó értékesítés vagy szolgáltatásnyújtás nettó összege a számla pénznemében.
     */
    #[FloatValidation(totalDigits: 18, fractionDigits: 2)]
    public float $vatRateNetAmount;

    /**
     * @var float Az adott adómértékhez tartozó értékesítés vagy szolgáltatásnyújtás nettó összege forintban.
     */
    #[FloatValidation(totalDigits: 18, fractionDigits: 2)]
    public float $vatRateNetAmountHUF;
}
