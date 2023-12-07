<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use DateTimeImmutable;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceTimestampTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceUnboundedIndexTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText50NotBlankTypeValidation;

use function is_integer;

/**
 * A módosítás vagy érvénytelenítés adatai.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class InvoiceReferenceDataType extends BaseType
{
    /**
     * @var ?DateTimeImmutable A módosító okirat készítésének időbélyege a forrásrendszerben UTC időben.
     */
    #[InvoiceTimestampTypeValidation]
    #[SkipWhenEmpty]
    #[Type("DateTimeImmutable<'Y-m-d\TH:i:s.vP'>")]
    public ?DateTimeImmutable $modificationTimestamp;

    /**
     * @var ?int A számlára vonatkozó módosító okirat egyedi sorszáma.
     */
    #[InvoiceUnboundedIndexTypeValidation]
    #[SkipWhenEmpty]
    public ?int $modificationIndex;

    public function __construct(
        /**
         * @var string Az eredeti számla sorszáma, melyre a módosítás vonatkozik  - ÁFA tv. 170. § (1) c)e.
         */
        #[SimpleText50NotBlankTypeValidation]
        public string $originalInvoiceNumber,

        /**
         * @var bool Annak jelzése, hogy a módosítás olyan alapszámlára hivatkozik, amelyről nem történt és nem is fog történni adatszolgáltatás.
         */
        public bool $modifyWithoutMaster,

        DateTimeImmutable|int $modification,
    ) {
        $this->modificationTimestamp = ($modification instanceof DateTimeImmutable) ? $modification : null;
        $this->modificationIndex = is_integer($modification) ? $modification : null;

        parent::__construct();
    }
}
