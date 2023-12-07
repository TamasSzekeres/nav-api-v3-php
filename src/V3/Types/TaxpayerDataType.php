<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText200NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText512NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\TaxPayerIdTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\IncorporationType;

/**
 * Az adózó lekérdezés válasz adatai.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class TaxpayerDataType extends BaseType
{
    public function __construct(
        /**
         * @var string Az adózó neve.
         */
        #[SimpleText512NotBlankTypeValidation]
        public string $taxpayerName,

        /**
         * @var TaxNumberType Az adószám részletes adatai.
         */
        public TaxNumberType $taxNumberDetail,

        /**
         * @var IncorporationType Gazdasági típus.
         */
        public IncorporationType $incorporation,

        /**
         * @var ?string Az adózó rövidített neve.
         */
        #[SimpleText200NotBlankTypeValidation]
        #[SkipWhenEmpty]
        public ?string $taxpayerShortName = null,

        /**
         * @var ?string Az adózó ÁFA csoport tagsága.
         */
        #[SkipWhenEmpty]
        #[TaxPayerIdTypeValidation]
        public ?string $vatGroupMembership = null,

        /**
         * @var ?TaxpayerAddressListType Adózói cím lista típus.
         */
        #[SkipWhenEmpty]
        public ?TaxpayerAddressListType $taxpayerAddressList = null,
    ) {
        parent::__construct();
    }
}
