<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\StringValidation;

/**
 * A vevő ÁFA alanyisági adatai.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class CustomerVatDataType extends BaseType
{
    public function __construct(
        /**
         * @var CustomerTaxNumberType Belföldi adószám, amely alatt a számlán szereplő termékbeszerzés
         * vagy szolgáltatás igénybevétele történt. Lehet csoportazonosító szám is.
         */
        public CustomerTaxNumberType $customerTaxNumber,

        /**
         * @var string Közösségi adószám.
         */
        #[StringValidation(minLength: 4, maxLength: 15, pattern: "[A-Z]{2}[0-9A-Z]{2,13}")]
        public string $communityVatNumber,

        /**
         * @var string Harmadik országbeli adóazonosító.
         */
        #[StringValidation(minLength: 1, maxLength: 50, pattern: ".*[^\s].*")]
        public string $thirdStateTaxId,
    ) {
        parent::__construct();
    }
}
