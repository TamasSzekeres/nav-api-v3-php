<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use DateTimeImmutable;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use LightSideSoftware\NavApi\V3\Types\Annotations\FloatValidation;

/**
 * A gyűjtő számlára vonatkozó speciális adatokat tartalmazó típus.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class AggregateInvoiceLineDataType extends BaseType
{
    /**
     * @var ?float A tételhez tartozó árfolyam, 1 (egy) egységre vonatkoztatva.
     * Csak külföldi pénznemben kiállított gyűjtő számla esetén kitöltendő.
     */
    #[FloatValidation(minExclusive: 0, totalDigits: 14, fractionDigits: 6)]
    #[SkipWhenEmpty]
    public ?float $lineExchangeRate = null;

    /**
     * @var DateTimeImmutable Gyűjtőszámla esetén az adott tétel teljesítési dátuma.
     */
    #[Type("DateTimeImmutable<'Y-m-d'>")]
    public DateTimeImmutable $lineDeliveryDate;
}
