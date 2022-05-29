<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Requests;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlNamespace;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * A POST /queryTaxpayer REST operáció kérés típusa.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/NTCA/1.0/common', prefix: 'common')]
#[XmlRoot('QueryTaxpayerRequest')]
final class QueryTaxpayerRequest extends BasicOnlineInvoiceRequestType
{
    /**
     * @var string A lekérdezett adózó adószáma
     */
    #[XmlElement(cdata: false)]
    public string $taxNumber;
}
