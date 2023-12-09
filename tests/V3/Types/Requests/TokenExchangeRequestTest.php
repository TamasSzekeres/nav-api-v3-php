<?php

use LightSideSoftware\NavApi\V3\Exceptions\ValidationException;
use LightSideSoftware\NavApi\V3\Types\Requests\TokenExchangeRequest;

test('convert token-exchange-request to xml', function () {
    try {
        $request = new TokenExchangeRequest(
            header: BASIC_HEADER_TYPE_EXAMPLE,
            user: USER_HEADER_TYPE_EXAMPLE,
            software: SOFTWARE_TYPE_EXAMPLE,
        );

        $expected = loadTestRequest('TokenExchangeRequest');

        $xml = $request->toXml(false);

        expect($xml)->toEqual($expected);
    } catch (ValidationException) {
    }
});
