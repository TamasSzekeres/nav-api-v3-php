<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText100NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText1024NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\TechnicalResultCodeType;

/**
 * Technikai validációs választípus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class TechnicalValidationResultType extends BaseType
{
    public function __construct(
        /**
         * @var TechnicalResultCodeType Validációs eredmény.
         */
        #[Type("Enum<'LightSideSoftware\NavApi\V3\Types\Enums\TechnicalResultCodeType'>")]
        public TechnicalResultCodeType $validationResultCode,

        /**
         * @var ?string Validációs hibakód.
         */
        #[SimpleText100NotBlankTypeValidation]
        #[SkipWhenEmpty]
        #[XmlElement(cdata: false)]
        public ?string $validationErrorCode = null,

        /**
         * @var ?string Feldolgozási üzenet.
         */
        #[SimpleText1024NotBlankTypeValidation]
        #[SkipWhenEmpty]
        #[XmlElement(cdata: false)]
        public ?string $message = null,
    ) {
        parent::__construct();
    }
}
