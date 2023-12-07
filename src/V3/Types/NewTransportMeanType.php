<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use DateTimeImmutable;
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
    /**
     * @var ?VehicleType Szárazföldi közlekedési eszköz további adatai.
     */
    #[SkipWhenEmpty]
    public ?VehicleType $vehicle;

    /**
     * @var ?VesselType Vízi jármű adatai.
     */
    #[SkipWhenEmpty]
    public ?VesselType $vessel;

    /**
     * @var ?AircraftType Légi közlekedési eszköz.
     */
    #[SkipWhenEmpty]
    public ?AircraftType $aircraft;

    public function __construct(
        VehicleType|VesselType|AircraftType $transport,

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
    ) {
        $this->vehicle = ($transport instanceof VehicleType) ? $transport : null;
        $this->vessel = ($transport instanceof VesselType) ? $transport : null;
        $this->aircraft = ($transport instanceof AircraftType) ? $transport : null;

        parent::__construct();
    }
}
