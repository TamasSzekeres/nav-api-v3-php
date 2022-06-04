<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use DateTimeImmutable;
use JMS\Serializer\Annotation\Type;
use LightSideSoftware\NavApi\V3\Types\Annotations\StringValidation;

/**
 * A termékdíj bevallását igazoló dokumentum adatai a 2011. évi LXXXV. tv. 13. § (3) szerint és a 25. § (3) szerint.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class PaymentEvidenceDocumentDataType extends BaseType
{
    /**
     * @var string Számla sorszáma vagy egyéb okirat azonosító száma.
     */
    #[StringValidation(minLength: 1, maxLength: 50)]
    public string $evidenceDocumentNo;

    /**
     * @var DateTimeImmutable Számla kelte.
     */
    #[Type("DateTimeImmutable<'Y-m-d'>")]
    public DateTimeImmutable $evidenceDocumentDate;

    /**
     * @var string Kötelezett neve.
     */
    #[StringValidation(minLength: 1, maxLength: 255)]
    public string $obligatedName;

    /**
     * @var AddressType Kötelezett címe.
     */
    public AddressType $obligatedAddress;

    /**
     * @var TaxNumberType A kötelezett adószáma.
     */
    public TaxNumberType $obligatedTaxNumber;
}
