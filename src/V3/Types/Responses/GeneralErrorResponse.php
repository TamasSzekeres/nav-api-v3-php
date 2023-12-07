<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Responses;

use JMS\Serializer\Annotation\XmlNamespace;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Online Számla rendszerre specifikus általános hibaválasz.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/NTCA/1.0/common')]
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/OSA/3.0/api', prefix: 'ns2')]
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/OSA/3.0/base', prefix: 'ns3')]
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/OSA/3.0/data', prefix: 'ns4')]
#[XmlRoot('GeneralErrorResponse')]
final readonly class GeneralErrorResponse extends GeneralErrorResponseType
{
}
