<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\XmlElement;
use LightSideSoftware\NavApi\V3\Types\Enums\LanguageType;

/**
 * Metrika leírás típus.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class MetricDescriptionType extends BaseType
{
    public function __construct(
        /**
         * @var LanguageType Nyelv megnevezés.
         */
        #[XmlElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/metrics')]
        public LanguageType $language,

        /**
         * @var string Lokalizált leírás.
         */
        #[XmlElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/metrics')]
        public string $localizedDescription,
    ) {
        parent::__construct();
    }
}
