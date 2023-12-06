<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText100NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText512NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\BusinessResultCodeType;

/**
 * Üzleti validációs választípus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class BusinessValidationResultType extends BaseType
{
    public function __construct(
        /**
         * @var BusinessResultCodeType Validációs eredmény.
         */
        public BusinessResultCodeType $validationResultCode,

        /**
         * @var ?string Validációs hibakód.
         */
        #[SimpleText100NotBlankTypeValidation]
        #[SkipWhenEmpty]
        public ?string $validationErrorCode = null,

        /**
         * @var ?string Feldolgozási üzenet.
         */
        #[SimpleText512NotBlankTypeValidation]
        #[SkipWhenEmpty]
        public ?string $message = null,

        /**
         * @var ?PointerType Feldolgozási kurzor adatok.
         */
        #[SkipWhenEmpty]
        public ?PointerType $pointer = null,
    ) {
        parent::__construct();
    }
}
