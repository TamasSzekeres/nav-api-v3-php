<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Responses;

use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\BasicResultType;
use LightSideSoftware\NavApi\V3\Types\InvoiceDigestResultType;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;

/**
 * A POST /queryInvoiceDigest REST operáció válaszának root elementje.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class QueryInvoiceDigestResponse extends BasicOnlineInvoiceResponseType
{
    public function __construct(
        BasicHeaderType $header,
        BasicResultType $result,
        SoftwareType $software,

        /**
         * @var InvoiceDigestResultType A számla kivonat lekérdezés eredményei.
         */
        public InvoiceDigestResultType $invoiceDigestResult,
    ) {
        parent::__construct($header, $result, $software);
    }
}
