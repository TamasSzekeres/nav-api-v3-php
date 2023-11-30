<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

/**
 * Számla fejléc adatai.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class InvoiceHeadType extends BaseType
{
    public function __construct(
        /**
         * @var SupplierInfoType Számla kibocsátó (eladó) adatai.
         */
        public SupplierInfoType $supplierInfo,

        /**
         * @var InvoiceDetailType Számla részletező adatok.
         */
        public InvoiceDetailType $invoiceDetail,

        /**
         * @var ?CustomerInfoType Vevő adatai.
         */
        public ?CustomerInfoType $customerInfo = null,

        /**
         * @var ?FiscalRepresentativeType Pénzügyi képviselő adatai.
         */
        public ?FiscalRepresentativeType $fiscalRepresentativeInfo = null,
    ) {
        parent::__construct();
    }
}
