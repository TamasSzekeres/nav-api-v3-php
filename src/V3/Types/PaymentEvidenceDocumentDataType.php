<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use DateTimeImmutable;
use JMS\Serializer\Annotation\Type;
use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceDateTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText255NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText50NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\StringValidation;

/**
 * A termékdíj bevallását igazoló dokumentum adatai a 2011. évi LXXXV. tv. 13. § (3) szerint és a 25. § (3) szerint.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class PaymentEvidenceDocumentDataType extends BaseType
{
    public function __construct(
        /**
         * @var string Számla sorszáma vagy egyéb okirat azonosító száma.
         */
        #[SimpleText50NotBlankTypeValidation]
        public string $evidenceDocumentNo,

        /**
         * @var DateTimeImmutable Számla kelte.
         */
        #[InvoiceDateTypeValidation]
        #[Type("DateTimeImmutable<'Y-m-d'>")]
        public DateTimeImmutable $evidenceDocumentDate,

        /**
         * @var string Kötelezett neve.
         */
        #[SimpleText255NotBlankTypeValidation]
        public string $obligatedName,

        /**
         * @var AddressType Kötelezett címe.
         */
        public AddressType $obligatedAddress,

        /**
         * @var TaxNumberType A kötelezett adószáma.
         */
        public TaxNumberType $obligatedTaxNumber,
    ) {
        parent::__construct();
    }
}
