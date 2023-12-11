<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\XmlElement;

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
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public InvoiceChainDigestType $invoiceChainDigest,

        /**
         * @var ?InvoiceLinesType A számlán vagy módosító okiraton szereplő tételek kivonatos adatai.
         */
        #[SkipWhenEmpty]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?InvoiceLinesType $invoiceLines = null,

        /**
         * @var ?InvoiceReferenceDataType A módosítás vagy érvénytelenítés adatai.
         */
        #[SkipWhenEmpty]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?InvoiceReferenceDataType $invoiceReferenceData = null,
    ) {
        parent::__construct();
    }
}
