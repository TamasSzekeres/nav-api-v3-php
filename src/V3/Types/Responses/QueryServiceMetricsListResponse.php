<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Responses;

use JMS\Serializer\Annotation\SkipWhenEmpty;
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
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/OSA/3.0/metrics')]
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/NTCA/1.0/common', prefix: 'ns2')]
#[XmlRoot('QueryServiceMetricsListResponse')]
final readonly class QueryServiceMetricsListResponse extends BaseType
{
    public function __construct(
        /**
         * @var array<int, MetricDefinitionType> Metrika definíciói.
         */
        #[SkipWhenEmpty]
        #[Type('array<LightSideSoftware\NavApi\V3\Types\MetricDefinitionType>')]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/metrics')]
        #[XmlList(entry: 'metricDefinition', inline: true, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/metrics')]
        public array $metricDefinitions = [],
    ) {
        parent::__construct();
    }
}
