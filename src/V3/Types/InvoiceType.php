<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;

/**
 * Egy számla vagy módosító okirat adatai.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class InvoiceType extends BaseType
{
    public function __construct(
        /**
         * @var InvoiceHeadType A számla egészét jellemző adatok.
         */
        public InvoiceHeadType $invoiceHead,

        /**
         * @var SummaryType Az ÁFA törvény szerinti összesítő adatok.
         */
        public SummaryType $invoiceSummary,

        /**
         * @var ?InvoiceReferenceType A módosítás vagy érvénytelenítés adatai.
         */
        #[SkipWhenEmpty]
        public ?InvoiceReferenceType $invoiceReference = null,

        /**
         * @var ?LinesType A számlán szereplő tételek adatai.
         */
        #[SkipWhenEmpty]
        public ?LinesType $invoiceLines = null,

        /**
         * @var ?ProductFeeSummaryType Termékdíjjal kapcsolatos összesítő adatok.
         */
        #[SkipWhenEmpty]
        public ?ProductFeeSummaryType $productFeeSummary = null,
    ) {
        parent::__construct();
    }
}
