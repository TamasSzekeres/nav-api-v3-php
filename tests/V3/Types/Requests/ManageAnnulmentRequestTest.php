<?php

use LightSideSoftware\NavApi\V3\Types\AnnulmentOperationType;
use LightSideSoftware\NavApi\V3\Types\Enums\ManageAnnulmentOperationType;
use LightSideSoftware\NavApi\V3\Types\Requests\ManageAnnulmentRequest;

test('convert manage-annulment-request to xml', function () {
    $request = new ManageAnnulmentRequest(
        header: BASIC_HEADER_TYPE_EXAMPLE,
        user: USER_HEADER_TYPE_EXAMPLE,
        software: SOFTWARE_TYPE_EXAMPLE,
        exchangeToken: 'dbd03076-1234-aaaa-bbbb-0cee3a6472572P11CS49ASIL',
        annulmentOperations: [
            new AnnulmentOperationType(
                index: 1,
                annulmentOperation: ManageAnnulmentOperationType::ANNUL,
                invoiceAnnulment: 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/Pgo8SW52b2ljZUFubnVsbWVudCB4bWxucz0iaHR0cDovL3NjaGVtYXMubmF2Lmdvdi5odS9PU0EvMy4wL2FubnVsIj4KCQk8YW5udWxtZW50UmVmZXJlbmNlPjIyMjIyMjIyPC9hbm51bG1lbnRSZWZlcmVuY2U+CgkJPGFubnVsbWVudFRpbWVzdGFtcD4yMDE4LTA2LTE4VDA5OjEwOjQ1LjMwOVo8L2FubnVsbWVudFRpbWVzdGFtcD4KCQk8YW5udWxtZW50Q29kZT5FUlJBVElDX0RBVEE8L2FubnVsbWVudENvZGU+CgkJPGFubnVsbWVudFJlYXNvbj5jcmVhdGUgc3phbWxhIGFubnVsPC9hbm51bG1lbnRSZWFzb24+CjwvSW52b2ljZUFubnVsbWVudD4=',
            ),
        ]
    );

    $expected = loadTestRequest('ManageAnnulmentRequest');

    $xml = $request->toXml(false);

    expect($xml)->toEqual($expected);
});
