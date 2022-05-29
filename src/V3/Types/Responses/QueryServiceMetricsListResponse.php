<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Responses;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlNamespace;
use JMS\Serializer\Annotation\XmlRoot;
use LightSideSoftware\NavApi\V3\Types\BaseType;
use LightSideSoftware\NavApi\V3\Types\MetricDefinitionType;

/**
 * A GET /queryServiceMetrics/list REST operáció válaszának root elementje.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/OSA/3.0/metrics')]
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/NTCA/1.0/common', prefix: 'ns2')]
#[XmlRoot('QueryServiceMetricsListResponse')]
final class QueryServiceMetricsListResponse extends BaseType
{
    /**
     * @var array<MetricDefinitionType> Metrika definíciói.
     */
    #[Type('array<LightSideSoftware\NavApi\V3\Types\MetricDefinitionType>')]
    #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/metrics')]
    #[XmlList(entry: 'metricDefinition', inline: true, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/metrics')]
    public array $metricDefinitions = [];
}
