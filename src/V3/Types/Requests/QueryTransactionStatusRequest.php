<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Requests;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use LightSideSoftware\NavApi\V3\Types\Annotations\EntityIdTypeValidation;
use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;
use LightSideSoftware\NavApi\V3\Types\UserHeaderType;

/**
 * A POST /queryTransactionStatus REST operáció kérésének root elementje.
 *
 * @author Szekeres Tamás <szektam2@gamil.com>
 */
final readonly class QueryTransactionStatusRequest extends BasicOnlineInvoiceRequestType
{
    public function __construct(
        BasicHeaderType $header,
        UserHeaderType $user,
        SoftwareType $software,

        /**
         * @var string Az adatszolgáltatás tranzakció azonosítója.
         */
        #[EntityIdTypeValidation]
        public string $transactionId,

        /**
         * @var ?bool Jelöli, ha a kliens által beküldött eredeti tartalmat is vissza kell adni a válaszban.
         */
        #[SkipWhenEmpty]
        public ?bool $returnOriginalRequest = null,
    ) {
        parent::__construct($header, $user, $software);
    }
}
