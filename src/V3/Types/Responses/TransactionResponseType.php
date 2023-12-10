<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Responses;

use JMS\Serializer\Annotation\XmlElement;
use LightSideSoftware\NavApi\V3\Types\Annotations\EntityIdTypeValidation;
use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\BasicResultType;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;

/**
 * A POST /manageInvoice és a POST /manageAnnulment REST operáció közös válasz típusa.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
abstract readonly class TransactionResponseType extends BasicOnlineInvoiceResponseType
{
    public function __construct(
        BasicHeaderType $header,
        BasicResultType $result,
        SoftwareType $software,

        /**
         * @var string A kért operáció tranzakció azonosítója.
         */
        #[EntityIdTypeValidation]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public string $transactionId,
    ) {
        parent::__construct($header, $result, $software);
    }
}
