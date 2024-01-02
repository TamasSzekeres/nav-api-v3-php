<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use LightSideSoftware\NavApi\V3\Types\Annotations\EntityIdTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceIndexTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\ManageInvoiceOperationType;

/**
 * A számla lekérdezés tranzakciós paraméterei.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class TransactionQueryParamsType extends BaseType
{
    public function __construct(
        /**
         * @var string Az adatszolgáltatás tranzakció azonosítója.
         */
        #[EntityIdTypeValidation]
        #[XmlElement(cdata: false)]
        public string $transactionId,

        /**
         * @var ?int A számla sorszáma a kérésen belül.
         */
        #[InvoiceIndexTypeValidation]
        #[SkipWhenEmpty]
        public ?int $index = null,

        /**
         * @var ?ManageInvoiceOperationType Számlaművelet típus.
         */
        #[SkipWhenEmpty]
        #[Type("Enum<'LightSideSoftware\NavApi\V3\Types\Enums\ManageInvoiceOperationType'>")]
        public ?ManageInvoiceOperationType $invoiceOperation = null,
    ) {
        parent::__construct();
    }
}
