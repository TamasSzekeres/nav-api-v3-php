<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use DateTimeImmutable;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use LightSideSoftware\NavApi\V3\Types\Annotations\StringValidation;

/**
 * Új közlekedési eszköz értékesítés ÁFA tv. 89 § ill. 169 § o).
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class NewTransportMeanType extends BaseType
{
    /**
     * @var ?string Gyártmány/típus.
     */
    #[SkipWhenEmpty]
    #[StringValidation(minLength: 1, maxLength: 50, pattern: ".*[^\s].*")]
    public ?string $brand = null;

    /**
     * @var ?string Alvázszám/gyári szám/Gyártási szám.
     */
    #[SkipWhenEmpty]
    #[StringValidation(minLength: 1, maxLength: 255, pattern: ".*[^\s].*")]
    public ?string $serialNum = null;

    /**
     * @var ?string Motorszám.
     */
    #[SkipWhenEmpty]
    #[StringValidation(minLength: 1, maxLength: 255, pattern: ".*[^\s].*")]
    public ?string $engineNum = null;

    /**
     * @var ?DateTimeImmutable Első forgalomba helyezés időpontja.
     */
    #[SkipWhenEmpty]
    #[Type("DateTimeImmutable<'Y-m-d'>")]
    public ?DateTimeImmutable $firstEntryIntoService = null;

    /**
     * @var VehicleType Szárazföldi közlekedési eszköz további adatai.
     */
    public VehicleType $vehicle;

    /**
     * @var VesselType Vízi jármű adatai.
     */
    public VesselType $vessel;

    /**
     * @var AircraftType Légi közlekedési eszköz.
     */
    public AircraftType $aircraft;
}
