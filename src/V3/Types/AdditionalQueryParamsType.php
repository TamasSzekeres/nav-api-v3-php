<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\XmlElement;
use LightSideSoftware\NavApi\V3\Types\Annotations\CurrencyTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\QueryNameTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\TaxPayerIdTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\InvoiceAppearanceType;
use LightSideSoftware\NavApi\V3\Types\Enums\InvoiceCategoryType;
use LightSideSoftware\NavApi\V3\Types\Enums\PaymentMethodType;
use LightSideSoftware\NavApi\V3\Types\Enums\SourceType;

/**
 * A számla lekérdezés kiegészítő paraméterei.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class AdditionalQueryParamsType extends BaseType
{
    public function __construct(
        /**
         * @var ?string A számla kiállítójának vagy vevőjének adószáma (a keresési feltétel az invoiceDirection tag értékétől függ).
         */
        #[SkipWhenEmpty]
        #[TaxPayerIdTypeValidation]
        #[XmlElement(cdata: false)]
        public ?string $taxNumber = null,

        /**
         * @var ?string A számla kiállítójának vagy vevőjének csoport tag adószáma (a keresési feltétel az invoiceDirection tag értékétől függ).
         */
        #[SkipWhenEmpty]
        #[TaxPayerIdTypeValidation]
        #[XmlElement(cdata: false)]
        public ?string $groupMemberTaxNumber = null,

        /**
         * @var ?string A számla kiállítójának vagy vevőjének keresőparamétere szó eleji egyezőségre (a keresési feltétel az invoiceDirection tag értékétől függ).
         */
        #[QueryNameTypeValidation]
        #[SkipWhenEmpty]
        #[XmlElement(cdata: false)]
        public ?string $name = null,

        /**
         * @var ?InvoiceCategoryType A számla típusa.
         */
        #[SkipWhenEmpty]
        public ?InvoiceCategoryType $invoiceCategory = null,

        /**
         * @var ?string Fizetés módja.
         */
        #[SkipWhenEmpty]
        public ?PaymentMethodType $paymentMethod = null,

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
         * @var ?string A számla pénzneme.
         */
        #[CurrencyTypeValidation]
        #[SkipWhenEmpty]
        #[XmlElement(cdata: false)]
        public ?string $currency = null,
    ) {
        parent::__construct();
    }
}
