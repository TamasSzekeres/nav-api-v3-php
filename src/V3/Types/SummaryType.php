<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use InvalidArgumentException;
use JMS\Serializer\Annotation\SkipWhenEmpty;

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
         * @var ?SummarySimplifiedType Egyszerűsített számla összesítés.
         */
        #[SkipWhenEmpty]
        public ?SummarySimplifiedType $summarySimplified = null,

        /**
         * @var ?SummaryGrossDataType A számla összesítő bruttó adatai.
         */
        #[SkipWhenEmpty]
        public ?SummaryGrossDataType $summaryGrossData = null,
    ) {
        if (
            (
                is_null($this->summaryNormal)
                && is_null($this->summarySimplified)
            ) || (
                ($this->summaryNormal instanceof SummaryNormalType)
                && ($this->summarySimplified instanceof SummarySimplifiedType)
            )
        ) {
            throw new InvalidArgumentException('A "summaryNormal" és "summarySimplified" paraméterek közül pontosan egyet meg kell adni.');
        }

        parent::__construct();
    }
}
