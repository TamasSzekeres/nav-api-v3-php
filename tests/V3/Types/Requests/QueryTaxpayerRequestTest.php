<?php

use LightSideSoftware\NavApi\V3\Types\Requests\QueryTaxpayerRequest;

test('convert query-taxpayer-request to xml', function () {
    $request = new QueryTaxpayerRequest(
        header: BASIC_HEADER_TYPE_EXAMPLE,
        user: USER_HEADER_TYPE_EXAMPLE,
        software: SOFTWARE_TYPE_EXAMPLE,
        taxNumber: '12345678',
    );

    $expected = loadTestRequest('QueryTaxpayerRequest');

    $xml = $request->toXml(false);

    expect($xml)->toEqual($expected);
});
