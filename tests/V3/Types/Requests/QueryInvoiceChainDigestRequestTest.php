<?php

use LightSideSoftware\NavApi\V3\Types\Enums\InvoiceDirectionType;
use LightSideSoftware\NavApi\V3\Types\InvoiceChainQueryType;
use LightSideSoftware\NavApi\V3\Types\Requests\QueryInvoiceChainDigestRequest;

test('convert invoice-chain-digest-request to xml', function () {
    $request = new QueryInvoiceChainDigestRequest(
        header: BASIC_HEADER_TYPE_EXAMPLE,
        user: USER_HEADER_TYPE_EXAMPLE,
        software: SOFTWARE_TYPE_EXAMPLE,
        page: 1,
        invoiceChainQuery: new InvoiceChainQueryType(
            invoiceNumber: '2022/1234',
            invoiceDirection: InvoiceDirectionType::OUTBOUND,
            taxNumber: 22223333,
        ),
    );

    $expected = loadTestRequest('QueryInvoiceChainDigestRequest');

    $xml = $request->toXml(false);

    expect($xml)->toEqual($expected);
});
