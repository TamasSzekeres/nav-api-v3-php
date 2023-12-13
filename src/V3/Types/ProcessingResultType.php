<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\AccessorOrder;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use LightSideSoftware\NavApi\V3\Types\Annotations\ArrayValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceIndexTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceUnboundedIndexTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\InvoiceStatusType;

/**
 * Számla feldolgozási eredmény.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[AccessorOrder(
    order: 'custom',
    custom: [
        'index',
        'batchIndex',
        'invoiceStatus',
        'technicalValidationMessages',
        'businessValidationMessages',
        'compressedContentIndicator',
        'originalRequest',
    ],
)]
final readonly class ProcessingResultType extends BaseType
{
    public function __construct(
        /**
         * @var int A számla sorszáma a kérésen belül.
         */
        #[InvoiceIndexTypeValidation]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public int $index,

        /**
         * @var InvoiceStatusType A számla feldolgozási státusza.
         */
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public InvoiceStatusType $invoiceStatus,

        /**
         * @var bool Jelöli, ha az originalRequest tartalmát a BASE64 dekódolást követően
         * még ki kell tömöríteni az olvasáshoz.
         */
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public bool $compressedContentIndicator,

        /**
         * @var ?int A módosító okirat sorszáma a kötegen belül.
         */
        #[InvoiceUnboundedIndexTypeValidation]
        #[SkipWhenEmpty]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?int $batchIndex = null,

        /**
         * @var array<TechnicalValidationResultType> Technikai validációs üzenetek.
         */
        #[ArrayValidation(itemType: TechnicalValidationResultType::class)]
        #[SkipWhenEmpty]
        #[Type('array<LightSideSoftware\NavApi\V3\Types\TechnicalValidationResultType>')]
        #[XmlList(entry: 'technicalValidationMessages', inline: true, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public array $technicalValidationMessages = [],

        /**
         * @var array<BusinessValidationResultType> Technikai validációs üzenetek.
         */
        #[ArrayValidation(itemType: BusinessValidationResultType::class)]
        #[SkipWhenEmpty]
        #[Type('array<LightSideSoftware\NavApi\V3\Types\BusinessValidationResultType>')]
        #[XmlList(entry: 'businessValidationMessages', inline: true, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public array $businessValidationMessages = [],

        /**
         * @var ?string Számla adatok BASE64-ben kódolt tartalma
         */
        #[SkipWhenEmpty]
        #[XmlElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?string $originalRequest = null,
    ) {
        parent::__construct();
    }
}
