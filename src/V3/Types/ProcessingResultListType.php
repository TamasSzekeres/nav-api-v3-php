<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use LightSideSoftware\NavApi\V3\Types\Enums\OriginalRequestVersionType;

/**
 * A kéréshez tartozó feldolgozási eredmények.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class ProcessingResultListType extends BaseType
{
    public function __construct(
        /**
         * @var ProcessingResultType Számla feldolgozási eredmény.
         */
        public ProcessingResultType $processingResult,

        /**
         * @var OriginalRequestVersionType Az adatszolgáltatás requestVersion értéke.
         */
        public OriginalRequestVersionType $originalRequestVersion,

        /**
         * @var ?AnnulmentDataType Technikai érvénytelenítés státusz adatai
         */
        #[SkipWhenEmpty]
        public ?AnnulmentDataType $annulmentData = null,
    ) {
        parent::__construct();
    }
}
