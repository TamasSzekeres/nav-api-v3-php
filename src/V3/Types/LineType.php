<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use InvalidArgumentException;
use JMS\Serializer\Annotation\AccessorOrder;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use LightSideSoftware\NavApi\V3\Types\Annotations\ArrayValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\LineNumberTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\MonetaryTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\QuantityTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText50NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText512NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\LineNatureIndicatorType;
use LightSideSoftware\NavApi\V3\Types\Enums\UnitOfMeasureType;

/**
 * A számla tételek (termék vagy szolgáltatás) adatait tartalmazó típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[AccessorOrder(
    order: 'custom',
    custom: [
        'lineNumber',
        'lineModificationReference',
        'referencesToOtherLines',
        'advanceData',
        'productCodes',
        'lineExpressionIndicator',
        'lineNatureIndicator',
        'lineDescription',
        'quantity',
        'unitOfMeasure',
        'unitOfMeasureOwn',
        'unitPrice',
        'unitPriceHUF',
        'lineDiscountData',
        'lineAmountsNormal',
        'lineAmountsSimplified',
        'intermediatedService',
        'aggregateInvoiceLineData',
        'newTransportMean',
        'depositIndicator',
        'obligatedForProductFee',
        'GPCExcise',
        'dieselOilPurchase',
        'netaDeclaration',
        'productFeeClause',
        'lineProductFeeContent',
        'conventionalLineInfo',
        'additionalLineData',
    ],
)]
final readonly class LineType extends BaseType
{
    public function __construct(
        /**
         * @var int A tétel sorszáma.
         */
        #[LineNumberTypeValidation]
        public int $lineNumber,

        /**
         * @var bool Értéke true, ha a tétel mennyiségi egysége természetes mértékegységben kifejezhető.
         */
        public bool $lineExpressionIndicator,

        /**
         * @var ?LineModificationReferenceType Módosításról történő adatszolgáltatás esetén a tételsor módosítás jellegének jelölése.
         */
        #[SkipWhenEmpty]
        public ?LineModificationReferenceType $lineModificationReference = null,

        /**
         * @var array<int, int> Hivatkozások kapcsolódó tételekre, ha ez az ÁFA törvény alapján szükséges.
         */
        #[ArrayValidation(itemValidation: new LineNumberTypeValidation())]
        #[SkipWhenEmpty]
        #[Type('array<int>')]
        public array $referencesToOtherLines = [],

        /**
         * @var ?AdvanceDataType Előleghez kapcsolódó adatok.
         */
        #[SkipWhenEmpty]
        public ?AdvanceDataType $advanceData = null,

        /**
         * @var array<int, ProductCodeType> Termékkódok.
         */
        #[ArrayValidation(itemType: ProductCodeType::class)]
        #[SkipWhenEmpty]
        #[Type('array<LightSideSoftware\NavApi\V3\Types\ProductCodeType>')]
        #[XmlList(entry: 'productCode', inline: false)]
        public array $productCodes = [],

        /**
         * @var ?LineNatureIndicatorType Adott tételsor termékértékesítés vagy szolgáltatás nyújtás jellegének jelzése.
         */
        #[SkipWhenEmpty]
        public ?LineNatureIndicatorType $lineNatureIndicator = null,

        /**
         * @var ?string A termék vagy szolgáltatás megnevezése
         */
        #[SimpleText512NotBlankTypeValidation]
        #[SkipWhenEmpty]
        #[XmlElement(cdata: false)]
        public ?string $lineDescription = null,

        /**
         * @var ?float Mennyiség.
         */
        #[QuantityTypeValidation]
        #[SkipWhenEmpty]
        public ?float $quantity = null,

        /**
         * @var ?UnitOfMeasureType A számlán szereplő mennyiségi egység kanonikus kifejezése az interfész specifikáció szerint.
         */
        #[SkipWhenEmpty]
        public ?UnitOfMeasureType $unitOfMeasure = null,

        /**
         * @var ?string A számlán szereplő mennyiségi egység literális kifejezése.
         */
        #[SimpleText50NotBlankTypeValidation]
        #[XmlElement(cdata: false)]
        public ?string $unitOfMeasureOwn = null,

        /**
         * @var ?float Egységár a számla pénznemében. Egyszerűsített számla esetén bruttó, egyéb esetben nettó egységár.
         */
        #[QuantityTypeValidation]
        #[SkipWhenEmpty]
        public ?float $unitPrice = null,

        /**
         * @var ?float Egységár forintban.
         */
        #[QuantityTypeValidation]
        #[SkipWhenEmpty]
        public ?float $unitPriceHUF = null,

        /**
         * @var DiscountDataType|null A tételhez tartozó árengedmény adatok.
         */
        #[SkipWhenEmpty]
        public ?DiscountDataType $lineDiscountData = null,

        /**
         * @var ?LineAmountsNormalType Normál (nem egyszerűsített) számla esetén
         * (beleértve a gyűjtőszámlát) kitöltendő tétel érték adatok.
         */
        #[SkipWhenEmpty]
        public ?LineAmountsNormalType $lineAmountsNormal = null,

        /**
         * @var ?LineAmountsSimplifiedType Egyszerűsített számla esetén kitöltendő tétel érték adatok.
         */
        #[SkipWhenEmpty]
        public ?LineAmountsSimplifiedType $lineAmountsSimplified = null,

        /**
         * @var ?bool Értéke true ha a tétel közvetített szolgáltatás - Számviteli tv. 3.§ (4) 1.
         */
        #[SkipWhenEmpty]
        public ?bool $intermediatedService = null,

        /**
         * @var ?AggregateInvoiceLineDataType Gyűjtő számla adatok.
         */
        #[SkipWhenEmpty]
        public ?AggregateInvoiceLineDataType $aggregateInvoiceLineData = null,

        /**
         * @var ?NewTransportMeanType Új közlekedési eszköz értékesítés ÁFA tv. 89 § ill. 169 § o).
         */
        #[SkipWhenEmpty]
        public ?NewTransportMeanType $newTransportMean = null,

        /**
         * @var ?bool Értéke true, ha a tétel betétdíj jellegű.
         */
        #[SkipWhenEmpty]
        public ?bool $depositIndicator = null,

        /**
         * @var ?bool Értéke true ha a tételt termékdíj fizetési kötelezettség terheli.
         */
        #[SkipWhenEmpty]
        public ?bool $obligatedForProductFee = null,

        /**
         * @var ?float Földgáz, villamos energia, szén jövedéki adója forintban - Jöt. 118. § (2).
         */
        #[MonetaryTypeValidation]
        #[SkipWhenEmpty]
        public ?float $GPCExcise = null,

        /**
         * @var ?DieselOilPurchaseType Gázolaj adózottan történő beszerzésének adatai – 45/2016 (XI. 29.) NGM rendelet 75. § (1) a).
         */
        #[SkipWhenEmpty]
        public ?DieselOilPurchaseType $dieselOilPurchase = null,

        /**
         * @var ?bool Értéke true, ha a Neta tv-ben meghatározott adókötelezettség az adó alanyát terheli. 2011. évi CIII. tv. 3.§(2).
         */
        #[SkipWhenEmpty]
        public ?bool $netaDeclaration = null,

        /**
         * @var ?ProductFeeClauseType A környezetvédelmi termékdíjról szóló 2011. évi LXXXV. tv. szerinti, tételre vonatkozó záradékok.
         */
        #[SkipWhenEmpty]
        public ?ProductFeeClauseType $productFeeClause = null,

        /**
         * @var array<int, ProductFeeDataType> A tétel termékdíj tartalmára vonatkozó adatok.
         */
        #[ArrayValidation(itemType: ProductFeeDataType::class)]
        #[SkipWhenEmpty]
        #[Type('array<LightSideSoftware\NavApi\V3\Types\ProductFeeDataType>')]
        #[XmlList(entry: 'lineProductFeeContent', inline: true)]
        public array $lineProductFeeContents = [],

        /**
         * @var ?ConventionalInvoiceInfoType A számlafeldolgozást segítő, egyezményesen nevesített egyéb adatok.
         */
        #[SkipWhenEmpty]
        public ?ConventionalInvoiceInfoType $conventionalLineInfo = null,

        /**
         * @var array<int, AdditionalDataType> A termék/szolgáltatás tételhez kapcsolódó, további adat.
         */
        #[ArrayValidation(itemType: AdditionalDataType::class)]
        #[SkipWhenEmpty]
        #[Type('array<LightSideSoftware\NavApi\V3\Types\AdditionalDataType>')]
        #[XmlList(entry: 'additionalLineData', inline: true)]
        public array $additionalLineData = [],
    ) {
        if (
            ($this->lineAmountsNormal instanceof LineAmountsNormalType)
            && ($this->lineAmountsSimplified instanceof LineAmountsSimplifiedType)
        ) {
            throw new InvalidArgumentException('A "lineAmountsNormal" és "lineAmountsSimplified" paraméterek közül csak egyet lehet megadni.');
        }

        parent::__construct();
    }
}
