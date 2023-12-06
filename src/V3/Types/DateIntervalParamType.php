<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use DateTimeImmutable;
use JMS\Serializer\Annotation\Type;
use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceDateTypeValidation;

/**
 * Dátumos számla kereső paraméter.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class DateIntervalParamType extends BaseType
{
    public function __construct(
        /**
         * @var DateTimeImmutable Dátum intervallum nagyobb vagy egyenlő paramétere.
         */
        #[InvoiceDateTypeValidation]
        #[Type("DateTimeImmutable<'Y-m-d'>")]
        public DateTimeImmutable $dateFrom,

        /**
         * @var DateTimeImmutable Dátum intervallum kisebb vagy egyenlő paramétere.
         */
        #[InvoiceDateTypeValidation]
        #[Type("DateTimeImmutable<'Y-m-d'>")]
        public DateTimeImmutable $dateTo,
    ) {
        parent::__construct();
    }
}
