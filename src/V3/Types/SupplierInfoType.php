<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use LightSideSoftware\NavApi\V3\Types\Annotations\BankAccountNumberTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\CommunityVatNumberTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText50NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText512NotBlankTypeValidation;

/**
 * A szállító (eladó) adatai.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class SupplierInfoType extends BaseType
{
    public function __construct(
        /**
         * @var TaxNumberType Belföldi adószám vagy csoportazonosító szám.
         */
        public TaxNumberType $supplierTaxNumber,

        /**
         * @var string Az eladó (szállító) neve.
         */
        #[SimpleText512NotBlankTypeValidation]
        public string $supplierName,

        /**
         * @var AddressType Az eladó (szállító) címe.
         */
        public AddressType $supplierAddress,

        /**
         * @var ?TaxNumberType
         */
        #[SkipWhenEmpty]
        public ?TaxNumberType $groupMemberTaxNumber = null,

        /**
         * @var ?string Közösségi adószám.
         */
        #[CommunityVatNumberTypeValidation]
        #[SkipWhenEmpty]
        public ?string $communityVatNumber = null,

        /**
         * @var ?string Az eladó (szállító) bankszámlaszáma.
         */
        #[BankAccountNumberTypeValidation]
        #[SkipWhenEmpty]
        public ?string $supplierBankAccountNumber = null,

        /**
         * @var ?bool Értéke true, amennyiben az eladó (szállító) alanyi ÁFA mentes.
         */
        #[SkipWhenEmpty]
        public ?bool $individualExemption = null,

        /**
         * @var ?string Az eladó adóraktári engedélyének vagy jövedéki engedélyének száma (2016. évi LXVIII. tv.).
         */
        #[SimpleText50NotBlankTypeValidation]
        #[SkipWhenEmpty]
        public ?string $exciseLicenceNum = null,
    ) {
        parent::__construct();
    }
}
