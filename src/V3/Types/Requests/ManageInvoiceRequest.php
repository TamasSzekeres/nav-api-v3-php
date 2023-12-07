<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Requests;

use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText50NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\InvoiceOperationListType;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;
use LightSideSoftware\NavApi\V3\Types\UserHeaderType;

/**
 * A POST /manageInvoice REST operáció kérésének root elementje.
 *
 * @author Szekeres Tamás <szektam2@gamil.com>
 */
final readonly class ManageInvoiceRequest extends BasicOnlineInvoiceRequestType
{
    public function __construct(
        BasicHeaderType $header,
        UserHeaderType $user,
        SoftwareType $software,

        /**
         * @var string A tranzakcióhoz kiadott egyedi és dekódolt token.
         */
        #[SimpleText50NotBlankTypeValidation]
        public string $exchangeToken,

        /**
         * @var InvoiceOperationListType A kéréshez tartozó kötegelt számlaműveletek.
         */
        public InvoiceOperationListType $invoiceOperations,
    ) {
        parent::__construct($header, $user, $software);
    }
}
