<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use LightSideSoftware\NavApi\V3\Types\Annotations\StringValidation;

/**
 * A szállító (eladó) adatai.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class SupplierInfoType extends BaseType
{
    /**
     * @var TaxNumberType Belföldi adószám vagy csoportazonosító szám.
     */
    public TaxNumberType $supplierTaxNumber;

    /**
     * @var ?TaxNumberType
     */
    #[SkipWhenEmpty]
    public ?TaxNumberType $groupMemberTaxNumber = null;

    /**
     * @var ?string Közösségi adószám.
     */
    #[SkipWhenEmpty]
    #[StringValidation(minLength: 4, maxLength: 15, pattern: "[A-Z]{2}[0-9A-Z]{2,13}")]
    public ?string $communityVatNumber = null;

    /**
     * @var string Az eladó (szállító) neve.
     */
    #[StringValidation(minLength: 1, maxLength: 512)]
    public string $supplierName;

    /**
     * @var AddressType Az eladó (szállító) címe.
     */
    public AddressType $supplierAddress;

    /**
     * @var ?string Az eladó (szállító) bankszámlaszáma.
     */
    #[SkipWhenEmpty]
    #[StringValidation(minLength: 15, maxLength: 34, pattern: "[0-9]{8}[-][0-9]{8}[-][0-9]{8}|[0-9]{8}[-][0-9]{8}|[A-Z]{2}[0-9]{2}[0-9A-Za-z]{11,30}")]
    public ?string $supplierBankAccountNumber = null;

    /**
     * @var ?bool Értéke true, amennyiben az eladó (szállító) alanyi ÁFA mentes.
     */
    public ?bool $individualExemption = null;

    /**
     * @var ?string Az eladó adóraktári engedélyének vagy jövedéki engedélyének száma (2016. évi LXVIII. tv.).
     */
    #[SkipWhenEmpty]
    #[StringValidation(minLength: 1, maxLength: 50, pattern: ".*[^\s].*")]
    public ?string $exciseLicenceNum = null;
}
