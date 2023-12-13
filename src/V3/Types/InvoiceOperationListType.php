<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use LightSideSoftware\NavApi\V3\Types\Annotations\ArrayValidation;

/**
 * A kéréshez tartozó kötegelt számlaműveletek.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class InvoiceOperationListType extends BaseType
{
    public function __construct(
        /**
         * @var bool Tömörített tartalom jelzése a feldolgozási folyamat számára.
         */
        public bool $compressedContent,

        /**
         * @var array<int, InvoiceOperationType> A kéréshez tartozó számlaművelet.
         */
        #[ArrayValidation(maxItems: 100, itemType: InvoiceOperationType::class)]
        #[Type('array<LightSideSoftware\NavApi\V3\Types\InvoiceOperationType>')]
        #[XmlList(entry: 'invoiceOperation', inline: true, skipWhenEmpty: false)]
        public array $invoiceOperations = [],
    ) {
        parent::__construct();
    }
}
