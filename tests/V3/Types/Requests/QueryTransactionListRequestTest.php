<?php

use LightSideSoftware\NavApi\V3\Types\DateTimeIntervalParamType;
use LightSideSoftware\NavApi\V3\Types\Enums\RequestStatusType;
use LightSideSoftware\NavApi\V3\Types\Requests\QueryTransactionListRequest;

test('convert query-transaction-list-request to xml', function () {
    $request = new QueryTransactionListRequest(
        header: BASIC_HEADER_TYPE_EXAMPLE,
        user: USER_HEADER_TYPE_EXAMPLE,
        software: SOFTWARE_TYPE_EXAMPLE,
        page: 1,
        insDate: new DateTimeIntervalParamType(
            dateTimeFrom: new DateTimeImmutable('2020-02-05 06:46:42'),
            dateTimeTo: new DateTimeImmutable('2020-02-05 08:53:16'),
        ),
        requestStatus: RequestStatusType::RECEIVED,
    );

    $expected = loadTestRequest('QueryTransactionListRequest');

    $xml = $request->toXml(false);

    expect($xml)->toEqual($expected);
});
