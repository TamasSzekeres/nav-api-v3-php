<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Responses;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\BasicResultType;
use LightSideSoftware\NavApi\V3\Types\InvoiceDataResultType;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;

/**
 * A POST /queryInvoiceData REST operáció válaszának root elementjea.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class QueryInvoiceDataResponse extends BasicOnlineInvoiceResponseType
{
    public function __construct(
        BasicHeaderType $header,
        BasicResultType $result,
        SoftwareType $software,

        /**
         * @var ?InvoiceDataResultType A számla lekérdezés eredménye.
         */
        #[SkipWhenEmpty]
        public ?InvoiceDataResultType $invoiceDataResult = null,
    ) {
        parent::__construct($header, $result, $software);
    }
}
