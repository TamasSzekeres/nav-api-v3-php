<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use DateTimeImmutable;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceTimestampTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\LoginTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\AnnulmentVerificationStatusType;

/**
 * Technikai érvénytelenítés státusz adatai.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class AnnulmentDataType extends BaseType
{
    public function __construct(
        /**
         * @var AnnulmentVerificationStatusType Technikai érvénytelenítő kérések jóváhagyási státusza.
         */
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        #[Type("Enum<'LightSideSoftware\NavApi\V3\Types\Enums\AnnulmentVerificationStatusType'>")]
        public AnnulmentVerificationStatusType $annulmentVerificationStatus,

        /**
         * @var ?DateTimeImmutable A technikai érvénytelenítés jóváhagyásának vagy elutasításának időpontja UTC időben.
         */
        #[InvoiceTimestampTypeValidation]
        #[SkipWhenEmpty]
        #[Type("DateTimeImmutable<'Y-m-d\TH:i:s.v\Z'>")]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?DateTimeImmutable $annulmentDecisionDate = null,

        /**
         * @var ?string A technikai érvénytelenítést jóváhagyó vagy elutasító felhasználó neve.
         */
        #[LoginTypeValidation]
        #[SkipWhenEmpty]
        #[XmlElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?string $annulmentDecisionUser = null,
    ) {
        parent::__construct();
    }
}
