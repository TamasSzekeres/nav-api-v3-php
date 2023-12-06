<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use DateTimeImmutable;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
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
        public AnnulmentVerificationStatusType $annulmentVerificationStatus,

        /**
         * @var ?DateTimeImmutable A technikai érvénytelenítés jóváhagyásának vagy elutasításának időpontja UTC időben.
         */
        #[InvoiceTimestampTypeValidation]
        #[SkipWhenEmpty]
        #[Type("DateTimeImmutable<'Y-m-d\TH:i:s.vP'>")]
        public ?DateTimeImmutable $annulmentDecisionDate = null,

        /**
         * @var ?string A technikai érvénytelenítést jóváhagyó vagy elutasító felhasználó neve.
         */
        #[LoginTypeValidation]
        #[SkipWhenEmpty]
        public ?string $annulmentDecisionUser = null,
    ) {
        parent::__construct();
    }
}
