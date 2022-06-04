<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

/**
 * Számla fejléc adatai.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class InvoiceHeadType extends BaseType
{
    /**
     * @var SupplierInfoType Számla kibocsátó (eladó) adatai.
     */
    public SupplierInfoType $supplierInfo;

    /**
     * @var ?CustomerInfoType Vevő adatai.
     */
    public ?CustomerInfoType $customerInfo = null;

    /**
     * @var ?FiscalRepresentativeType Pénzügyi képviselő adatai.
     */
    public ?FiscalRepresentativeType $fiscalRepresentativeInfo = null;

    /**
     * @var InvoiceDetailType Számla részletező adatok.
     */
    public InvoiceDetailType $invoiceDetail;
}
