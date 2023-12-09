<?php

use LightSideSoftware\NavApi\V3\Types\Requests\QueryTransactionStatusRequest;

test('convert query-transaction-status-request to xml', function () {
    $request = new QueryTransactionStatusRequest(
        header: BASIC_HEADER_TYPE_EXAMPLE,
        user: USER_HEADER_TYPE_EXAMPLE,
        software: SOFTWARE_TYPE_EXAMPLE,
        transactionId: '123456789',
        returnOriginalRequest: false,
    );

    $expected = loadTestRequest('QueryTransactionStatusRequest');

    $xml = $request->toXml(false);

    expect($xml)->toEqual($expected);
});
