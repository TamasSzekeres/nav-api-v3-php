<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use LightSideSoftware\NavApi\V3\Types\Annotations\FloatValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\ProductFeeOperationType;

/**
 * Termékdíj összegzés adatok.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
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
         * @var ProductFeeDataType Termékdíj adatok.
         */
        public ProductFeeDataType $productFeeData,

        /**
         * @var float Termékdíj összesen.
         */
        #[FloatValidation(totalDigits: 18, fractionDigits: 2)]
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
