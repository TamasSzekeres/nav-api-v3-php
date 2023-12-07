<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

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
        public string $notificationCode,

        /**
         * @var string Értesítés szöveg.
         */
        #[SimpleText1024NotBlankTypeValidation]
        public string $notificationText,
    ) {
        parent::__construct();
    }
}
