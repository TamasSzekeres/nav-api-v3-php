<?php

use LightSideSoftware\NavApi\V3\Types\InvoiceLinesType;
use LightSideSoftware\NavApi\V3\Types\NewCreatedLinesType;

it('throws no exceptions', function () {
    new InvoiceLinesType(
        maxLineNumber: 1,
        newCreatedLines: [
            new NewCreatedLinesType(
                lineNumberIntervalStart: 1,
                lineNumberIntervalEnd: 2,
            ),
        ],
    );
})->throwsNoExceptions();
