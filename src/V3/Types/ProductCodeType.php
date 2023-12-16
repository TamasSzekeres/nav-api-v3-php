<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use InvalidArgumentException;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\XmlElement;
use LightSideSoftware\NavApi\V3\Types\Annotations\ProductCodeValueTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText255NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\ProductCodeCategoryType;

/**
 * Különböző termék- vagy szolgáltatáskódokat tartalmazó típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
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
        #[ProductCodeValueTypeValidation]
        #[SkipWhenEmpty]
        #[XmlElement(cdata: false)]
        public ?string $productCodeValue = null,

        /**
         * @var ?string Saját termékkód értéke.
         */
        #[SimpleText255NotBlankTypeValidation]
        #[SkipWhenEmpty]
        #[XmlElement(cdata: false)]
        public ?string $productCodeOwnValue = null,
    ) {
        if (
            (
                is_null($this->productCodeValue)
                && is_null($this->productCodeOwnValue)
            ) || (
                is_string($this->productCodeValue)
                && is_string($this->productCodeOwnValue)
            )
        ) {
            throw new InvalidArgumentException('A "productCodeValue" és "productCodeOwnValue" paraméterek közül pontosan egyet meg kell adni.');
        }

        parent::__construct();
    }
}
