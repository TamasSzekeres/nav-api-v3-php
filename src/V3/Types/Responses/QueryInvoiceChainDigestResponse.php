<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Responses;

use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\BasicResultType;
use LightSideSoftware\NavApi\V3\Types\InvoiceChainDigestResultType;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;

/**
 * A POST /queryInvoiceChainDigest REST operáció válaszának root elementje.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class QueryInvoiceChainDigestResponse extends BasicOnlineInvoiceResponseType
{
    public function __construct(
        BasicHeaderType $header,
        BasicResultType $result,
        SoftwareType $software,

        /**
         * @var InvoiceChainDigestResultType Számlalánc kivonat lekérdezés eredményei.
         */
        public InvoiceChainDigestResultType $invoiceChainDigestResult,
    ) {
        parent::__construct($header, $result, $software);
    }
}
