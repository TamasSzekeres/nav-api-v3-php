<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceUnboundedIndexTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText50NotBlankTypeValidation;

/**
 * A módosítás vagy érvénytelenítés hivatkozási adatai.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class InvoiceReferenceType extends BaseType
{
    public function __construct(
        /**
         * @var string Az eredeti számla sorszáma, melyre a módosítás vonatkozik  - ÁFA tv. 170. § (1) c).
         */
        #[SimpleText50NotBlankTypeValidation]
        public string $originalInvoiceNumber,

        /**
         * @var bool Annak jelzése, hogy a módosítás olyan alapszámlára hivatkozik
         * amelyről nem történt és nem is fog történni adatszolgáltatás.
         */
        public bool $modifyWithoutMaster,

        /**
         * @var int A számlára vonatkozó módosító okirat egyedi sorszáma.
         */
        #[InvoiceUnboundedIndexTypeValidation]
        public int $modificationIndex,
    ) {
        parent::__construct();
    }
}
