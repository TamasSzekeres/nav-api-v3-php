<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use LightSideSoftware\NavApi\V3\Types\Annotations\ArrayValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText1024NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText50NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\FunctionCodeType;

/**
 * Alap válaszeredmény adatok.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
readonly class BasicResultType extends BaseType
{
    public function __construct(
        /**
         * @var FunctionCodeType Feldolgozási eredmény.
         */
        #[Type("Enum<'LightSideSoftware\NavApi\V3\Types\Enums\FunctionCodeType'>")]
        public FunctionCodeType $funcCode,

        /**
         * @var ?string A feldolgozási hibakód.
         */
        #[SkipWhenEmpty]
        #[SimpleText50NotBlankTypeValidation]
        #[XmlElement(cdata: false)]
        public ?string $errorCode = null,

        /**
         * @var ?string Feldolgozási üzenet.
         */
        #[SkipWhenEmpty]
        #[SimpleText1024NotBlankTypeValidation]
        #[XmlElement(cdata: false)]
        public ?string $message = null,

        /**
         * @var array<int, NotificationType> Egyéb értesítések.
         */
        #[ArrayValidation(itemType: NotificationType::class)]
        #[SkipWhenEmpty]
        #[Type('array<LightSideSoftware\NavApi\V3\Types\NotificationType>')]
        #[XmlList(entry: 'notification', inline: false)]
        public array $notifications = [],
    ) {
        parent::__construct();
    }
}
