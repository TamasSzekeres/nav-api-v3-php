<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\XmlElement;
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
        #[XmlElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public string $taxpayerName,

        /**
         * @var TaxNumberType Az adószám részletes adatai.
         */
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public TaxNumberType $taxNumberDetail,

        /**
         * @var IncorporationType Gazdasági típus.
         */
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public IncorporationType $incorporation,

        /**
         * @var ?string Az adózó rövidített neve.
         */
        #[SimpleText200NotBlankTypeValidation]
        #[SkipWhenEmpty]
        #[XmlElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?string $taxpayerShortName = null,

        /**
         * @var ?string Az adózó ÁFA csoport tagsága.
         */
        #[SkipWhenEmpty]
        #[TaxPayerIdTypeValidation]
        #[XmlElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?string $vatGroupMembership = null,

        /**
         * @var ?TaxpayerAddressListType Adózói cím lista típus.
         */
        #[SkipWhenEmpty]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?TaxpayerAddressListType $taxpayerAddressList = null,
    ) {
        parent::__construct();
    }
}
