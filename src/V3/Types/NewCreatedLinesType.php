<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\LineNumberTypeValidation;

/**
 * A módosító okirat által újként létrehozott számlasorok.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class NewCreatedLinesType extends BaseType
{
    public function __construct(
        /**
         * @var int Számla sor intervallum kezdete.
         */
        #[LineNumberTypeValidation]
        public int $lineNumberIntervalStart,

        /**
         * @var int Számla sor intervallum vége (inkluzív).
         */
        #[LineNumberTypeValidation]
        public int $lineNumberIntervalEnd,
    ) {
        parent::__construct();
    }
}
