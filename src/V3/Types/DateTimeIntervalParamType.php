<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use DateTimeImmutable;
use JMS\Serializer\Annotation\Type;
use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceTimestampTypeValidation;

/**
 * Időpontos számla kereső paraméter.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class DateTimeIntervalParamType extends BaseType
{
    public function __construct(
        /**
         * @var DateTimeImmutable Időpontos intervallum nagyobb vagy egyenlő paramétere UTC idő szerint.
         */
        #[InvoiceTimestampTypeValidation]
        #[Type("DateTimeImmutable<'Y-m-d\TH:i:s.v\Z'>")]
        public DateTimeImmutable $dateTimeFrom,

        /**
         * @var DateTimeImmutable Időpontos intervallum kisebb vagy egyenlő paramétere UTC idő szerint.
         */
        #[InvoiceTimestampTypeValidation]
        #[Type("DateTimeImmutable<'Y-m-d\TH:i:s.v\Z'>")]
        public DateTimeImmutable $dateTimeTo,
    ) {
        parent::__construct();
    }
}
