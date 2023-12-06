<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;

/**
 * Számlalánc elem.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class InvoiceChainElementType extends BaseType
{
    public function __construct(
        /**
         * @var InvoiceChainDigestType Számlalánc kivonat adatok.
         */
        public InvoiceChainDigestType $invoiceChainDigest,

        /**
         * @var ?InvoiceLinesType A számlán vagy módosító okiraton szereplő tételek kivonatos adatai.
         */
        #[SkipWhenEmpty]
        public ?InvoiceLinesType $invoiceLines = null,

        /**
         * @var ?InvoiceReferenceDataType A módosítás vagy érvénytelenítés adatai.
         */
        #[SkipWhenEmpty]
        public ?InvoiceReferenceDataType $invoiceReferenceData = null,
    ) {
        parent::__construct();
    }
}
