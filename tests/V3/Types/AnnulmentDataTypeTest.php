<?php

use LightSideSoftware\NavApi\V3\Types\AnnulmentDataType;
use LightSideSoftware\NavApi\V3\Types\Enums\AnnulmentVerificationStatusType;

it('throws no exceptions', function () {
    new AnnulmentDataType(
        annulmentVerificationStatus: AnnulmentVerificationStatusType::VERIFICATION_DONE,
        annulmentDecisionDate: new DateTimeImmutable('2020-05-20 12:00:00'),
        annulmentDecisionUser: 'User001',
    );
})->throwsNoExceptions();
