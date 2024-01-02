<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use LightSideSoftware\NavApi\V3\Types\Annotations\ArrayValidation;
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
         * @var array<int, ProcessingResultType> Számla feldolgozási eredmény.
         */
        #[ArrayValidation(itemType: ProcessingResultType::class)]
        #[Type('array<LightSideSoftware\NavApi\V3\Types\ProcessingResultType>')]
        #[XmlList(entry: 'processingResult', inline: true, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public array $processingResults,

        /**
         * @var OriginalRequestVersionType Az adatszolgáltatás requestVersion értéke.
         */
        #[Type("Enum<'LightSideSoftware\NavApi\V3\Types\Enums\OriginalRequestVersionType'>")]
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
