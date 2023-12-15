<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Responses;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlRoot;
use LightSideSoftware\NavApi\V3\Types\BaseType;
use LightSideSoftware\NavApi\V3\Types\ContextType;
use LightSideSoftware\NavApi\V3\Types\Enums\FunctionCodeType;

/**
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[XmlRoot('BusinessFault')]
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
        #[XmlElement(cdata: false)]
        public string $message,

        /**
         * @var string
         */
        #[XmlElement(cdata: false)]
        public string $faultType,

        /**
         * @var string
         */
        #[XmlElement(cdata: false)]
        public string $service,
    ) {
        parent::__construct();
    }
}
