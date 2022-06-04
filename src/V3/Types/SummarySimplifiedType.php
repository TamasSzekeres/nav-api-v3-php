<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\FloatValidation;

/**
 * Egyszerűsített számla összesítés.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class SummarySimplifiedType extends BaseType
{
    /**
     * @var VatRateType Adómérték vagy adómentesség jelölése.
     */
    public VatRateType $vatRate;

    /**
     * @var float Az adott adótartalomhoz tartozó értékesítés vagy szolgáltatásnyújtás bruttó összege a számla pénznemében.
     */
    #[FloatValidation(totalDigits: 18, fractionDigits: 2)]
    public float $vatContentGrossAmount;

    /**
     * @var float Az adott adótartalomhoz tartozó értékesítés vagy szolgáltatásnyújtás bruttó összege forintban.
     */
    #[FloatValidation(totalDigits: 18, fractionDigits: 2)]
    public float $vatContentGrossAmountHUF;
}
