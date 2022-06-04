<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\IntegerValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\LineOperationType;

/**
 * Módosításról történő adatszolgáltatás esetén a tételsor módosítás jellegének jelölése.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class LineModificationReferenceType extends BaseType
{
    /**
     * @var int Az eredeti számla módosítással érintett tételének sorszáma (lineNumber).
     * Új tétel létrehozása esetén az új tétel sorszáma, a meglévő tételsorok számozásának folytatásaként.
     */
    #[IntegerValidation(minInclusive: 1)]
    public int $lineNumberReference;

    /**
     * @var LineOperationType A számlatétel módosításának jellege.
     */
    public LineOperationType $lineOperation;
}
