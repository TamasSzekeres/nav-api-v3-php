<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use LightSideSoftware\NavApi\V3\Types\Annotations\ArrayValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\LineNumberTypeValidation;

/**
 * A számlán vagy módosító okiraton szereplő tételek kivonatos adatais.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class InvoiceLinesType extends BaseType
{
    public function __construct(
        /**
         * @var int A sorok száma közül a legmagasabb, amit a számla tartalmaz.
         */
        #[LineNumberTypeValidation]
        public int $maxLineNumber,

        /**
         * @var array<int, NewCreatedLinesType> A módosító okirat által újként létrehozott számlasorok.
         */
        #[ArrayValidation(itemType: NewCreatedLinesType::class)]
        #[SkipWhenEmpty]
        #[Type('array<LightSideSoftware\NavApi\V3\Types\NewCreatedLinesType>')]
        public array $newCreatedLines = [],
    ) {
        parent::__construct();
    }
}
