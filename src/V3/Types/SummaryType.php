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
    /**
     * @var ?SummaryNormalType Számla összesítés (nem egyszerűsített számla esetén).
     */
    #[SkipWhenEmpty]
    public ?SummaryNormalType $summaryNormal;

    /**
     * @var ?SummarySimplifiedType Egyszerűsített számla összesítés.
     */
    #[SkipWhenEmpty]
    public ?SummarySimplifiedType $summarySimplified;

    public function __construct(
        SummaryNormalType|SummarySimplifiedType $summary,

        /**
         * @var ?SummaryGrossDataType A számla összesítő bruttó adatai.
         */
        #[SkipWhenEmpty]
        public ?SummaryGrossDataType $summaryGrossData = null,
    ) {
        $this->summaryNormal = ($summary instanceof SummaryNormalType) ? $summary : null;
        $this->summarySimplified = ($summary instanceof SummarySimplifiedType) ? $summary : null;

        parent::__construct();
    }
}
