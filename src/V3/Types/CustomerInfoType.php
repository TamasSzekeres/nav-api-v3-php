<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\XmlElement;
use LightSideSoftware\NavApi\V3\Types\Annotations\BankAccountNumberTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText512NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\CustomerVatStatusType;

/**
 * A vevő adatai.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class CustomerInfoType extends BaseType
{
    public function __construct(
        /**
         * @var CustomerVatStatusType Vevő ÁFA szerinti státusza.
         */
        public CustomerVatStatusType $customerVatStatus,

        /**
         * @var ?CustomerVatDataType A vevő ÁFA alanyisági adatai.
         */
        #[SkipWhenEmpty]
        public ?CustomerVatDataType $customerVatData = null,

        /**
         * @var ?string A vevő neve.
         */
        #[SimpleText512NotBlankTypeValidation]
        #[SkipWhenEmpty]
        #[XmlElement(cdata: false)]
        public ?string $customerName = null,

        /**
         * @var ?AddressType A vevő címe.
         */
        #[SkipWhenEmpty]
        public ?AddressType $customerAddress = null,

        /**
         * @var ?string Vevő bankszámlaszáma.
         */
        #[BankAccountNumberTypeValidation]
        #[SkipWhenEmpty]
        #[XmlElement(cdata: false)]
        public ?string $customerBankAccountNumber = null,
    ) {
        parent::__construct();
    }
}
