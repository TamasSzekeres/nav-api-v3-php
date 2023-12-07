<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\LineNumberTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\LineOperationType;

/**
 * Módosításról történő adatszolgáltatás esetén a tételsor módosítás jellegének jelölése.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class LineModificationReferenceType extends BaseType
{
    public function __construct(
        /**
         * @var int Az eredeti számla módosítással érintett tételének sorszáma (lineNumber).
         * Új tétel létrehozása esetén az új tétel sorszáma, a meglévő tételsorok számozásának folytatásaként.
         */
        #[LineNumberTypeValidation]
        public int $lineNumberReference,

        /**
         * @var LineOperationType A számlatétel módosításának jellege.
         */
        public LineOperationType $lineOperation,
    ) {
        parent::__construct();
    }
}
