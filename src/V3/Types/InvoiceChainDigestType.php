<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use DateTimeImmutable;
use JMS\Serializer\Annotation\AccessorOrder;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceTimestampTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceUnboundedIndexTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText50NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\TaxPayerIdTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\ManageInvoiceOperationType;
use LightSideSoftware\NavApi\V3\Types\Enums\OriginalRequestVersionType;

/**
 * Számlalánc kivonat adatok.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[AccessorOrder(
    order: 'custom',
    custom: [
        'invoiceNumber',
        'batchIndex',
        'invoiceOperation',
        'supplierTaxNumber',
        'customerTaxNumber',
        'insDate',
        'originalRequestVersion',
    ],
)]
final readonly class InvoiceChainDigestType extends BaseType
{
    public function __construct(
        /**
         * @var string Számla vagy módosító okirat sorszáma - ÁFA tv. 169. § b) vagy 170. § (1) bek. b) pont.
         */
        #[SimpleText50NotBlankTypeValidation]
        #[XmlElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public string $invoiceNumber,

        /**
         * @var ManageInvoiceOperationType Számlaművelet típus.
         */
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ManageInvoiceOperationType $invoiceOperation,

        /**
         * @var string A kibocsátó adószáma.
         */
        #[TaxPayerIdTypeValidation]
        #[XmlElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public string $supplierTaxNumber,

        /**
         * @var DateTimeImmutable A beszúrás időpontja UTC időben.
         */
        #[InvoiceTimestampTypeValidation]
        #[Type("DateTimeImmutable<'Y-m-d\TH:i:s.v\Z'>")]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public DateTimeImmutable $insDate,

        /**
         * @var OriginalRequestVersionType Az adatszolgáltatás requestVersion értéke.
         */
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public OriginalRequestVersionType $originalRequestVersion,

        /**
         * @var ?int A módosító okirat sorszáma a kötegen belül.
         */
        #[InvoiceUnboundedIndexTypeValidation]
        #[SkipWhenEmpty]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?int $batchIndex = null,

        /**
         * @var ?string A vevő adószáma.
         */
        #[SkipWhenEmpty]
        #[TaxPayerIdTypeValidation]
        #[XmlElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?string $customerTaxNumber = null,
    ) {
        parent::__construct();
    }
}
