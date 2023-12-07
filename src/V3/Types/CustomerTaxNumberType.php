<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;

/**
 * Adószám, amely alatt a számlán szereplő termékbeszerzés vagy szolgáltatás igénybevétele történt.
 * Lehet csoportazonosító szám is.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class CustomerTaxNumberType extends TaxNumberType
{
    public function __construct(
        string $taxpayerId,
        ?string $vatCode = null,
        ?string $countyCode = null,

        /**
         * @var ?TaxNumberType Csoport tag adószáma,
         * ha a termékbeszerzés vagy szolgáltatás igénybevétele csoportazonosító szám alatt történt.
         */
        #[SkipWhenEmpty]
        public ?TaxNumberType $groupMemberTaxNumber = null,
    ) {
        parent::__construct($taxpayerId, $vatCode, $countyCode);
    }
}
