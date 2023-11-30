<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Responses;

use LightSideSoftware\NavApi\V3\Types\BaseType;
use LightSideSoftware\NavApi\V3\Types\ContextType;
use LightSideSoftware\NavApi\V3\Types\Enums\FunctionCodeType;

/**
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class BusinessFaultResponse extends BaseType
{
    public function __construct(
        /**
         * @var ContextType
         */
        public ContextType $context,

        /**
         * @var FunctionCodeType
         */
        public FunctionCodeType $funcCode,

        /**
         * @var string
         */
        public string $message,

        /**
         * @var string
         */
        public string $faultType,

        /**
         * @var string
         */
        public string $service,
    ) {
        parent::__construct();
    }
}
