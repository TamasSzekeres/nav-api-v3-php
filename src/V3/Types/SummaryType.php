<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use InvalidArgumentException;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use LightSideSoftware\NavApi\V3\Types\Annotations\ArrayValidation;

/**
 * Számla összesítés adatai.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class SummaryType extends BaseType
{
    public function __construct(
        /**
         * @var ?SummaryNormalType Számla összesítés (nem egyszerűsített számla esetén).
         */
        #[SkipWhenEmpty]
        public ?SummaryNormalType $summaryNormal = null,

        /**
         * @var array<int, SummarySimplifiedType> Egyszerűsített számla összesítés.
         */
        #[ArrayValidation(itemType: SummarySimplifiedType::class)]
        #[SkipWhenEmpty]
        #[Type('array<LightSideSoftware\NavApi\V3\Types\SummarySimplifiedType>')]
        #[XmlList(entry: 'summarySimplified', inline: true)]
        public array $summariesSimplified = [],

        /**
         * @var ?SummaryGrossDataType A számla összesítő bruttó adatai.
         */
        #[SkipWhenEmpty]
        public ?SummaryGrossDataType $summaryGrossData = null,
    ) {
        if (
            (
                is_null($this->summaryNormal)
                && empty($this->summariesSimplified)
            ) || (
                ($this->summaryNormal instanceof SummaryNormalType)
                && !empty($this->summariesSimplified)
            )
        ) {
            throw new InvalidArgumentException('A "summaryNormal" és "summariesSimplified" paraméterek közül pontosan egyet meg kell adni.');
        }

        parent::__construct();
    }
}
