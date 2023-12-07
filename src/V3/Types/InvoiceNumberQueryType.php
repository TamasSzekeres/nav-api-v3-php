<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceUnboundedIndexTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText50NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\TaxPayerIdTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\InvoiceDirectionType;

/**
 * Számla lekérdezés számlaszám paramétere.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class InvoiceNumberQueryType extends BaseType
{
    public function __construct(
        /**
         * @var string Számla vagy módosító okirat sorszámaa.
         */
        #[SimpleText50NotBlankTypeValidation]
        public string $invoiceNumber,

        /**
         * @var InvoiceDirectionType Kimenő vagy bejövő számla keresési paramétere.
         */
        public InvoiceDirectionType $invoiceDirection,

        /**
         * @var ?int A módosító okirat sorszáma a kötegen belül.
         */
        #[InvoiceUnboundedIndexTypeValidation]
        #[SkipWhenEmpty]
        public ?int $batchIndex = null,

        /**
         * @var ?string Vevő oldali lekérdezés esetén a számla kiállítójának adószáma, ha több érvényes számla is megtalálható azonos sorszámmal.
         */
        #[TaxPayerIdTypeValidation]
        public ?string $supplierTaxNumber = null,
    ) {
        parent::__construct();
    }
}
