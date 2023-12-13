<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use InvalidArgumentException;
use JMS\Serializer\Annotation\SkipWhenEmpty;
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
        #[SkipWhenEmpty]
        public ?CustomerTaxNumberType $customerTaxNumber = null,

        /**
         * @var string Közösségi adószám.
         */
        #[CommunityVatNumberTypeValidation]
        #[SkipWhenEmpty]
        public ?string $communityVatNumber = null,

        /**
         * @var string Harmadik országbeli adóazonosító.
         */
        #[SimpleText50NotBlankTypeValidation]
        #[SkipWhenEmpty]
        public ?string $thirdStateTaxId = null,
    ) {
        $hasCustomerTaxNumber = ($this->customerTaxNumber instanceof CustomerTaxNumberType);
        $hasCommunityVatNumber = is_string($this->communityVatNumber);
        $hasThirdStateTaxId = is_string($this->thirdStateTaxId);

        $numNotNullProperties =
            ($hasCustomerTaxNumber ? 1 : 0) +
            ($hasCommunityVatNumber ? 1 : 0) +
            ($hasThirdStateTaxId ? 1 : 0);

        if ($numNotNullProperties != 1) {
            throw new InvalidArgumentException('A "customerTaxNumber", "communityVatNumber" és "thirdStateTaxId" paraméterek küzöl pontosan egyet meg kell adni.');
        }

        parent::__construct();
    }
}
