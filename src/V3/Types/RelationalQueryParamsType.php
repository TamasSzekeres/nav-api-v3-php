<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use LightSideSoftware\NavApi\V3\Types\Annotations\ArrayValidation;

/**
 * A számla lekérdezés relációs paraméterei.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class RelationalQueryParamsType extends BaseType
{
    public function __construct(
        /**
         * array<int, RelationQueryDateType> Számla teljesítési dátumának kereső paramétere.
         */
        #[ArrayValidation(maxItems: 2, itemType: RelationQueryDateType::class)]
        #[SkipWhenEmpty]
        #[Type('array<LightSideSoftware\NavApi\V3\Types\RelationQueryDateType>')]
        #[XmlList(entry: 'invoiceDelivery', inline: true)]
        public array $invoiceDeliveries = [],

        /**
         * array<int, RelationQueryDateType> A számla fizetési határidejének kereső paramétere.
         */
        #[ArrayValidation(maxItems: 2, itemType: RelationQueryDateType::class)]
        #[SkipWhenEmpty]
        #[Type('array<LightSideSoftware\NavApi\V3\Types\RelationQueryDateType>')]
        #[XmlList(entry: 'paymentDate', inline: true)]
        public array $paymentDates = [],

        /**
         * array<int, RelationQueryMonetaryType> A számla nettó összeg kereső paramétere a számla pénznemében.
         */
        #[ArrayValidation(maxItems: 2, itemType: RelationQueryMonetaryType::class)]
        #[SkipWhenEmpty]
        #[Type('array<LightSideSoftware\NavApi\V3\Types\RelationQueryMonetaryType>')]
        #[XmlList(entry: 'invoiceNetAmount', inline: true)]
        public array $invoiceNetAmounts = [],

        /**
         * array<int, RelationQueryMonetaryType> A számla nettó összegének kereső paramétere forintban.
         */
        #[ArrayValidation(maxItems: 2, itemType: RelationQueryMonetaryType::class)]
        #[SkipWhenEmpty]
        #[Type('array<LightSideSoftware\NavApi\V3\Types\RelationQueryMonetaryType>')]
        #[XmlList(entry: 'invoiceNetAmountHUF', inline: true)]
        public array $invoiceNetAmountsHUF = [],

        /**
         * array<int, RelationQueryMonetaryType> A számla ÁFA összegének kereső paramétere a számla pénznemében.
         */
        #[ArrayValidation(maxItems: 2, itemType: RelationQueryMonetaryType::class)]
        #[SkipWhenEmpty]
        #[Type('array<LightSideSoftware\NavApi\V3\Types\RelationQueryMonetaryType>')]
        #[XmlList(entry: 'invoiceVatAmount', inline: true)]
        public array $invoiceVatAmounts = [],

        /**
         * array<int, RelationQueryMonetaryType> A számla ÁFA összegének kereső paramétere forintban.
         */
        #[ArrayValidation(maxItems: 2, itemType: RelationQueryMonetaryType::class)]
        #[SkipWhenEmpty]
        #[Type('array<LightSideSoftware\NavApi\V3\Types\RelationQueryMonetaryType>')]
        #[XmlList(entry: 'invoiceVatAmountHUF', inline: true)]
        public array $invoiceVatAmountsHUF = [],
    ) {
        parent::__construct();
    }
}
