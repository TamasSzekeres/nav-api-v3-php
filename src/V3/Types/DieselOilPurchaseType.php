<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use DateTimeImmutable;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use LightSideSoftware\NavApi\V3\Types\Annotations\FloatValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\StringValidation;

/**
 * Gázolaj adózottan történő beszerzésének adatai – 45/2016 (XI. 29.) NGM rendelet 75. § (1) a).
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class DieselOilPurchaseType extends BaseType
{
    public function __construct(
        /**
         * @var SimpleAddressType Gázolaj beszerzés helye.
         */
        public SimpleAddressType $purchaseLocation,

        /**
         * @var DateTimeImmutable Gázolaj beszerzés dátuma.
         */
        #[Type("DateTimeImmutable<'Y-m-d'>")]
        public DateTimeImmutable $purchaseDate,

        /**
         * @var string Kereskedelmi jármű forgalmi rendszáma (csak betűk és számok).
         */
        #[StringValidation(minLength: 2, maxLength: 30, pattern: "[A-Z0-9ÖŐÜŰ]{2,30}")]
        public string $vehicleRegistrationNumber,

        /**
         * @var ?float Gépi bérmunka-szolgáltatás során felhasznált gázolaj mennyisége literben – Jöt. 117. § (2).
         */
        #[FloatValidation(totalDigits: 22, fractionDigits: 10)]
        #[SkipWhenEmpty]
        public ?float $dieselOilQuantity = null,
    ) {
        parent::__construct();
    }
}
