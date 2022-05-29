<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

/**
 * Értesítés.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class NotificationType extends BaseType
{
    /**
     * @var string Értesítés kód.
     */
    public string $notificationCode;

    /**
     * @var string Értesítés szöveg.
     */
    public string $notificationText;
}
