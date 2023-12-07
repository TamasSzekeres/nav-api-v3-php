<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use LightSideSoftware\NavApi\V3\Types\Annotations\ArrayValidation;

/**
 * Számlaadatok leírására szolgáló közös típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class InvoiceMainType extends BaseType
{
    public function __construct(
        /**
         * @var InvoiceType Egy számla vagy módosító okirat adatai.
         */
        public InvoiceType $invoice,

        /**
         * @var array<int, BatchInvoiceType> Kötegelt módosító okirat adatai.
         */
        #[ArrayValidation(itemType: BatchInvoiceType::class)]
        #[SkipWhenEmpty]
        #[Type('array<LightSideSoftware\NavApi\V3\Types\BatchInvoiceType>')]
        #[XmlList(entry: 'batchInvoice', inline: true)]
        public array $batchInvoices = [],
    ) {
        parent::__construct();
    }
}
