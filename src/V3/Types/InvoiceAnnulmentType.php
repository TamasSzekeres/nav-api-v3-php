<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use DateTimeImmutable;
use JMS\Serializer\Annotation\Type;
use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceTimestampTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText1024NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText50NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\AnnulmentCodeType;

/**
 * Korábbi adatszolgáltatás technikai érvénytelenítésének adatai.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class InvoiceAnnulmentType extends BaseType
{
    public function __construct(
        /**
         * @var string A technikai érvénytelenítéssel érintett számla vagy módosító okirat sorszáma.
         */
        #[SimpleText50NotBlankTypeValidation]
        public string $annulmentReference,

        /**
         * @var DateTimeImmutable A technikai érvénytelenítés időbélyege a forrásrendszerben UTC idő szerint.
         */
        #[InvoiceTimestampTypeValidation]
        #[Type("DateTimeImmutable<'Y-m-d\TH:i:s.vP'>")]
        public DateTimeImmutable $annulmentTimestamp,

        /**
         * @var AnnulmentCodeType A technikai érvénytelenítés kódja.
         */
        public AnnulmentCodeType $annulmentCode,

        /**
         * @var string A technikai érvénytelenítés oka.
         */
        #[SimpleText1024NotBlankTypeValidation]
        public string $annulmentReason,
    ) {
        parent::__construct();
    }
}
