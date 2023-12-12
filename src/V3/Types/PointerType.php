<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\XmlElement;
use LightSideSoftware\NavApi\V3\Types\Annotations\LineNumberTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText1024NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText50NotBlankTypeValidation;

/**
 * Feldolgozási kurzor adatok.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class PointerType extends BaseType
{
    public function __construct(
        /**
         * @var ?string Tag hivatkozás.
         */
        #[SimpleText1024NotBlankTypeValidation]
        #[SkipWhenEmpty]
        #[XmlElement(cdata: false)]
        public ?string $tag = null,

        /**
         * @var ?string Érték hivatkozás.
         */
        #[SimpleText1024NotBlankTypeValidation]
        #[SkipWhenEmpty]
        #[XmlElement(cdata: false)]
        public ?string $value = null,

        /**
         * @var ?int Sorhivatkozás.
         */
        #[LineNumberTypeValidation]
        #[SkipWhenEmpty]
        public ?int $line = null,

        /**
         * @var ?string Kötegelt számla művelet esetén az eredeti számla sorszáma, melyre a módosítás vonatkozik.
         */
        #[SimpleText50NotBlankTypeValidation]
        #[SkipWhenEmpty]
        #[XmlElement(cdata: false)]
        public ?string $originalInvoiceNumber = null,
    ) {
        parent::__construct();
    }
}
