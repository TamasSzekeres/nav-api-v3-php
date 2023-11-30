<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use LightSideSoftware\NavApi\V3\Types\Annotations\StringValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\TechnicalResultCodeType;

/**
 * Technikai validációs választípus.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class TechnicalValidationResultType extends BaseType
{
    public function __construct(
        /**
         * @var TechnicalResultCodeType Validációs eredmény.
         */
        public TechnicalResultCodeType $validationResultCode,

        /**
         * @var ?string Validációs hibakód.
         */
        #[SkipWhenEmpty]
        #[StringValidation(minLength: 0, maxLength: 100)]
        public ?string $validationErrorCode = null,

        /**
         * @var ?string Feldolgozási üzenet.
         */
        #[SkipWhenEmpty]
        #[StringValidation(minLength: 0, maxLength: 1024)]
        public ?string $message = null,
    ) {
        parent::__construct();
    }
}
