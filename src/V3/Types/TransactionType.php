<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use DateTimeImmutable;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use LightSideSoftware\NavApi\V3\Types\Annotations\EntityIdTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceIndexTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceTimestampTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\LoginTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\OriginalRequestVersionType;
use LightSideSoftware\NavApi\V3\Types\Enums\RequestStatusType;
use LightSideSoftware\NavApi\V3\Types\Enums\SourceType;

/**
 * Tranzakció lekérdezési eredmény.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class TransactionType extends BaseType
{
    public function __construct(
        /**
         * @var DateTimeImmutable A beszúrás időpontja UTC időben.
         */
        #[InvoiceTimestampTypeValidation]
        #[Type("DateTimeImmutable<'Y-m-d\TH:i:s.v\Z'>")]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public DateTimeImmutable $insDate,

        /**
         * @var string A beszúrást végző felhasználó.
         */
        #[LoginTypeValidation]
        #[XmlElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public string $insCusUser,

        /**
         * @var SourceType Az adatszolgáltatás forrása.
         */
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public SourceType $source,

        /**
         * @var string A számla tranzakció azonosítója.
         */
        #[EntityIdTypeValidation]
        #[XmlElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public string $transactionId,

        /**
         * @var RequestStatusType A kérés feldolgozási státusza.
         */
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public RequestStatusType $requestStatus,

        /**
         * @var bool Jelöli ha a tranzakció technikai érvénytelenítést tartalmaz.
         */
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public bool $technicalAnnulment,

        /**
         * @var OriginalRequestVersionType Az adatszolgáltatás requestVersion értéke.
         */
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public OriginalRequestVersionType $originalRequestVersion,

        /**
         * @var int Az adatszolgáltatás tételeinek száma.
         */
        #[InvoiceIndexTypeValidation]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public int $itemCount,
    ) {
        parent::__construct();
    }
}
