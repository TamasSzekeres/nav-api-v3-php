<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceIndexTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\ManageInvoiceOperationType;

/**
 * A kéréshez tartozó számlaművelet.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class InvoiceOperationType extends BaseType
{
    public function __construct(
        /**
         * @var int A számla sorszáma a kérésen belül.
         */
        #[InvoiceIndexTypeValidation]
        public int $index,

        /**
         * @var ManageInvoiceOperationType A kért számla művelet típusa.
         */
        #[Type("Enum<'LightSideSoftware\NavApi\V3\Types\Enums\ManageInvoiceOperationType'>")]
        public ManageInvoiceOperationType $invoiceOperation,

        /**
         * @var string Számla adatok BASE64-ben kódolt tartalma.
         */
        #[XmlElement(cdata: false)]
        public string $invoiceData,

        /**
         * @var ?CryptoType Elektronikus számla vagy módosító okirat állomány hash lenyomata.
         */
        #[SkipWhenEmpty]
        public ?CryptoType $electronicInvoiceHash = null,
    ) {
        parent::__construct();
    }
}
