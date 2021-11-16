<?php

namespace LightSideSoftware\NavApi\V3\Types\Responses;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlNamespace;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;

/**
 * Online Számla rendszerre specifikus általános válasz adatok.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/OSA/3.0/api', prefix: 'ns2')]
abstract class BasicOnlineInvoiceResponseType extends BasicResponseType
{
    /**
     * @var SoftwareType A számlázóprogram adatai.
     */
    #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
    public SoftwareType $software;
}
