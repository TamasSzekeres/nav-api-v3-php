<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\FloatValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\StringValidation;

/**
 * Adóalap és felszámított adó eltérésének adatai.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class VatAmountMismatchType extends BaseType
{
    /**
     * @var float Adómérték, adótartalom.
     */
    #[FloatValidation(minInclusive: 0, maxInclusive: 1, totalDigits: 5, fractionDigits: 4)]
    public float $vatRate;

    /**
     * @var string Az eset leírása kóddal.
     */
    #[StringValidation(minLength: 1, maxLength: 50, pattern: ".*[^\s].*")]
    public string $case;
}
