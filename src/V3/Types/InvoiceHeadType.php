<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;

/**
 * Számla fejléc adatai.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
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
        #[SkipWhenEmpty]
        public ?CustomerInfoType $customerInfo = null,

        /**
         * @var ?FiscalRepresentativeType Pénzügyi képviselő adatai.
         */
        #[SkipWhenEmpty]
        public ?FiscalRepresentativeType $fiscalRepresentativeInfo = null,
    ) {
        parent::__construct();
    }
}
