<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use LightSideSoftware\NavApi\V3\Types\Annotations\ResponsePageTypeValidation;

/**
 * Számla lekérdezési eredmények.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class InvoiceDigestResultType extends BaseType
{
    public function __construct(
        /**
         * @var int A jelenleg lekérdezett lapszáma.
         */
        #[ResponsePageTypeValidation]
        public int $currentPage,

        /**
         * @var int A lekérdezés eredménye szerint elérhető utolsó lapszám.
         */
        #[ResponsePageTypeValidation]
        public int $availablePage,

        /**
         * @var ?InvoiceDigestType Számla kivonat lekérdezési eredmény
         */
        #[SkipWhenEmpty]
        public ?InvoiceDigestType $invoiceDigest = null,
    ) {
        parent::__construct();
    }
}
