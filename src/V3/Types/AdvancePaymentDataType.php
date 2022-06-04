<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use DateTimeImmutable;
use JMS\Serializer\Annotation\Type;
use LightSideSoftware\NavApi\V3\Types\Annotations\FloatValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\StringValidation;

/**
 * Előlegfizetéshez kapcsolódó adatok.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class AdvancePaymentDataType extends BaseType
{
    /**
     * @var string Az előlegszámlának a sorszáma, amelyben az előlegfizetés történt.
     */
    #[StringValidation(minLength: 1, maxLength: 50, pattern: ".*[^\s].*")]
    public string $advanceOriginalInvoice;

    /**
     * @var DateTimeImmutable Az előleg fizetésének dátuma.
     */
    #[Type("DateTimeImmutable<'Y-m-d'>")]
    public DateTimeImmutable $advancePaymentDate;

    /**
     * @var float Az előlegfizetés során alkalmazott árfolyam.
     */
    #[FloatValidation(minExclusive: 0, totalDigits: 14, fractionDigits: 6)]
    public float $advanceExchangeRate;
}
