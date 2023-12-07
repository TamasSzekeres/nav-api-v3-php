<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Responses;

use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\BasicResultType;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;

/**
 * A POST /manageInvoice REST operáció válaszának root elementje.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class ManageInvoiceResponse extends TransactionResponseType
{
    public function __construct(
        BasicHeaderType $header,
        BasicResultType $result,
        SoftwareType $software,
        string $transactionId,
    ) {
        parent::__construct(
            $header,
            $result,
            $software,
            $transactionId,
        );
    }
}
