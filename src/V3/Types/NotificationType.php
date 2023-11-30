<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\StringValidation;

/**
 * Értesítés.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class NotificationType extends BaseType
{
    public function __construct(
        /**
         * @var string Értesítés kód.
         */
        #[StringValidation(minLength: 1, maxLength: 100)]
        public string $notificationCode,

        /**
         * @var string Értesítés szöveg.
         */
        #[StringValidation(minLength: 1, maxLength: 1024)]
        public string $notificationText,
    ) {
        parent::__construct();
    }
}
