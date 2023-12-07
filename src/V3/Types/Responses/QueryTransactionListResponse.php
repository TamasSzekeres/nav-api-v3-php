<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Responses;

use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\BasicResultType;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;
use LightSideSoftware\NavApi\V3\Types\TransactionListResultType;

/**
 * A POST /queryTransactionList REST operáció válaszának root elementje.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class QueryTransactionListResponse extends BasicOnlineInvoiceResponseType
{
    public function __construct(
        BasicHeaderType $header,
        BasicResultType $result,
        SoftwareType $software,

        /**
         * @var TransactionListResultType Tranzakció lekérdezési eredményei.
         */
        public TransactionListResultType $transactionListResult,
    ) {
        parent::__construct($header, $result, $software);
    }
}
