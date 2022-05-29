<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;

/**
 * Metrika típus.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class MetricType extends BaseType
{
    /**
     * @var MetricDefinitionType Metrika definíció.
     */
    #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/metrics')]
    public MetricDefinitionType $metricDefinition;

    /**
     * @var array<MetricValueType> Metrika értékek.
     */
    #[Type('array<LightSideSoftware\NavApi\V3\Types\MetricValueType>')]
    #[XmlList(entry: 'metricValues', inline: true, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/metrics')]
    public array $metricValues;
}
