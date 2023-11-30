<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use LightSideSoftware\NavApi\V3\Types\Annotations\StringValidation;

/**
 * A pénzügyi képviselő adatai.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class FiscalRepresentativeType extends BaseType
{
    public function __construct(
        /**
         * @var TaxNumberType A pénzügyi képviselő adószáma.
         */
        public TaxNumberType $fiscalRepresentativeTaxNumber,

        /**
         * @var string A pénzügyi képviselő neve.
         */
        #[StringValidation(minLength: 1, maxLength: 512, pattern: ".*[^\s].*")]
        public string $fiscalRepresentativeName,

        /**
         * @var AddressType Pénzügyi képviselő címe.
         */
        public AddressType $fiscalRepresentativeAddress,

        /**
         * @var ?string Pénzügyi képviselő által a számla kibocsátó (eladó) számára megnyitott bankszámla bankszámlaszáma.
         */
        #[SkipWhenEmpty]
        #[StringValidation(minLength: 15, maxLength: 34, pattern: "[0-9]{8}[-][0-9]{8}[-][0-9]{8}|[0-9]{8}[-][0-9]{8}|[A-Z]{2}[0-9]{2}[0-9A-Za-z]{11,30}")]
        public ?string $fiscalRepresentativeBankAccountNumber = null,
    ) {
        parent::__construct();
    }
}
