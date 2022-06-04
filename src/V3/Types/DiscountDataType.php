<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use LightSideSoftware\NavApi\V3\Types\Annotations\FloatValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\StringValidation;

/**
 * Árengedmény adatok.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class DiscountDataType extends BaseType
{
    /**
     * @var ?string Az árengedmény leírása.
     */
    #[SkipWhenEmpty]
    #[StringValidation(minLength: 1, maxLength: 255, pattern: ".*[^\s].*")]
    public ?string $discountDescription = null;

    /**
     * @var ?float Tételhez tartozó árengedmény összege a számla pénznemében, ha az egységár nem tartalmazza.
     */
    #[FloatValidation(totalDigits: 18, fractionDigits: 2)]
    #[SkipWhenEmpty]
    public ?float $discountValue = null;

    /**
     * @var ?float Tételhez tartozó árengedmény aránya, ha az egységár nem tartalmazza.
     */
    #[FloatValidation(maxExclusive: 1, minInclusive: 0, totalDigits: 5, fractionDigits: 4)]
    #[SkipWhenEmpty]
    public ?float $discountRate = null;
}
