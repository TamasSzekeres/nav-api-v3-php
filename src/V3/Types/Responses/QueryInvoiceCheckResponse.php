<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Responses;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlNamespace;
use JMS\Serializer\Annotation\XmlRoot;
use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\BasicResultType;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;

/**
 * A POST /queryInvoiceCheck REST operáció válaszának root elementje.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/NTCA/1.0/common')]
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/OSA/3.0/api', prefix: 'ns2')]
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/OSA/3.0/base', prefix: 'ns3')]
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/OSA/3.0/data', prefix: 'ns4')]
#[XmlRoot('QueryInvoiceCheckResponse')]
final readonly class QueryInvoiceCheckResponse extends BasicOnlineInvoiceResponseType
{
    public function __construct(
        BasicHeaderType $header,
        BasicResultType $result,
        SoftwareType $software,

        /**
         * @var bool Jelöli, ha a lekérdezett számlaszám érvényesként szerepel a rendszerben
         * és a lekérdező adószáma kiállítóként vagy eladóként szerepel a számlán.
         */
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public bool $invoiceCheckResult,
    ) {
        parent::__construct($header, $result, $software);
    }
}
