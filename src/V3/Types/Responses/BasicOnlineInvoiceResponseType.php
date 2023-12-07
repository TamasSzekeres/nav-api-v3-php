<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Responses;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlNamespace;
use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\BasicResultType;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;

/**
 * Online Számla rendszerre specifikus általános válasz adatok.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/OSA/3.0/api', prefix: 'ns2')]
abstract readonly class BasicOnlineInvoiceResponseType extends BasicResponseType
{
    public function __construct(
        BasicHeaderType $header,
        BasicResultType $result,

        /**
         * @var SoftwareType A számlázóprogram adatai.
         */
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public SoftwareType $software,
    ) {
        parent::__construct($header, $result);
    }
}
