<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceIndexTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\ManageAnnulmentOperationType;

/**
 * A kéréshez tartozó technikai érvénytelenítő művelet.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class AnnulmentOperationType extends BaseType
{
    public function __construct(
        /**
         * @var int A technikai érvénytelenítés sorszáma a kérésen belül.
         */
        #[InvoiceIndexTypeValidation]
        public int $index,

        /**
         * @var ManageAnnulmentOperationType A kért technikai érvénytelenítés művelet típusa.
         */
        public ManageAnnulmentOperationType $annulmentOperation,

        /**
         * @var string Technikai érvénytelenítés adatok BASE64-ben kódolt tartalma.
         */
        public string $invoiceAnnulment,
    ) {
        parent::__construct();
    }
}
