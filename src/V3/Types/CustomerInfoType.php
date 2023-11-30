<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use LightSideSoftware\NavApi\V3\Types\Annotations\StringValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\CustomerVatStatusType;

/**
 * A vevő adatai.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
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
        #[SkipWhenEmpty]
        #[StringValidation(minLength: 1, maxLength: 512, pattern: ".*[^\s].*")]
        public ?string $customerName = null,

        /**
         * @var ?AddressType A vevő címe.
         */
        #[SkipWhenEmpty]
        public ?AddressType $customerAddress = null,

        /**
         * @var ?string Vevő bankszámlaszáma.
         */
        #[SkipWhenEmpty]
        #[StringValidation(minLength: 15, maxLength: 34, pattern: "[0-9]{8}[-][0-9]{8}[-][0-9]{8}|[0-9]{8}[-][0-9]{8}|[A-Z]{2}[0-9]{2}[0-9A-Za-z]{11,30}")]
        public ?string $customerBankAccountNumber = null,
    ) {
        parent::__construct();
    }
}
