<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\XmlElement;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText100NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText1024NotBlankTypeValidation;

/**
 * Értesítés.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class NotificationType extends BaseType
{
    public function __construct(
        /**
         * @var string Értesítés kód.
         */
        #[SimpleText100NotBlankTypeValidation]
        #[XmlElement(cdata: false)]
        public string $notificationCode,

        /**
         * @var string Értesítés szöveg.
         */
        #[SimpleText1024NotBlankTypeValidation]
        #[XmlElement(cdata: false)]
        public string $notificationText,
    ) {
        parent::__construct();
    }
}
