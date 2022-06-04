<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\IntegerValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\StringValidation;

/**
 * A módosítás vagy érvénytelenítés hivatkozási adatai.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class InvoiceReferenceType extends BaseType
{
    /**
     * @var string Az eredeti számla sorszáma, melyre a módosítás vonatkozik  - ÁFA tv. 170. § (1) c).
     */
    #[StringValidation(minLength: 1, maxLength: 50, pattern: ".*[^\s].*")]
    public string $originalInvoiceNumber;

    /**
     * @var bool Annak jelzése, hogy a módosítás olyan alapszámlára hivatkozik
     * amelyről nem történt és nem is fog történni adatszolgáltatás.
     */
    public bool $modifyWithoutMaster;

    /**
     * @var int A számlára vonatkozó módosító okirat egyedi sorszáma.
     */
    #[IntegerValidation(minInclusive: 1)]
    public int $modificationIndex;
}
