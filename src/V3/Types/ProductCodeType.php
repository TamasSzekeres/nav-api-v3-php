<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use LightSideSoftware\NavApi\V3\Types\Annotations\StringValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\ProductCodeCategoryType;

/**
 * Különböző termék- vagy szolgáltatáskódokat tartalmazó típus.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class ProductCodeType extends BaseType
{
    public function __construct(
        /**
         * @var ProductCodeCategoryType A termékkód fajtájának (pl. VTSZ, CsK, stb.) jelölése.
         */
        public ProductCodeCategoryType $productCodeCategory,

        /**
         * @var ?string A termékkód értéke nem saját termékkód esetén.
         */
        #[SkipWhenEmpty]
        #[StringValidation(minLength: 2, maxLength: 30, pattern: "[A-Z0-9]{2,30}")]
        public ?string $productCodeValue = null,

        /**
         * @var ?string Saját termékkód értéke.
         */
        #[SkipWhenEmpty]
        #[StringValidation(minLength: 1, maxLength: 255, pattern: ".*[^\s].*")]
        public ?string $productCodeOwnValue = null,
    ) {
        parent::__construct();
    }
}
