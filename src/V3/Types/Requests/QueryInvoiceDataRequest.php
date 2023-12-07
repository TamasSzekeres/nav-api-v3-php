<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Requests;

use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\InvoiceNumberQueryType;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;
use LightSideSoftware\NavApi\V3\Types\UserHeaderType;

/**
 * A POST /queryInvoiceData REST operáció kérésének root elementje.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class QueryInvoiceDataRequest extends BasicOnlineInvoiceRequestType
{
    public function __construct(
        BasicHeaderType $header,
        UserHeaderType $user,
        SoftwareType $software,

        /**
         * @var InvoiceNumberQueryType Számla lekérdezés számlaszám paramétere.
         */
        public InvoiceNumberQueryType $invoiceNumberQuery,
    ) {
        parent::__construct($header, $user, $software);
    }
}
