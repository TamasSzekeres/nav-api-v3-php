<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use LightSideSoftware\NavApi\V3\Types\Annotations\MonetaryTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\RateTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText255NotBlankTypeValidation;

/**
 * Árengedmény adatok.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class DiscountDataType extends BaseType
{
    public function __construct(
        /**
         * @var ?string Az árengedmény leírása.
         */
        #[SkipWhenEmpty]
        #[SimpleText255NotBlankTypeValidation]
        public ?string $discountDescription = null,

        /**
         * @var ?float Tételhez tartozó árengedmény összege a számla pénznemében, ha az egységár nem tartalmazza.
         */
        #[MonetaryTypeValidation]
        #[SkipWhenEmpty]
        public ?float $discountValue = null,

        /**
         * @var ?float Tételhez tartozó árengedmény aránya, ha az egységár nem tartalmazza.
         */
        #[RateTypeValidation]
        #[SkipWhenEmpty]
        public ?float $discountRate = null,
    ) {
        parent::__construct();
    }
}
