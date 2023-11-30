<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\FloatValidation;

/**
 * A számla összesítő bruttó adatai.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class SummaryGrossDataType extends BaseType
{
    public function __construct(
        /**
         * @var float A számla bruttó összege a számla pénznemében.
         */
        #[FloatValidation(totalDigits: 18, fractionDigits: 2)]
        public float $invoiceGrossAmount,

        /**
         * @var float A számla bruttó összege forintban.
         */
        #[FloatValidation(totalDigits: 18, fractionDigits: 2)]
        public float $invoiceGrossAmountHUF,
    ) {
        parent::__construct();
    }
}
