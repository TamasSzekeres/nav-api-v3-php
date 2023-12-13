<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\AccessorOrder;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use LightSideSoftware\NavApi\V3\Types\Annotations\ArrayValidation;

/**
 * Egy számla vagy módosító okirat adatai.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[AccessorOrder(
    order: 'custom',
    custom: [
        'invoiceReference',
        'invoiceHead',
        'invoiceLines',
        'productFeeSummaries',
        'invoiceSummary',
    ],
)]
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
         * @var array<int, ProductFeeSummaryType> Termékdíjjal kapcsolatos összesítő adatok.
         */
        #[ArrayValidation(maxItems: 2, itemType: ProductFeeSummaryType::class)]
        #[SkipWhenEmpty]
        #[Type('array<LightSideSoftware\NavApi\V3\Types\ProductFeeSummaryType>')]
        #[XmlList(entry: 'productFeeSummary', inline: true)]
        public array $productFeeSummaries = [],
    ) {
        parent::__construct();
    }
}
