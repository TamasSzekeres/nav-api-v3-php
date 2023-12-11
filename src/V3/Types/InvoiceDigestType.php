<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use DateTimeImmutable;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use LightSideSoftware\NavApi\V3\Types\Annotations\CurrencyTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\EntityIdTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceDateTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceIndexTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceTimestampTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceUnboundedIndexTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\MonetaryTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText50NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText512NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\TaxPayerIdTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\InvoiceAppearanceType;
use LightSideSoftware\NavApi\V3\Types\Enums\InvoiceCategoryType;
use LightSideSoftware\NavApi\V3\Types\Enums\ManageInvoiceOperationType;
use LightSideSoftware\NavApi\V3\Types\Enums\PaymentMethodType;
use LightSideSoftware\NavApi\V3\Types\Enums\SourceType;

/**
 * Kivonatos lekérdezési eredmény.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class InvoiceDigestType extends BaseType
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
         * @var InvoiceCategoryType A számla típusa.
         */
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public InvoiceCategoryType $invoiceCategory,

        /**
         * @var DateTimeImmutable Számla vagy módosító okirat kiállításának dátuma.
         */
        #[InvoiceDateTypeValidation]
        #[Type("DateTimeImmutable<'Y-m-d'>")]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public DateTimeImmutable $invoiceIssueDate,

        /**
         * @var string A kibocsátó adószáma.
         */
        #[TaxPayerIdTypeValidation]
        #[XmlElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public string $supplierTaxNumber,

        /**
         * @var string Az eladó (szállító) neve.
         */
        #[SimpleText512NotBlankTypeValidation]
        #[XmlElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public string $supplierName,

        /**
         * @var DateTimeImmutable A beszúrás időpontja UTC időben.
         */
        #[InvoiceTimestampTypeValidation]
        #[Type("DateTimeImmutable<'Y-m-d\TH:i:s.v\Z'>")]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public DateTimeImmutable $insDate,

        /**
         * @var ?int A módosító okirat sorszáma a kötegen belül.
         */
        #[InvoiceUnboundedIndexTypeValidation]
        #[SkipWhenEmpty]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?int $batchIndex = null,

        /**
         * @var ?string A kibocsátó csoporttag száma.
         */
        #[SkipWhenEmpty]
        #[TaxPayerIdTypeValidation]
        #[XmlElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?string $supplierGroupMemberTaxNumber = null,

        /**
         * @var ?string A vevő adószáma.
         */
        #[SkipWhenEmpty]
        #[TaxPayerIdTypeValidation]
        #[XmlElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?string $customerTaxNumber = null,

        /**
         * @var ?string A vevő csoporttag száma.
         */
        #[SkipWhenEmpty]
        #[TaxPayerIdTypeValidation]
        #[XmlElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?string $customerGroupMemberTaxNumber = null,

        /**
         * @var ?string A vevő neve
         */
        #[SimpleText512NotBlankTypeValidation]
        #[SkipWhenEmpty]
        #[XmlElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?string $customerName = null,

        /**
         * @var ?PaymentMethodType Fizetés módja.
         */
        #[SkipWhenEmpty]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?PaymentMethodType $paymentMethod = null,

        /**
         * @var ?DateTimeImmutable Fizetési határidő.
         */
        #[InvoiceDateTypeValidation]
        #[SkipWhenEmpty]
        #[Type("DateTimeImmutable<'Y-m-d'>")]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?DateTimeImmutable $paymentDate = null,

        /**
         * @var ?InvoiceAppearanceType A számla megjelenési formája.
         */
        #[SkipWhenEmpty]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?InvoiceAppearanceType $invoiceAppearance = null,

        /**
         * @var ?SourceType Az adatszolgáltatás forrása.
         */
        #[SkipWhenEmpty]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?SourceType $source = null,

        /**
         * @var ?DateTimeImmutable Számla teljesítési dátuma.
         */
        #[InvoiceDateTypeValidation]
        #[SkipWhenEmpty]
        #[Type("DateTimeImmutable<'Y-m-d'>")]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?DateTimeImmutable $invoiceDeliveryDate = null,

        /**
         * @var ?string A számla pénzneme.
         */
        #[CurrencyTypeValidation]
        #[SkipWhenEmpty]
        #[XmlElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?string $currency = null,

        /**
         * @var ?float A számla nettó összege a számla pénznemében.
         */
        #[MonetaryTypeValidation]
        #[SkipWhenEmpty]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?float $invoiceNetAmount = null,

        /**
         * @var ?float A számla nettó összege forintban.
         */
        #[MonetaryTypeValidation]
        #[SkipWhenEmpty]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?float $invoiceNetAmountHUF = null,

        /**
         * @var ?float A számla ÁFA összege a számla pénznemében.
         */
        #[MonetaryTypeValidation]
        #[SkipWhenEmpty]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?float $invoiceVatAmount = null,

        /**
         * @var ?float A számla ÁFA összege forintban.
         */
        #[MonetaryTypeValidation]
        #[SkipWhenEmpty]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?float $invoiceVatAmountHUF = null,

        /**
         * @var ?string Az adatszolgáltatás tranzakció azonosítója.
         */
        #[EntityIdTypeValidation]
        #[SkipWhenEmpty]
        #[XmlElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?string $transactionId = null,

        /**
         * @var ?int A számla sorszáma a kérésen belül.
         */
        #[InvoiceIndexTypeValidation]
        #[SkipWhenEmpty]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?int $index = null,

        /**
         * @var ?string Az eredeti számla sorszáma, melyre a módosítás vonatkozik.
         */
        #[SimpleText50NotBlankTypeValidation]
        #[SkipWhenEmpty]
        #[XmlElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?string $originalInvoiceNumber = null,

        /**
         * @var ?int A számlára vonatkozó módosító okirat egyedi sorszáma.
         */
        #[InvoiceUnboundedIndexTypeValidation]
        #[SkipWhenEmpty]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?int $modificationIndex = null,

        /**
         * @var ?bool Jelöli, ha az adatszolgáltatás maga a számla (a számlán nem szerepel több adat)
         */
        #[SkipWhenEmpty]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?bool $completenessIndicator = null,
    ) {
        parent::__construct();
    }
}
