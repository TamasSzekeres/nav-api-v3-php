<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\MonetaryTypeValidation;

/**
 * A számla összesítő bruttó adatai.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class SummaryGrossDataType extends BaseType
{
    public function __construct(
        /**
         * @var float A számla bruttó összege a számla pénznemében.
         */
        #[MonetaryTypeValidation]
        public float $invoiceGrossAmount,

        /**
         * @var float A számla bruttó összege forintban.
         */
        #[MonetaryTypeValidation]
        public float $invoiceGrossAmountHUF,
    ) {
        parent::__construct();
    }
}
