<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use DateTimeImmutable;
use InvalidArgumentException;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceDateTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText255NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText50NotBlankTypeValidation;

/**
 * Új közlekedési eszköz értékesítés ÁFA tv. 89 § ill. 169 § o).
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class NewTransportMeanType extends BaseType
{
    public function __construct(
        /**
         * @var ?string Gyártmány/típus.
         */
        #[SimpleText50NotBlankTypeValidation]
        #[SkipWhenEmpty]
        public ?string $brand = null,

        /**
         * @var ?string Alvázszám/gyári szám/Gyártási szám.
         */
        #[SimpleText255NotBlankTypeValidation]
        #[SkipWhenEmpty]
        public ?string $serialNum = null,

        /**
         * @var ?string Motorszám.
         */
        #[SimpleText255NotBlankTypeValidation]
        #[SkipWhenEmpty]
        public ?string $engineNum = null,

        /**
         * @var ?DateTimeImmutable Első forgalomba helyezés időpontja.
         */
        #[InvoiceDateTypeValidation]
        #[SkipWhenEmpty]
        #[Type("DateTimeImmutable<'Y-m-d'>")]
        public ?DateTimeImmutable $firstEntryIntoService = null,

        /**
         * @var ?VehicleType Szárazföldi közlekedési eszköz további adatai.
         */
        #[SkipWhenEmpty]
        public ?VehicleType $vehicle = null,

        /**
         * @var ?VesselType Vízi jármű adatai.
         */
        #[SkipWhenEmpty]
        public ?VesselType $vessel = null,

        /**
         * @var ?AircraftType Légi közlekedési eszköz.
         */
        #[SkipWhenEmpty]
        public ?AircraftType $aircraft = null,
    ) {
        $numNotNullTransports =
            ($this->vehicle instanceof VehicleType ? 1 : 0) +
            ($this->vessel instanceof VesselType ? 1 : 0) +
            ($this->aircraft instanceof AircraftType ? 1 : 0);

        if ($numNotNullTransports != 1) {
            throw new InvalidArgumentException('A "vehicle", "vessel" és "aircraft" paraméterek közül pontosan egyet meg kell adni.');
        }

        parent::__construct();
    }
}
