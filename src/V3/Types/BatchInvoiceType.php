<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\IntegerValidation;

/**
 * Kötegelt módosító okirat adatai.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class BatchInvoiceType extends BaseType
{
    /**
     * @var int A módosító okirat sorszáma a kötegen belül.
     */
    #[IntegerValidation(minInclusive: 1)]
    public int $batchIndex;

    /**
     * @var InvoiceType Egy számla vagy módosító okirat adatai.
     */
    public InvoiceType $invoice;
}
