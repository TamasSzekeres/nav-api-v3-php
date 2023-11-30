<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;

/**
 * Számla összesítés adatai.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
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
        parent::__construct();
    }
}
