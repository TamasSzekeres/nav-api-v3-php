<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Requests;

use LightSideSoftware\NavApi\V3\Types\Annotations\RequestPageTypeValidation;
use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\InvoiceChainQueryType;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;
use LightSideSoftware\NavApi\V3\Types\UserHeaderType;

/**
 * A POST /queryInvoiceChainDigest REST operáció kérésének root elementje.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class QueryInvoiceChainDigestRequest extends BasicOnlineInvoiceRequestType
{
    public function __construct(
        BasicHeaderType $header,
        UserHeaderType $user,
        SoftwareType $software,

        /**
         * @var int A lekérdezni kívánt lap száma.
         */
        #[RequestPageTypeValidation]
        public int $page,

        /**
         * @var InvoiceChainQueryType Számlalánc kivonat lekérdezés számlaszám paramétere.
         */
        public InvoiceChainQueryType $invoiceChainQuery,
    ) {
        parent::__construct($header, $user, $software);
    }
}
