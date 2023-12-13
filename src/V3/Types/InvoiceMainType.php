<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use InvalidArgumentException;
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
        public ?InvoiceType $invoice = null,

        /**
         * @var array<int, BatchInvoiceType> Kötegelt módosító okirat adatai.
         */
        #[ArrayValidation(itemType: BatchInvoiceType::class)]
        #[SkipWhenEmpty]
        #[Type('array<LightSideSoftware\NavApi\V3\Types\BatchInvoiceType>')]
        #[XmlList(entry: 'batchInvoice', inline: true)]
        public array $batchInvoices = [],
    ) {
        if (
            is_null($this->invoice)
            && empty($this->batchInvoices)
        ) {
            throw new InvalidArgumentException('Az "invoice" és "batchInvoices" paraméterek közül egyet meg kell adni.');
        }

        if (
            ($this->invoice instanceof InvoiceType)
            && !empty($this->batchInvoices)
        ) {
            throw new InvalidArgumentException('Az "invoice" és "batchInvoices" paraméterek közül csak egyet lehet megadni.');
        }

        parent::__construct();
    }
}
