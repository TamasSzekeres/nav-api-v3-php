<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\XmlElement;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText200NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText50NotBlankTypeValidation;

/**
 * Mentesség, kivétel részletes indokolása.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class DetailedReasonType extends BaseType
{
    public function __construct(
        /**
         * @var string Az eset leírása kóddal.
         */
        #[SimpleText50NotBlankTypeValidation]
        #[XmlElement(cdata: false)]
        public string $case,

        /**
         * @var string Az eset leírása szöveggel.
         */
        #[SimpleText200NotBlankTypeValidation]
        #[XmlElement(cdata: false)]
        public string $reason,
    ) {
        parent::__construct();
    }
}
