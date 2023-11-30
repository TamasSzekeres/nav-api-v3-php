<?php

namespace LightSideSoftware\NavApi\V3\Types;

/**
 * A kéréshez tartozó technikai érvénytelenítő művelet.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class AnnulmentOperationType extends BaseType
{
    public function __construct(
        /**
         * @var int A technikai érvénytelenítés sorszáma a kérésen belül.
         */
        public int $index,

        /**
         * @var string A kért technikai érvénytelenítés művelet típusa.
         */
        public string $annulmentOperation,

        /**
         * @var string Technikai érvénytelenítés adatok BASE64-ben kódolt tartalma.
         */
        public string $invoiceAnnulment,
    ) {
        parent::__construct();
    }
}
