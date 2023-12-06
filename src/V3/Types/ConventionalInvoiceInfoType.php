<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use LightSideSoftware\NavApi\V3\Types\Annotations\ArrayValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\EkaerIdTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText100NotBlankTypeValidation;

/**
 * A számlafeldolgozást segítő, egyezményesen nevesített egyéb adatok.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class ConventionalInvoiceInfoType extends BaseType
{
    public function __construct(
        /**
         * @var array<int, string> Megrendelésszám(ok).
         */
        #[ArrayValidation(itemValidation: new SimpleText100NotBlankTypeValidation())]
        #[SkipWhenEmpty]
        #[Type('array<string>')]
        #[XmlList(entry: 'orderNumber', inline: false)]
        public array $orderNumbers = [],

        /**
         * @var array<int, string> Szállítólevél szám(ok).
         */
        #[ArrayValidation(itemValidation: new SimpleText100NotBlankTypeValidation())]
        #[SkipWhenEmpty]
        #[Type('array<string>')]
        #[XmlList(entry: 'deliveryNote', inline: false)]
        public array $deliveryNotes = [],

        /**
         * @var array<int, string> Szállítási dátum(ok).
         */
        #[ArrayValidation(itemValidation: new SimpleText100NotBlankTypeValidation())]
        #[SkipWhenEmpty]
        #[Type('array<string>')]
        #[XmlList(entry: 'shippingDate', inline: false)]
        public array $shippingdates = [],

        /**
         * @var array<int, string> Szerződésszám(ok).
         */
        #[ArrayValidation(itemValidation: new SimpleText100NotBlankTypeValidation())]
        #[SkipWhenEmpty]
        #[Type('array<string>')]
        #[XmlList(entry: 'contractNumber', inline: false)]
        public array $contractNumbers = [],

        /**
         * @var array<int, string> Az eladó vállalati kódja(i).
         */
        #[ArrayValidation(itemValidation: new SimpleText100NotBlankTypeValidation())]
        #[SkipWhenEmpty]
        #[Type('array<string>')]
        #[XmlList(entry: 'supplierCompanyCode', inline: false)]
        public array $supplierCompanyCodes = [],

        /**
         * @var array<int, string> A vevő vállalati kódja(i).
         */
        #[ArrayValidation(itemValidation: new SimpleText100NotBlankTypeValidation())]
        #[SkipWhenEmpty]
        #[Type('array<string>')]
        #[XmlList(entry: 'customerCompanyCode', inline: false)]
        public array $customerCompanyCodes = [],

        /**
         * @var array<int, string> Beszállító kód(ok).
         */
        #[ArrayValidation(itemValidation: new SimpleText100NotBlankTypeValidation())]
        #[SkipWhenEmpty]
        #[Type('array<string>')]
        #[XmlList(entry: 'dealerCode', inline: false)]
        public array $dealerCodes = [],

        /**
         * @var array<int, string> Költséghely(ek).
         */
        #[ArrayValidation(itemValidation: new SimpleText100NotBlankTypeValidation())]
        #[SkipWhenEmpty]
        #[Type('array<string>')]
        #[XmlList(entry: 'costCenter', inline: false)]
        public array $costCenters = [],

        /**
         * @var array<int, string> Projektszám(ok).
         */
        #[ArrayValidation(itemValidation: new SimpleText100NotBlankTypeValidation())]
        #[SkipWhenEmpty]
        #[Type('array<string>')]
        #[XmlList(entry: 'projectNumber', inline: false)]
        public array $projectNumbers = [],

        /**
         * @var array<int, string> Főkönyvi számlaszám(ok).
         */
        #[ArrayValidation(itemValidation: new SimpleText100NotBlankTypeValidation())]
        #[SkipWhenEmpty]
        #[Type('array<string>')]
        #[XmlList(entry: 'generalLedgerAccountNumber', inline: false)]
        public array $generalLedgerAccountNumbers = [],

        /**
         * @var array<int, string> Kiállítói globális helyazonosító szám(ok).
         */
        #[ArrayValidation(itemValidation: new SimpleText100NotBlankTypeValidation())]
        #[SkipWhenEmpty]
        #[Type('array<string>')]
        #[XmlList(entry: 'glnNumber', inline: false)]
        public array $glnNumbersSupplier = [],

        /**
         * @var array<int, string> Vevői globális helyazonosító szám(ok).
         */
        #[ArrayValidation(itemValidation: new SimpleText100NotBlankTypeValidation())]
        #[SkipWhenEmpty]
        #[Type('array<string>')]
        #[XmlList(entry: 'glnNumber', inline: false)]
        public array $glnNumbersCustomer = [],

        /**
         * @var array<int, string> Anyagszám(ok).
         */
        #[ArrayValidation(itemValidation: new SimpleText100NotBlankTypeValidation())]
        #[SkipWhenEmpty]
        #[Type('array<string>')]
        #[XmlList(entry: 'materialNumber', inline: false)]
        public array $materialNumbers = [],

        /**
         * @var array<int, string> Cikkszám(ok).
         */
        #[ArrayValidation(itemValidation: new SimpleText100NotBlankTypeValidation())]
        #[SkipWhenEmpty]
        #[Type('array<string>')]
        #[XmlList(entry: 'itemNumber', inline: false)]
        public array $itemNumbers = [],

        /**
         * @var array<int, string> EKÁER azonosító(k).
         */
        #[SkipWhenEmpty]
        #[Type('array<string>')]
        #[ArrayValidation(itemValidation: new EkaerIdTypeValidation())]
        #[XmlList(entry: 'ekaerId', inline: false)]
        public array $ekaerIds = [],
    ) {
        parent::__construct();
    }
}
