<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Responses;

use DateTimeImmutable;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlNamespace;
use JMS\Serializer\Annotation\XmlRoot;
use LightSideSoftware\NavApi\V3\Types\Annotations\ArrayValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceTimestampTypeValidation;
use LightSideSoftware\NavApi\V3\Types\BaseType;
use LightSideSoftware\NavApi\V3\Types\BasicResultType;
use LightSideSoftware\NavApi\V3\Types\MetricType;

/**
 * A GET /queryServiceMetrics REST operáció válaszának root elementje.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/NTCA/1.0/common')]
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/OSA/3.0/metrics', prefix: 'ns2')]
#[XmlRoot('QueryServiceMetricsResponse')]
final readonly class QueryServiceMetricsResponse extends BaseType
{
    public function __construct(
        /**
         * @var BasicResultType Alap válaszeredmény adatok.
         */
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/metrics')]
        public BasicResultType $result,

        /**
         * @var ?DateTimeImmutable Időbélyeg típus az Online Számla rendszerben.
         */
        #[InvoiceTimestampTypeValidation]
        #[SkipWhenEmpty]
        #[Type("DateTimeImmutable<'Y-m-d\TH:i:s.v\Z'>")]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/metrics')]
        public ?DateTimeImmutable $metricsLastUpdateTime = null,

        /**
         * @var array<int, MetricType> Metrikák adatai.
         */
        #[ArrayValidation(itemType: MetricType::class)]
        #[SkipWhenEmpty]
        #[Type('array<LightSideSoftware\NavApi\V3\Types\MetricType>')]
        #[XmlList(entry: 'metric', inline: true, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/metrics')]
        public array $metrics = [],
    ) {
        parent::__construct();
    }
}
