<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use DateTimeImmutable;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

/**
 * Metrika érték típus.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class MetricValueType extends BaseType
{
    public function __construct(
        /**
         * @var float Metrika értéke.
         */
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/metrics')]
        public float $value,

        /**
         * @var DateTimeImmutable Metrika értékének időpontja UTC időben.
         */
        #[Type("DateTimeImmutable<'Y-m-d\TH:i:s.v\Z'>")]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/metrics')]
        public DateTimeImmutable $timestamp,
    ) {
        parent::__construct();
    }
}
