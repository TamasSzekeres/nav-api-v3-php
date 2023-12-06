<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use LightSideSoftware\NavApi\V3\Types\Annotations\ArrayValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\ResponsePageTypeValidation;

/**
 * Számlalánc kivonat lekérdezés eredményei.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class InvoiceChainDigestResultType extends BaseType
{
    public function __construct(
        /**
         * @var int A jelenleg lekérdezett lapszám.
         */
        #[ResponsePageTypeValidation]
        public int $currentPage,

        /**
         * @var int A lekérdezés eredménye szerint elérhető utolsó lapszám.
         */
        #[ResponsePageTypeValidation]
        public int $availablePage,

        /**
         * @var array<int, InvoiceChainElementType> Számlalánc elemek.
         */
        #[ArrayValidation(itemType: InvoiceChainElementType::class)]
        #[SkipWhenEmpty]
        #[Type('array<LightSideSoftware\NavApi\V3\Types\InvoiceChainElementType>')]
        #[XmlList(entry: 'invoiceChainElement', inline: true)]
        public array $invoiceChainElements = [],
    ) {
        parent::__construct();
    }
}
