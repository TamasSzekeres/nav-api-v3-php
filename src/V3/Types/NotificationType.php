<?php

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
    public $notificationCode;

    /**
     * @var string Értesítés szöveg.
     */
    public $notificationText;
}
