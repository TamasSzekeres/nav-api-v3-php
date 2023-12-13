<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use DateTimeImmutable;
use JMS\Serializer\Annotation\AccessorOrder;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use LightSideSoftware\NavApi\V3\Types\Annotations\EntityIdTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceIndexTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceTimestampTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceUnboundedIndexTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\LoginTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\OriginalRequestVersionType;
use LightSideSoftware\NavApi\V3\Types\Enums\SourceType;

/**
 * A kéréshez tartozó technikai érvénytelenítő művelet.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[AccessorOrder(
    order: 'custom',
    custom: [
        'insdate',
        'insCusUser',
        'source',
        'transactionId',
        'index',
        'batchIndex',
        'originalRequestVersion',
    ],
)]
final readonly class AuditDataType extends BaseType
{
    public function __construct(
        /**
         * @var DateTimeImmutable A beszúrás időpontja UTC időben.
         */
        #[InvoiceTimestampTypeValidation]
        #[Type("DateTimeImmutable<'Y-m-d\TH:i:s.v\Z'>")]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public DateTimeImmutable $insdate,

        /**
         * @var string A beszúrást végző technikai felhasználó.
         */
        #[LoginTypeValidation]
        #[XmlElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public string $insCusUser,

        /**
         * @var string Az adatszolgáltatás forrása.
         */
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public SourceType $source,

        /**
         * @var OriginalRequestVersionType Az adatszolgáltatás requestVersion értéke.
         */
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public OriginalRequestVersionType $originalRequestVersion,

        /**
         * @var ?string A számla tranzakció azonosítója, ha az gépi interfészen került beküldésre.
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
         * @var ?int A módosító okirat sorszáma a kötegen belül.
         */
        #[InvoiceUnboundedIndexTypeValidation]
        #[SkipWhenEmpty]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?int $batchIndex = null,
    ) {
        parent::__construct();
    }
}
