<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use LightSideSoftware\NavApi\V3\Types\Enums\MetricTypeType;

/**
 * Metrika definíció típus.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class MetricDefinitionType extends BaseType
{
    /**
     * @var string Metrika neve.
     */
    #[XmlElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/metrics')]
    public string $metricName;

    /**
     * @var MetricTypeType Metrika típusa.
     */
    #[XmlElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/metrics')]
    public MetricTypeType $metricType;

    /**
     * @var array<MetricDescriptionType> Metrikák leírásai.
     */
    #[Type('array<LightSideSoftware\NavApi\V3\Types\MetricDescriptionType>')]
    #[XmlList(entry: 'metricDescription', inline: true, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/metrics')]
    public array $metricDescriptions;
}
