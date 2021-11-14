<?php

namespace LightSideSoftware\NavApi\V3\Types\Requests;

use JMS\Serializer\Annotation\XmlNamespace;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * A POST /tokenExchange REST operáció kérésének root elementje.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 *
 * @XmlNamespace(uri="http://schemas.nav.gov.hu/OSA/3.0/api")
 * @XmlNamespace(uri="http://schemas.nav.gov.hu/NTCA/1.0/common", prefix="common")
 * @XmlRoot("TokenExchangeRequest")
 */
final class TokenExchangeRequest extends BasicOnlineInvoiceRequestType
{
}
