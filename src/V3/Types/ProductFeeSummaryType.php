<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use LightSideSoftware\NavApi\V3\Types\Annotations\ArrayValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\MonetaryTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\ProductFeeOperationType;

/**
 * Termékdíj összegzés adatok.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class ProductFeeSummaryType extends BaseType
{
    public function __construct(
        /**
         * @var ProductFeeOperationType Annak jelzése, hogy a termékdíj összesítés visszaigénylésre (REFUND)
         * vagy raktárba történő beszállításra (DEPOSIT) vonatkozik.
         */
        public ProductFeeOperationType $productFeeOperation,

        /**
         * @var array<int, ProductFeeDataType> Termékdíj adatok.
         */
        #[ArrayValidation(minItems: 1, itemType: ProductFeeDataType::class)]
        #[Type('array<LightSideSoftware\NavApi\V3\Types\ProductFeeDataType>')]
        #[XmlList(entry: 'productFeeData', inline: true)]
        public array $productFeeData,

        /**
         * @var float Termékdíj összesen.
         */
        #[MonetaryTypeValidation]
        public float $productChargeSum,

        /**
         * @var ?PaymentEvidenceDocumentDataType A termékdíj bevallását igazoló dokumentum adatai
         * a 2011. évi LXXXV. tv. 13. § (3) szerint és a 25. § (3) szerint.
         */
        #[SkipWhenEmpty]
        public ?PaymentEvidenceDocumentDataType $paymentEvidenceDocumentData = null,
    ) {
        parent::__construct();
    }
}
