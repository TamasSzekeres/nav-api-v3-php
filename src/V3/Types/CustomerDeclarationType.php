<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use LightSideSoftware\NavApi\V3\Types\Annotations\QuantityTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\ProductStreamType;

/**
 * Ha az eladó a vevő nyilatkozata alapján mentesül a termékdíj megfizetése alól, akkor az érintett termékáram.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class CustomerDeclarationType extends BaseType
{
    public function __construct(
        /**
         * @var ProductStreamType Termékáram.
         */
        #[Type("Enum<'LightSideSoftware\NavApi\V3\Types\Enums\ProductStreamType'>")]
        public ProductStreamType $productStream,

        /**
         * @var ?float Termékdíj köteles termék tömege kilogrammban.
         */
        #[SkipWhenEmpty]
        #[QuantityTypeValidation]
        public ?float $productFeeWeight = null,
    ) {
        parent::__construct();
    }
}
