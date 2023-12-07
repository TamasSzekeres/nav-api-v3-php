<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Responses;

use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\BasicResultType;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;

/**
 * A POST /queryInvoiceCheck REST operáció válaszának root elementje.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class QueryInvoiceCheckResponse extends BasicOnlineInvoiceResponseType
{
    public function __construct(
        BasicHeaderType $header,
        BasicResultType $result,
        SoftwareType $software,

        /**
         * @var bool Jelöli, ha a lekérdezett számlaszám érvényesként szerepel a rendszerben
         * és a lekérdező adószáma kiállítóként vagy eladóként szerepel a számlán.
         */
        public bool $invoiceCheckResult,
    ) {
        parent::__construct($header, $result, $software);
    }
}
