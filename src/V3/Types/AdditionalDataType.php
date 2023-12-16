<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\XmlElement;
use LightSideSoftware\NavApi\V3\Types\Annotations\DataNameTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText255NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText512NotBlankTypeValidation;

/**
 * További adat leírására szolgáló típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class AdditionalDataType extends BaseType
{
    public function __construct(
        /**
         * @var string Az adatmező egyedi azonosítója.
         */
        #[DataNameTypeValidation]
        #[XmlElement(cdata: false)]
        public string $dataName,

        /**
         * @var string Az adatmező tartalmának szöveges leírása
         */
        #[SimpleText255NotBlankTypeValidation]
        #[XmlElement(cdata: false)]
        public string $dataDescription,

        /**
         * @var string Az adat értéke.
         */
        #[SimpleText512NotBlankTypeValidation]
        #[XmlElement(cdata: false)]
        public string $dataValue,
    ) {
        parent::__construct();
    }
}
