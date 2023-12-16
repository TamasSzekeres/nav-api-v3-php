<?php

use LightSideSoftware\NavApi\V3\Types\Enums\LineOperationType;
use LightSideSoftware\NavApi\V3\Types\LineModificationReferenceType;

it('throws no exceptions', function () {
    new LineModificationReferenceType(
        lineNumberReference: 1,
        lineOperation: LineOperationType::CREATE,
    );
})->throwsNoExceptions();
