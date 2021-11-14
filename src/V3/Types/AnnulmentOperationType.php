<?php

namespace LightSideSoftware\NavApi\V3\Types;

/**
 * A kéréshez tartozó technikai érvénytelenítő művelet.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class AnnulmentOperationType extends BaseType
{
    /**
     * @var int A technikai érvénytelenítés sorszáma a kérésen belül.
     */
    public $index;

    /**
     * @var string A kért technikai érvénytelenítés művelet típusa.
     */
    public $annulmentOperation;

    /**
     * @var string Technikai érvénytelenítés adatok BASE64-ben kódolt tartalma.
     */
    public $invoiceAnnulment;
}
