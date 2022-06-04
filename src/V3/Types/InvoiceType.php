<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;

/**
 * Egy számla vagy módosító okirat adatai.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class InvoiceType extends BaseType
{
    /**
     * @var ?InvoiceReferenceType A módosítás vagy érvénytelenítés adatai.
     */
    #[SkipWhenEmpty]
    public ?InvoiceReferenceType $invoiceReference = null;

    /**
     * @var InvoiceHeadType A számla egészét jellemző adatok.
     */
    public InvoiceHeadType $invoiceHead;

    /**
     * @var ?LinesType A számlán szereplő tételek adatai.
     */
    #[SkipWhenEmpty]
    public ?LinesType $invoiceLines = null;

    /**
     * @var ?ProductFeeSummaryType Termékdíjjal kapcsolatos összesítő adatok.
     */
    public ?ProductFeeSummaryType $productFeeSummary = null;

    /**
     * @var SummaryType Az ÁFA törvény szerinti összesítő adatok.
     */
    public SummaryType $invoiceSummary;
}
