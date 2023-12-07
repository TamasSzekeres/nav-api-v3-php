<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use LightSideSoftware\NavApi\V3\Types\Annotations\ArrayValidation;

/**
 * Metrika típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class MetricType extends BaseType
{
    public function __construct(
        /**
         * @var MetricDefinitionType Metrika definíció.
         */
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/metrics')]
        public MetricDefinitionType $metricDefinition,

        /**
         * @var array<int, MetricValueType> Metrika értékek.
         */
        #[ArrayValidation(maxItems: 60, itemType: MetricValueType::class)]
        #[SkipWhenEmpty]
        #[Type('array<LightSideSoftware\NavApi\V3\Types\MetricValueType>')]
        #[XmlList(entry: 'metricValues', inline: true, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/metrics')]
        public array $metricValues = [],
    ) {
        parent::__construct();
    }
}
