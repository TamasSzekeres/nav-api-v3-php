<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use DateTimeImmutable;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
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
        public string $invoiceNumber,

        /**
         * @var ManageInvoiceOperationType Számlaművelet típus.
         */
        public ManageInvoiceOperationType $invoiceOperation,

        /**
         * @var InvoiceCategoryType A számla típusa.
         */
        public InvoiceCategoryType $invoiceCategory,

        /**
         * @var DateTimeImmutable Számla vagy módosító okirat kiállításának dátuma.
         */
        #[InvoiceDateTypeValidation]
        #[Type("DateTimeImmutable<'Y-m-d'>")]
        public DateTimeImmutable $invoiceIssueDate,

        /**
         * @var string A kibocsátó adószáma.
         */
        #[TaxPayerIdTypeValidation]
        public string $supplierTaxNumber,

        /**
         * @var string Az eladó (szállító) neve.
         */
        #[SimpleText512NotBlankTypeValidation]
        public string $supplierName,

        /**
         * @var DateTimeImmutable A beszúrás időpontja UTC időben.
         */
        #[InvoiceTimestampTypeValidation]
        #[Type("DateTimeImmutable<'Y-m-d\TH:i:s.v\Z'>")]
        public DateTimeImmutable $insDate,

        /**
         * @var ?int A módosító okirat sorszáma a kötegen belül.
         */
        #[InvoiceUnboundedIndexTypeValidation]
        #[SkipWhenEmpty]
        public ?int $batchIndex = null,

        /**
         * @var ?string A kibocsátó csoporttag száma.
         */
        #[SkipWhenEmpty]
        #[TaxPayerIdTypeValidation]
        public ?string $supplierGroupMemberTaxNumber = null,

        /**
         * @var ?string A vevő adószáma.
         */
        #[SkipWhenEmpty]
        #[TaxPayerIdTypeValidation]
        public ?string $customerTaxNumber = null,

        /**
         * @var ?string A vevő csoporttag száma.
         */
        #[SkipWhenEmpty]
        #[TaxPayerIdTypeValidation]
        public ?string $customerGroupMemberTaxNumber = null,

        /**
         * @var ?string A vevő neve
         */
        #[SimpleText512NotBlankTypeValidation]
        #[SkipWhenEmpty]
        public ?string $customerName = null,

        /**
         * @var ?PaymentMethodType Fizetés módja.
         */
        #[SkipWhenEmpty]
        public ?PaymentMethodType $paymentMethod = null,

        /**
         * @var ?DateTimeImmutable Fizetési határidő.
         */
        #[InvoiceDateTypeValidation]
        #[SkipWhenEmpty]
        #[Type("DateTimeImmutable<'Y-m-d'>")]
        public ?DateTimeImmutable $paymentDate = null,

        /**
         * @var ?InvoiceAppearanceType A számla megjelenési formája.
         */
        #[SkipWhenEmpty]
        public ?InvoiceAppearanceType $invoiceAppearance = null,

        /**
         * @var ?SourceType Az adatszolgáltatás forrása.
         */
        #[SkipWhenEmpty]
        public ?SourceType $source = null,

        /**
         * @var ?DateTimeImmutable Számla teljesítési dátuma.
         */
        #[InvoiceDateTypeValidation]
        #[SkipWhenEmpty]
        #[Type("DateTimeImmutable<'Y-m-d'>")]
        public ?DateTimeImmutable $invoiceDeliveryDate = null,

        /**
         * @var ?string A számla pénzneme.
         */
        #[CurrencyTypeValidation]
        #[SkipWhenEmpty]
        public ?string $currency = null,

        /**
         * @var ?float A számla nettó összege a számla pénznemében.
         */
        #[MonetaryTypeValidation]
        #[SkipWhenEmpty]
        public ?float $invoiceNetAmount = null,

        /**
         * @var ?float A számla nettó összege forintban.
         */
        #[MonetaryTypeValidation]
        #[SkipWhenEmpty]
        public ?float $invoiceNetAmountHUF = null,

        /**
         * @var ?float A számla ÁFA összege a számla pénznemében.
         */
        #[MonetaryTypeValidation]
        #[SkipWhenEmpty]
        public ?float $invoiceVatAmount = null,

        /**
         * @var ?float A számla ÁFA összege forintban.
         */
        #[MonetaryTypeValidation]
        #[SkipWhenEmpty]
        public ?float $invoiceVatAmountHUF = null,

        /**
         * @var ?string Az adatszolgáltatás tranzakció azonosítója.
         */
        #[EntityIdTypeValidation]
        #[SkipWhenEmpty]
        public ?string $transactionId = null,

        /**
         * @var ?int A számla sorszáma a kérésen belül.
         */
        #[InvoiceIndexTypeValidation]
        #[SkipWhenEmpty]
        public ?int $index = null,

        /**
         * @var ?string Az eredeti számla sorszáma, melyre a módosítás vonatkozik.
         */
        #[SimpleText50NotBlankTypeValidation]
        #[SkipWhenEmpty]
        public ?string $originalInvoiceNumber = null,

        /**
         * @var ?int A számlára vonatkozó módosító okirat egyedi sorszáma.
         */
        #[InvoiceUnboundedIndexTypeValidation]
        #[SkipWhenEmpty]
        public ?int $modificationIndex = null,

        /**
         * @var ?bool Jelöli, ha az adatszolgáltatás maga a számla (a számlán nem szerepel több adat)
         */
        #[SkipWhenEmpty]
        public ?bool $completenessIndicator = null,
    ) {
        parent::__construct();
    }
}
