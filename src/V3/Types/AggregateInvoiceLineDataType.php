<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use DateTimeImmutable;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use LightSideSoftware\NavApi\V3\Types\Annotations\ExchangeRateTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceDateTypeValidation;

/**
 * A gyűjtő számlára vonatkozó speciális adatokat tartalmazó típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class AggregateInvoiceLineDataType extends BaseType
{
    public function __construct(
        /**
         * @var DateTimeImmutable Gyűjtőszámla esetén az adott tétel teljesítési dátuma.
         */
        #[Type("DateTimeImmutable<'Y-m-d'>")]
        #[InvoiceDateTypeValidation]
        public DateTimeImmutable $lineDeliveryDate,

        /**
         * @var ?float A tételhez tartozó árfolyam, 1 (egy) egységre vonatkoztatva.
         * Csak külföldi pénznemben kiállított gyűjtő számla esetén kitöltendő.
         */
        #[ExchangeRateTypeValidation]
        #[SkipWhenEmpty]
        public ?float $lineExchangeRate = null,
    ) {
        parent::__construct();
    }
}
