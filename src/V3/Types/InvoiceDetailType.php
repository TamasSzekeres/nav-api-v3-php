<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use DateTimeImmutable;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use LightSideSoftware\NavApi\V3\Types\Annotations\CurrencyTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\ExchangeRateTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\FloatValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceDateTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\StringValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\InvoiceAppearanceType;
use LightSideSoftware\NavApi\V3\Types\Enums\InvoiceCategoryType;
use LightSideSoftware\NavApi\V3\Types\Enums\PaymentMethodType;

/**
 * Számla részletező adatok.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class InvoiceDetailType extends BaseType
{
    public function __construct(
        /**
         * @var InvoiceCategoryType A számla típusa, módosító okirat esetén az eredeti számla típusa.
         */
        public InvoiceCategoryType $invoiceCategory,

        /**
         * @var DateTimeImmutable Teljesítés dátuma (ha nem szerepel a számlán, akkor azonos a számla keltével) - ÁFA tv. 169. § g).
         */
        #[InvoiceDateTypeValidation]
        #[Type("DateTimeImmutable<'Y-m-d'>")]
        public DateTimeImmutable $invoiceDeliveryDate,

        /**
         * @var string A számla pénzneme az ISO 4217 szabvány szerint.
         */
        #[CurrencyTypeValidation]
        public string $currencyCode,

        /**
         * @var float HUF-tól különböző pénznem esetén az alkalmazott árfolyam: egy egység értéke HUF-ban.
         */
        #[ExchangeRateTypeValidation]
        public float $exchangeRate,

        /**
         * @var InvoiceAppearanceType A számla vagy módosító okirat megjelenési formája.
         */
        public InvoiceAppearanceType $invoiceAppearance,

        /**
         * @var ?DateTimeImmutable Amennyiben a számla egy időszakra vonatkozik, akkor az időszak első napja.
         */
        #[InvoiceDateTypeValidation]
        #[SkipWhenEmpty]
        #[Type("DateTimeImmutable<'Y-m-d'>")]
        public ?DateTimeImmutable $invoiceDeliveryPeriodStart = null,

        /**
         * @var ?DateTimeImmutable Amennyiben a számla egy időszakra vonatkozik, akkor az időszak utolsó napja.
         */
        #[InvoiceDateTypeValidation]
        #[SkipWhenEmpty]
        #[Type("DateTimeImmutable<'Y-m-d'>")]
        public ?DateTimeImmutable $invoiceDeliveryPeriodEnd = null,

        /**
         * @var ?DateTimeImmutable Számviteli teljesítés dátuma. Időszak esetén az időszak utolsó napja.
         */
        #[InvoiceDateTypeValidation]
        #[SkipWhenEmpty]
        #[Type("DateTimeImmutable<'Y-m-d'>")]
        public ?DateTimeImmutable $invoiceAccountingDeliveryDate = null,

        /**
         * @var ?bool Annak jelzése, ha a felek a termékértékesítés,
         * szolgáltatás nyújtás során időszakonkénti elszámolásban vagy fizetésben állapodnak meg,
         * vagy a termékértékesítés, szolgáltatás nyújtás ellenértékét meghatározott időpontra állapítják meg.
         */
        #[SkipWhenEmpty]
        public ?bool $periodicalSettlement = null,

        /**
         * @var ?bool Kisadózó jelzése.
         */
        #[SkipWhenEmpty]
        public ?bool $smallBusinessIndicator = null,

        /**
         * @var ?bool Közmű elszámoló számla jelölése (2013.évi CLXXXVIII törvény szerinti elszámoló számla).
         */
        #[SkipWhenEmpty]
        public ?bool $utilitySettlementIndicator = null,

        /**
         * @var ?bool Önszámlázás jelölése (önszámlázás esetén true)
         */
        #[SkipWhenEmpty]
        public ?bool $selfBillingIndicator = null,

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
         * @var ?bool Pénzforgalmi elszámolás jelölése, ha az szerepel a számlán - ÁFA tv. 169. § h).
         * Értéke true pénzforgalmi elszámolás esetén.
         */
        #[SkipWhenEmpty]
        public ?bool $cashAccountingIndicator = null,

        /**
         * @var ?ConventionalInvoiceInfoType A számlafeldolgozást segítő, egyezményesen nevesített egyéb adatok.
         */
        #[SkipWhenEmpty]
        public ?ConventionalInvoiceInfoType $conventionalInvoiceInfo = null,

        /**
         * @var ?AdditionalDataType A számlára vonatkozó egyéb adat.
         */
        #[SkipWhenEmpty]
        public ?AdditionalDataType $additionalInvoiceData = null,
    ) {
        parent::__construct();
    }
}
