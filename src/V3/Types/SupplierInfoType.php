<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\AccessorOrder;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\XmlElement;
use LightSideSoftware\NavApi\V3\Types\Annotations\BankAccountNumberTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\CommunityVatNumberTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText50NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText512NotBlankTypeValidation;

/**
 * A szállító (eladó) adatai.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[AccessorOrder(
    order: 'custom',
    custom: [
        'supplierTaxNumber',
        'groupMemberTaxNumber',
        'communityVatNumber',
        'supplierName',
        'supplierAddress',
        'supplierBankAccountNumber',
        'individualExemption',
        'exciseLicenceNum',
    ],
)]
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
        #[XmlElement(cdata: false)]
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
        #[XmlElement(cdata: false)]
        public ?string $communityVatNumber = null,

        /**
         * @var ?string Az eladó (szállító) bankszámlaszáma.
         */
        #[BankAccountNumberTypeValidation]
        #[SkipWhenEmpty]
        #[XmlElement(cdata: false)]
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
        #[XmlElement(cdata: false)]
        public ?string $exciseLicenceNum = null,
    ) {
        parent::__construct();
    }
}
