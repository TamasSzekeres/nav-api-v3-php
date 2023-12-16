<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use DateTimeImmutable;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceDateTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\PlateNumberTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\QuantityTypeValidation;

/**
 * Gázolaj adózottan történő beszerzésének adatai – 45/2016 (XI. 29.) NGM rendelet 75. § (1) a).
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
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
        #[InvoiceDateTypeValidation]
        #[Type("DateTimeImmutable<'Y-m-d'>")]
        public DateTimeImmutable $purchaseDate,

        /**
         * @var string Kereskedelmi jármű forgalmi rendszáma (csak betűk és számok).
         */
        #[PlateNumberTypeValidation]
        #[XmlElement(cdata: false)]
        public string $vehicleRegistrationNumber,

        /**
         * @var ?float Gépi bérmunka-szolgáltatás során felhasznált gázolaj mennyisége literben – Jöt. 117. § (2).
         */
        #[QuantityTypeValidation]
        #[SkipWhenEmpty]
        public ?float $dieselOilQuantity = null,
    ) {
        parent::__construct();
    }
}
