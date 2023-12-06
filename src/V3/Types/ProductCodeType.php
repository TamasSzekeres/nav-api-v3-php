<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use LightSideSoftware\NavApi\V3\Types\Annotations\ProductCodeValueTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText255NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\ProductCodeCategoryType;

/**
 * Különböző termék- vagy szolgáltatáskódokat tartalmazó típus.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class ProductCodeType extends BaseType
{
    /**
     * @var ?string A termékkód értéke nem saját termékkód esetén.
     */
    #[ProductCodeValueTypeValidation]
    #[SkipWhenEmpty]
    public ?string $productCodeValue;

    /**
     * @var ?string Saját termékkód értéke.
     */
    #[SimpleText255NotBlankTypeValidation]
    #[SkipWhenEmpty]
    public ?string $productCodeOwnValue;

    public function __construct(
        /**
         * @var ProductCodeCategoryType A termékkód fajtájának (pl. VTSZ, CsK, stb.) jelölése.
         */
        public ProductCodeCategoryType $productCodeCategory,

        string $productCodeValue
    ) {
        $productCodeValueValidation = new ProductCodeValueTypeValidation();
        $errors = $productCodeValueValidation->validateProperty('productCodeValue', $productCodeValue);
        if (! $errors->hasErrors()) {
            $this->productCodeValue = $productCodeValue;
            $this->productCodeOwnValue = null;
        } else {
            $this->productCodeValue = null;
            $this->productCodeOwnValue = $productCodeValue;
        }

        parent::__construct();
    }
}
