<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\CommunityVatNumberTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText50NotBlankTypeValidation;

/**
 * A vevő ÁFA alanyisági adatai.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
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
        #[CommunityVatNumberTypeValidation]
        public string $communityVatNumber,

        /**
         * @var string Harmadik országbeli adóazonosító.
         */
        #[SimpleText50NotBlankTypeValidation]
        public string $thirdStateTaxId,
    ) {
        parent::__construct();
    }
}
