<?php

namespace LightSideSoftware\NavApi\V3\Types\Requests;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlNamespace;
use JMS\Serializer\Annotation\XmlRoot;
use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;
use LightSideSoftware\NavApi\V3\Types\UserHeaderType;

/**
 * A POST /queryTransactionStatus REST operáció kérés típusa.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/NTCA/1.0/common', prefix: 'common')]
#[XmlRoot('QueryTransactionRequest')]
final readonly class QueryTransactionRequest extends BasicOnlineInvoiceRequestType
{

    public function __construct(
        BasicHeaderType $header,
        UserHeaderType $user,
        SoftwareType $software,

        /**
         * @var string Az adatszolgáltatás tranzakció azonosítója.
         */
        #[XmlElement(cdata: false)]
        public string $transactionId,

        /**
         * @var bool Jelöli, ha a kliens által beküldött eredeti tartalmat is vissza kell adni a válaszban.
         */
        public bool $returnOriginalRequest,
    ) {
        parent::__construct($header, $user, $software);
    }
}
