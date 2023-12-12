<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\XmlElement;
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
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ProcessingResultType $processingResult,

        /**
         * @var OriginalRequestVersionType Az adatszolgáltatás requestVersion értéke.
         */
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public OriginalRequestVersionType $originalRequestVersion,

        /**
         * @var ?AnnulmentDataType Technikai érvénytelenítés státusz adatai
         */
        #[SkipWhenEmpty]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?AnnulmentDataType $annulmentData = null,
    ) {
        parent::__construct();
    }
}
