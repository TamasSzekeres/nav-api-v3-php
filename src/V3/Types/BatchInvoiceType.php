<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceUnboundedIndexTypeValidation;

/**
 * Kötegelt módosító okirat adatai.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
readonly final class BatchInvoiceType extends BaseType
{
    public function __construct(
        /**
         * @var int A módosító okirat sorszáma a kötegen belül.
         */
        #[InvoiceUnboundedIndexTypeValidation]
        public int $batchIndex,

        /**
         * @var InvoiceType Egy számla vagy módosító okirat adatai.
         */
        public InvoiceType $invoice,
    ) {
        parent::__construct();
    }
}
