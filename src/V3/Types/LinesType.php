<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use LightSideSoftware\NavApi\V3\Types\Annotations\ArrayValidation;

/**
 * Termék/szolgáltatás tételek.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class LinesType extends BaseType
{
    public function __construct(
        /**
         * @var bool Jelöli, ha az adatszolgáltatás méretcsökkentés miatt összevont soradatokat tartalmaz.
         */
        public bool $mergedItemIndicator,

        /**
         * @var array<int, LineType> Termék/szolgáltatás tétel.
         */
        #[ArrayValidation(minItems: 1, itemType: LineType::class)]
        #[Type('array<LightSideSoftware\NavApi\V3\Types\LineType>')]
        #[XmlList(entry: 'line', inline: true)]
        public array $lines = [],
    ) {
        parent::__construct();
    }
}
