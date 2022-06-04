<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

/**
 * Számlaadatok leírására szolgáló közös típus.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class InvoiceMainType extends BaseType
{
    /**
     * @var InvoiceType Egy számla vagy módosító okirat adatai.
     */
    public InvoiceType $invoice;

    /**
     * @var ?BatchInvoiceType Kötegelt módosító okirat adatai.
     */
    public ?BatchInvoiceType $batchInvoice = null;
}
