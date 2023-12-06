<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use DateTimeImmutable;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
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
final readonly class AuditDataType extends BaseType
{
    public function __construct(
        /**
         * @var DateTimeImmutable A beszúrás időpontja UTC időben.
         */
        #[InvoiceTimestampTypeValidation]
        #[Type("DateTimeImmutable<'Y-m-d\TH:i:s.vP'>")]
        public DateTimeImmutable $insdate,

        /**
         * @var string A beszúrást végző technikai felhasználó.
         */
        #[LoginTypeValidation]
        public string $insCusUser,

        /**
         * @var string Az adatszolgáltatás forrása.
         */
        public SourceType $source,

        /**
         * @var OriginalRequestVersionType Az adatszolgáltatás requestVersion értéke.
         */
        public OriginalRequestVersionType $originalRequestVersion,

        /**
         * @var ?string A számla tranzakció azonosítója, ha az gépi interfészen került beküldésre.
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
         * @var ?int A módosító okirat sorszáma a kötegen belül.
         */
        #[InvoiceUnboundedIndexTypeValidation]
        #[SkipWhenEmpty]
        public ?int $batchIndex = null,
    ) {
        parent::__construct();
    }
}
