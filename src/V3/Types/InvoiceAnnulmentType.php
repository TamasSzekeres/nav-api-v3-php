<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use DateTimeImmutable;
use JMS\Serializer\Annotation\Type;
use LightSideSoftware\NavApi\V3\Types\Annotations\StringValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\AnnulmentCodeType;

/**
 * Korábbi adatszolgáltatás technikai érvénytelenítésének adatai.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class InvoiceAnnulmentType extends BaseType
{
    public function __construct(
        /**
         * @var string A technikai érvénytelenítéssel érintett számla vagy módosító okirat sorszáma.
         */
        #[StringValidation(minLength: 1, maxLength: 50)]
        public string $annulmentReference,

        /**
         * @var DateTimeImmutable A technikai érvénytelenítés időbélyege a forrásrendszerben UTC idő szerint.
         */
        #[Type("DateTimeImmutable<'Y-m-d\TH:i:s.vP'>")]
        public DateTimeImmutable $annulmentTimestamp,

        /**
         * @var AnnulmentCodeType A technikai érvénytelenítés kódja.
         */
        public AnnulmentCodeType $annulmentCode,

        /**
         * @var string A technikai érvénytelenítés oka.
         */
        #[StringValidation(minLength: 1, maxLength: 1024)]
        public string $annulmentReason,
    ) {
        parent::__construct();
    }
}
