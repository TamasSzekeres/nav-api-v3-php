<?php

use LightSideSoftware\NavApi\V3\Types\NotificationType;

it('throws no exceptions', function () {
    new NotificationType(
        notificationCode: 'CODE 001',
        notificationText: 'Notification 001',
    );
})->throwsNoExceptions();
