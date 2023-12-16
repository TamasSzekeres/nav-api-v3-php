<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use DateTimeImmutable;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use LightSideSoftware\NavApi\V3\Types\Annotations\ExchangeRateTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceDateTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText50NotBlankTypeValidation;

/**
 * Előlegfizetéshez kapcsolódó adatok.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class AdvancePaymentDataType extends BaseType
{
    public function __construct(
        /**
         * @var string Az előlegszámlának a sorszáma, amelyben az előlegfizetés történt.
         */
        #[SimpleText50NotBlankTypeValidation]
        #[XmlElement(cdata: false)]
        public string $advanceOriginalInvoice,

        /**
         * @var DateTimeImmutable Az előleg fizetésének dátuma.
         */
        #[Type("DateTimeImmutable<'Y-m-d'>")]
        #[InvoiceDateTypeValidation]
        public DateTimeImmutable $advancePaymentDate,

        /**
         * @var float Az előlegfizetés során alkalmazott árfolyam.
         */
        #[ExchangeRateTypeValidation]
        public float $advanceExchangeRate,
    ) {
        parent::__construct();
    }
}
