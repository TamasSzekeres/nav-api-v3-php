<?php

use LightSideSoftware\NavApi\V3\Types\Enums\AnnulmentCodeType;
use LightSideSoftware\NavApi\V3\Types\InvoiceAnnulment;

it('throws no exceptions', function () {
    new InvoiceAnnulment(
        annulmentReference: 'REF00001',
        annulmentTimestamp: new DateTimeImmutable('2020-05-20 12:00:00.000'),
        annulmentCode: AnnulmentCodeType::ERRATIC_INVOICE_NUMBER,
        annulmentReason: 'REASON 001',
    );
})->throwsNoExceptions();
