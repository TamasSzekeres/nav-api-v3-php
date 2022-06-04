<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;

/**
 * Adószám, amely alatt a számlán szereplő termékbeszerzés vagy szolgáltatás igénybevétele történt.
 * Lehet csoportazonosító szám is.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class CustomerTaxNumberType extends TaxNumberType
{
    /**
     * @var ?TaxNumberType Csoport tag adószáma,
     * ha a termékbeszerzés vagy szolgáltatás igénybevétele csoportazonosító szám alatt történt.
     */
    #[SkipWhenEmpty]
    public ?TaxNumberType $groupMemberTaxNumber = null;
}
