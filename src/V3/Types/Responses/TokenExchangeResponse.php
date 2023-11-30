<?php

namespace LightSideSoftware\NavApi\V3\Types\Responses;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlNamespace;
use JMS\Serializer\Annotation\XmlRoot;
use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\BasicResultType;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;

/**
 * A POST /tokenExchange REST operáció válasz típusa.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/NTCA/1.0/common')]
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/OSA/3.0/api', prefix: 'ns2')]
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/OSA/3.0/base', prefix: 'ns3')]
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/OSA/3.0/data', prefix: 'ns4')]
#[XmlRoot('TokenExchangeResponse')]
final readonly class TokenExchangeResponse extends BasicOnlineInvoiceResponseType
{
    public function __construct(
        BasicHeaderType $header,
        BasicResultType $result,
        SoftwareType $software,

        /**
         * @var string A kiadott exchange token AES-128 ECB algoritmussal kódolt alakja.
         */
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public string $encodedExchangeToken,

        /**
         * @var string A kiadott token érvényességének kezdete.
         */
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public string $tokenValidityFrom,

        /**
         * @var string A kiadott token érvényességének vége.
         */
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public string $tokenValidityTo,
    ) {
        parent::__construct($header, $result, $software);
    }
}
