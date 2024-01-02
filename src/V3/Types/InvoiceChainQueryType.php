<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText50NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\TaxPayerIdTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\InvoiceDirectionType;

/**
 * Számlalánc kivonat lekérdezés számlaszám paramétere.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class InvoiceChainQueryType extends BaseType
{
    public function __construct(
        /**
         * @var string Számla vagy módosító okirat sorszáma.
         */
        #[SimpleText50NotBlankTypeValidation]
        #[XmlElement(cdata: false)]
        public string $invoiceNumber,

        /**
         * @var InvoiceDirectionType Kimenő vagy bejövő számla keresési paramétere.
         */
        #[Type("Enum<'LightSideSoftware\NavApi\V3\Types\Enums\InvoiceDirectionType'>")]
        public InvoiceDirectionType $invoiceDirection,

        /**
         * @var ?string A számla kiállítójának vagy vevőjének adószáma (a keresési feltétel az invoiceDirection tag értékétől függ)
         */
        #[SkipWhenEmpty]
        #[TaxPayerIdTypeValidation]
        #[XmlElement(cdata: false)]
        public ?string $taxNumber = null,
    ) {
        parent::__construct();
    }
}
