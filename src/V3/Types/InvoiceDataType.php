<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use DateTimeImmutable;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceDateTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText50NotBlankTypeValidation;

/**
 * A számla adatszolgáltatás adatai.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
abstract readonly class InvoiceDataType extends BaseType
{
    public function __construct(
        /**
         * @var string Számla vagy módosító okirat sorszáma - ÁFA tv. 169. § b) vagy 170. § (1) bek. b) pont.
         */
        #[SimpleText50NotBlankTypeValidation]
        #[XmlElement(cdata: false)]
        public string $invoiceNumber,

        /**
         * @var DateTimeImmutable Számla vagy módosító okirat kelte - ÁFA tv. 169. § a), ÁFA tv. 170. § (1) bek. a).
         */
        #[InvoiceDateTypeValidation]
        #[Type("DateTimeImmutable<'Y-m-d'>")]
        public DateTimeImmutable $invoiceIssueDate,

        /**
         * @var bool Jelöli, ha az adatszolgáltatás maga a számla (a számlán nem szerepel több adat).
         */
        public bool $completenessIndicator,

        /**
         * @var InvoiceMainType Számlaadatok leírására szolgáló közös típus
         */
        public InvoiceMainType $invoiceMain,
    ) {
        parent::__construct();
    }
}
