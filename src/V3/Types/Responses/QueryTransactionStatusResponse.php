<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Responses;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\BasicResultType;
use LightSideSoftware\NavApi\V3\Types\ProcessingResultListType;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;

/**
 * A POST /queryTransactionStatus REST operáció válaszának root elementje.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class QueryTransactionStatusResponse extends BasicOnlineInvoiceResponseType
{
    public function __construct(
        BasicHeaderType $header,
        BasicResultType $result,
        SoftwareType $software,

        /**
         * @var ?ProcessingResultListType A kérésben szereplő számlák feldolgozási státusza.
         */
        #[SkipWhenEmpty]
        public ?ProcessingResultListType $processingResults = null,
    ) {
        parent::__construct($header, $result, $software);
    }
}
